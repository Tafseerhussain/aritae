<!-- Toastr.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.addEventListener('chat_message_notification', 
        event => {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "5000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr[event.detail.type]((event.detail.message.length > 35) ? event.detail.message.slice(0, 35) + '&hellip;' : event.detail.message, event.detail.title ?? '')
        }
    );

    window.addEventListener('coach_connect_notification', 
        event => {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "5000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
        }
    );

    window.addEventListener('event_join_notification', 
        event => {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "5000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
        }
    );

    window.addEventListener('notify', 
        event => {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "5000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
        }
    );
</script>

@if(!Route::is('coach.chat') && !Route::is('player.chat') && !Route::is('parent.chat'))
<script type="module">
    window.Echo.private('chat.{{Auth::user()->id}}')
        .listen('MessageSent', (e) => {
            var data = {
                "title" : "New message from "+e.user_name,
                "type" : "info",
                "message": e.message_body,
            }
            var event = new CustomEvent('chat_message_notification', { detail: data });
            window.dispatchEvent(event);
        });
</script>
@endif

<script type="module">
    //Subscribe to Admin notification channel
    window.Echo.private('admin-notification.{{Auth::user()->id}}')
        .listen('ContactFormSubmission', (e) => {
            if(e.type == 'contact-form-response'){
                var data = {
                    "title" : "New contact form submission received",
                    "type" : "info",
                    "message": e.contact_name + " submitted a contact form request.",
                }
                var event = new CustomEvent('notify', { detail: data });
                window.dispatchEvent(event);
            }
        });

    //Subscribe to Coach connect channel
    window.Echo.private('coach-connect.{{Auth::user()->id}}')
        .listen('CoachConnect', (e) => {
            if(e.type == 'initiated'){
                var data = {
                    "title" : "New player request",
                    "type" : "info",
                    "message": e.initiator_name + " requested to hire you as a coach",
                }
                var event = new CustomEvent('coach_connect_notification', { detail: data });
                window.dispatchEvent(event);
            }
            if(e.type == 'accepted'){
                var data = {
                    "title" : "Coach hire request accepted",
                    "type" : "info",
                    "message": e.initiator_name + " accepted your hiring request",
                }
                var event = new CustomEvent('coach_connect_notification', { detail: data });
                window.dispatchEvent(event);
            }
            if(e.type == 'declined'){
                var data = {
                    "title" : "Coach hire request declined",
                    "type" : "error",
                    "message": e.initiator_name + " declined your hiring request",
                }
                var event = new CustomEvent('coach_connect_notification', { detail: data });
                window.dispatchEvent(event);
            }
        });

    //Subscribe to Playbook request channel
    window.Echo.private('playbook-request.{{Auth::user()->id}}')
        .listen('PlaybookRequest', (e) => {
            if(e.type == 'playbook-requested'){
                var data = {
                    "title" : "Playbook received",
                    "type" : "info",
                    "message": 'Playbook request received from ' + e.coach_name,
                }
                var event = new CustomEvent('notify', { detail: data });
                window.dispatchEvent(event);
            }
        });
</script>

<!-- Laravel flash message -->
@if(session()->has("error"))
<script type="text/javascript">
    var data = {
        "title" : "Error!",
        "type" : "error",
        "message": "{{session('error')}}",
    }
    var event = new CustomEvent('notify', { detail: data });
    window.dispatchEvent(event);
</script>
@endif
@if(session()->has("info"))
<script type="text/javascript">
    var data = {
        "title" : "Info",
        "type" : "info",
        "message": "{{session('info')}}",
    }
    var event = new CustomEvent('notify', { detail: data });
    window.dispatchEvent(event);
</script>
@endif

