<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aritae') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite([
        'resources/sass/app.scss',
        'resources/sass/call.scss', 
        'resources/js/app.js'

    ])

</head>
<body>
    <nav class="navbar container" style="background-color: rgba(0,0,0,0.3);">
        <div class="" id="navbarSupportedContent">
            {{-- Logo --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="">
            </a>
        </div>
        <ul></ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 call-status min-vh-100 d-flex align-items-center justify-content-center text-light">
                Calling ...
            </div>
            <video id="video_call" playsinline autoplay></video>
        </div>
        <div class="action-bar row">
            <div class="col-12 d-flex justify-content-center align-items-between">
                <button class="btn btn-dark btn-lg m-3" id="mute_mic">Mute</button>
                <button class="btn btn-danger btn-lg m-3" id="end_call">End</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 
    <!-- Price nouislider-filter cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simple-peer/9.11.1/simplepeer.min.js" integrity="sha512-0f7Ahsuvr+/P2btTY4mZIw9Vl23lS6LY/Y7amdkmUg2dqsUF+cTe4QjWvj/NIBHJoGksOiqndKQuI9yzn2hB0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/get_permissions.js')}}"></script>

    <script>
    var turn_url = "{{$turn->url}}";
    var turn_username = "{{$turn->username}}";
    var turn_credential = "{{$turn->credential}}";
    var authuserid = {{Auth::user()->id}};
    var isFocusMyself = true;
    var callPlaced = false;
    var callPartner = null;
    var mutedAudio = false;
    var mutedVideo = false;
    var videoCallParams = {
        users: [],
        stream: null,
        receivingCall: false,
        caller: null,
        callerSignal: null,
        callAccepted: false,
        channel: null,
        peer1: null,
        peer2: null,
    }

    $(document).ready(function(){
        videoCallParams.channel = window.Echo.join("presence-video-channel");

        async function placeCall(){
            callPlaced = true;
            callPartner = "{{request()->partner_name}}";
            partner_id = "{{request()->partner_id}}";

            await getMediaPermission();

            videoCallParams.peer1 = new SimplePeer({
                initiator: true,
                trickle: false,
                stream: videoCallParams.stream,
                config: {
                    iceServers: [
                    {
                        urls: turn_url,
                        username: turn_username,
                        credential: turn_credential,
                    },
                    ],
                },
            });

            videoCallParams.peer1.on("signal", (data) => {
                $('.call-status').text('Connecting ...')
                // send user call signal
                axios
                .post("/video/call-user", {
                    user_to_call: partner_id,
                    signal_data: data,
                    from: authuserid,
                })
                .then(() => {})
                .catch((error) => {
                    console.log(error);
                });
            });

            videoCallParams.peer1.on("stream", (stream) => {
                var video = $('#video_call')[0];
                if ('srcObject' in video) {
                    video.srcObject = stream
                } else {
                    video.src = window.URL.createObjectURL(stream) // for older browsers
                }
                $('.call-status').text('Joining')
            });

            videoCallParams.peer1.on("connect", () => {
                $('.call-status').text('Call in progress');
                $('.call-status').addClass('d-none');
                $('.call-status').removeClass('d-flex');
            });

            videoCallParams.peer1.on("error", (err) => {
                $('.call-status').text('Network error')
            });

            videoCallParams.peer1.on("close", () => {
                $('.call-status').text('Disconnected')
                setTimeout(function(){
                    window.close();
                }, 1000);
            });

            videoCallParams.channel.listen("StartVideoChat", ( data ) => {
                if (data.type === "callAccepted") {
                    if (data.signal.renegotiate) {
                        console.log("renegotating");
                    }
                    if (data.signal.sdp) {
                        videoCallParams.callAccepted = true;
                        const updatedSignal = {
                            ...data.signal,
                            sdp: `${data.signal.sdp}\n`,
                        };
                        videoCallParams.peer1.signal(updatedSignal);
                    }
                }
            });
        }

        async function acceptCall(){
            var callPartner = "{{request()->partner_name}}";
            var partner_id = "{{request()->partner_id}}";
            
            var base64 = 'SGVsbG8gd29ybGQ=';
            var words = CryptoJS.enc.Base64.parse("{{request()->signal}}");
            var signal = CryptoJS.enc.Utf8.stringify(words);

            await getMediaPermission();

            videoCallParams.peer2 = new SimplePeer({
                initiator: false,
                trickle: false,
                stream: videoCallParams.stream,
                config: {
                    iceServers: [
                    {
                        urls: turn_url,
                        username: turn_username,
                        credential: turn_credential,
                    }],
                },
            });

            videoCallParams.peer2.on("signal", (data) => {
                $('.call-status').text('Connecting ...')
                axios
                    .post("/video/accept-call", {
                    signal: data,
                    to: partner_id,
                })
                .then(() => {})
                .catch((error) => {
                    console.log(error);
                });
            });
    
            videoCallParams.peer2.on("stream", (stream) => {
                var video = $('#video_call')[0];
                if ('srcObject' in video) {
                    video.srcObject = stream
                } else {
                    video.src = window.URL.createObjectURL(stream) // for older browsers
                }
                $('.call-status').text('Joining')
            });
    
            videoCallParams.peer2.on("connect", () => {
                $('.call-status').text('Call in progress')
                $('.call-status').addClass('d-none');
                $('.call-status').removeClass('d-flex');
            });
    
            videoCallParams.peer2.on("error", (err) => {
                $('.call-status').text('Network error')
            });
    
            videoCallParams.peer2.on("close", () => {
                $('.call-status').text('Disconnected')
                setTimeout(function(){
                    window.close();
                }, 1000);
            });
    
            videoCallParams.peer2.signal(JSON.parse(signal));
        }

        function getMediaPermission() {
            return getVideoPermissions()
            .then((stream) => {
                videoCallParams.stream = stream;
            })
            .catch((error) => {
                console.log(error);
            });
        }

        //Starting call
        @if(request()->action == 'init_call')
            placeCall();
        @endif

        //Accept call
        @if(request()->action == "accept_call")
            acceptCall();
        @endif

        $('#mute_mic').click(function(){
            if($('#video_call').prop('muted')){
                $('#video_call').prop('muted', false)
                $(this).text("Mute");
            }
            else{
                $('#video_call').prop('muted', true)
                $(this).text("Unmute");
            }
        });
        $('#end_call').click(function(){
            window.close();
        })

    });
    </script>
</body>
</html>