<div class="modal" id="call_receive_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center">Incoming Call</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3 text-center call-text">
                        Someone is calling ...
                    </div>
                    <audio id="ring" autoplay hidden></audio>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <button class="btn btn-success btn-lg m-2" id="call_accept">Accept</button>
                        <button class="btn btn-danger btn-lg m-2" id="call_decline">Decline</buttion>
                    </div>
                </div>
                <input type="text" id="partner_name" hidden>
                <input type="text" id="partner_id" hidden>
                <input type="text" id="signal" hidden>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="video_call_receive_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center">Incoming Video Call</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3 text-center video-call-text">
                        Someone is calling ...
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <button class="btn btn-success btn-lg m-2" id="video_call_accept">Accept</button>
                        <button class="btn btn-danger btn-lg m-2" id="video_call_decline">Decline</buttion>
                    </div>
                </div>
                <input type="text" id="video_partner_name" hidden>
                <input type="text" id="video_partner_id" hidden>
                <input type="text" id="video_signal" hidden>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
    //Incoming audio call
    var channel = window.Echo.join("presence-call-channel");
    channel.listen("StartAudioChat", ( data ) => {
        if (data.type === "incomingCall" && data.userToCall == '{{Auth::user()->id}}') {
        // add a new line to the sdp to take care of error
        const updatedSignal = {
            ...data.signalData,
            sdp: `${data.signalData.sdp}\n`,
        };
        
        var partner_name = data.partnerName;
        var partner_id = data.from;
        var signal = JSON.stringify(updatedSignal);

        $('#partner_name').val(partner_name);
        $('#partner_id').val(partner_id);
        $('#signal').val(signal);

        $('.call-text').text(partner_name+" is calling ...");

        $('#call_receive_modal').modal('show');
        }
    });

    $('#call_decline').click(function(){
        $('#call_receive_modal').modal('hide');
    });
    $('#call_accept').click(function(){
        var partner_name = $('#partner_name').val();
        var partner_id = $('#partner_id').val();
        var signal = JSON.stringify($('#signal').val());

        var words = CryptoJS.enc.Utf8.parse(signal); 
        var base64 = CryptoJS.enc.Base64.stringify(words);


        $('#call_receive_modal').modal('hide');
        window.open('/call?partner_id='+partner_id+'&partner_name='+partner_name+'&action=accept_call&signal='+base64,'Aritae Call','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600');
    });

    $('#call_receive_modal').on('show.bs.modal', function(){
        var ring = $('#ring');
        ring.attr("src", "{{asset('audio/ring.mp3')}}");
        ring.trigger("play");
    });
    $('#call_receive_modal').on('hide.bs.modal', function(){
        var ring = $('#ring');
        ring.attr("src", "");
    });

    //Incoming video call
    var video_channel = window.Echo.join("presence-video-channel");
    video_channel.listen("StartVideoChat", ( data ) => {
        if (data.type === "incomingCall" && data.userToCall == '{{Auth::user()->id}}') {
        // add a new line to the sdp to take care of error
        const updatedSignal = {
            ...data.signalData,
            sdp: `${data.signalData.sdp}\n`,
        };
        
        var partner_name = data.partnerName;
        var partner_id = data.from;
        var signal = JSON.stringify(updatedSignal);

        $('#video_partner_name').val(partner_name);
        $('#video_partner_id').val(partner_id);
        $('#video_signal').val(signal);

        $('.video_call-text').text(partner_name+" is calling ...");

        $('#video_call_receive_modal').modal('show');
        }
    });

    $('#video_call_decline').click(function(){
        $('#video_call_receive_modal').modal('hide');
    });
    $('#video_call_accept').click(function(){
        var partner_name = $('#video_partner_name').val();
        var partner_id = $('#video_partner_id').val();
        var signal = JSON.stringify($('#video_signal').val());

        var words = CryptoJS.enc.Utf8.parse(signal); 
        var base64 = CryptoJS.enc.Base64.stringify(words);


        $('#video_call_receive_modal').modal('hide');
        //window.open('/video_call?partner_id='+partner_id+'&partner_name='+partner_name+'&action=accept_call&signal='+base64,'Aritae Call','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600');
        openWindowWithPost("/video_call", "AritaeVideoCall", {
            partner_id: partner_id,
            partner_name: partner_name,
            action: 'accept_call',
            signal: base64
        });
    });

    $('#video_call_receive_modal').on('show.bs.modal', function(){
        var ring = $('#ring');
        ring.attr("src", "{{asset('audio/ring.mp3')}}");
        ring.trigger("play");
    });
    $('#video_call_receive_modal').on('hide.bs.modal', function(){
        var ring = $('#ring');
        ring.attr("src", "");
    });

    //Fix autoplay block problem
    $(document).on('click', function(){
        var ring = $('#ring');
        ring[0].play();
    });
});

function openWindowWithPost(url, title, data) {
    var form = document.createElement("form");
    form.target = title;
    form.method = "POST";
    form.action = url;
    form.style.display = "none";

    for (var key in data) {
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = key;
        input.value = data[key];
        form.appendChild(input);
    }
    
    //CSRF token
    var csrf = document.querySelector('meta[name="csrf-token"]').content;
    var input = document.createElement("input");
    input.type = "hidden";
    input.name = '_token';
    input.value = csrf;
    form.appendChild(input);

    document.body.appendChild(form);
    window.open(url, title,'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600');
    form.submit();
    document.body.removeChild(form);
}
</script>