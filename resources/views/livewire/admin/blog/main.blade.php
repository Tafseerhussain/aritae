<div>
@if($active_component == 'blogs')
    @livewire('admin.blog.blogs')
@elseif($active_component == 'create_post')
    @livewire('admin.blog.create-post')
@elseif($active_component == 'edit_post')
    @livewire('admin.blog.edit-post', ['post_id' => $post_id])
@endif

@push('custom-script')
    <script src="{{asset('assets/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        window.addEventListener('livewire-upload-start', event => {
            document.getElementById('thumb-upload').disabled = true;
            document.getElementById('more-imgs-upload').disabled = true;
            let image_url = URL.createObjectURL(event.target.files[0]);

            if(event.target.id == 'thumb-file'){
                let thumb_container = document.getElementById('thumb-container');
                thumb_container.innerHTML = '';

                var img_container = document.createElement('div');
                img_container.classList.add('img-container', 'thumb-image');

                var img = document.createElement('img');
                img.src = image_url;
                img_container.append(img);

                var progress = document.createElement('div');
                progress.classList.add('progress');

                var progress_fill = document.createElement('div');
                progress_fill.classList.add('progress-fill');
                progress.append(progress_fill);

                img_container.append(progress);
                thumb_container.append(img_container);
            }    
            
            else if(event.target.id == 'more-imgs-file'){
                let more_imgs_container = document.getElementById('more-imgs-container');
                
                if(more_imgs_container.querySelector('img_uploading'))
                    more_imgs_container.querySelector('img_uploading').remove();

                var img_container = document.createElement('div');
                img_container.classList.add('img-container', 'img-uploading');

                var img = document.createElement('img');
                img.src = image_url;
                img_container.append(img);

                var progress = document.createElement('div');
                progress.classList.add('progress');

                var progress_fill = document.createElement('div');
                progress_fill.classList.add('progress-fill');
                progress.append(progress_fill);

                img_container.append(progress);
                more_imgs_container.append(img_container);
            }    
        });

        window.addEventListener('livewire-upload-error', event => {
            document.getElementById('thumb-upload').disabled = false;
            document.getElementById('more-imgs-upload').disabled = false;

            if(event.target.id == 'thumb-file')
                document.getElementById('thumb-container').innerHTML = '';
            else if(event.target.id == 'more-imgs-file'){
                let more_imgs_container = document.getElementById('more-imgs-container');

                if(more_imgs_container.querySelector('img_uploading'))
                    more_imgs_container.querySelector('img_uploading').remove();
            }
        });
        window.addEventListener('livewire-upload-progress', event => {
            if(event.target.id == 'thumb-file'){
                let thumb_image = document.querySelector('.thumb-image');
                
                if(thumb_image)
                    thumb_image.querySelector('.progress-fill').style.width = event.detail.progress + '%';
            }
            else if(event.target.id == 'more-imgs-file'){
                let image_uploading = document.querySelector('.img-uploading');
                
                if(image_uploading)
                    image_uploading.querySelector('.progress-fill').style.width = event.detail.progress + '%';
            }
        });
        window.addEventListener('livewire-upload-finish', event => {
            document.getElementById('thumb-upload').disabled = false;
            document.getElementById('more-imgs-upload').disabled = false;

            if(event.target.id == 'thumb-file'){
                let thumb_container = document.getElementById('thumb-container');
                thumb_container.innerHTML = '';
            }
            else if(event.target.id == 'more-imgs-file'){
                let more_imgs_container = document.getElementById('more-imgs-container');

                if(more_imgs_container.querySelector('img_uploading'))
                    more_imgs_container.querySelector('img_uploading').remove();
            }
        });

        window.addEventListener('update_thumbnail', event => {
            let thumb_container = document.getElementById('thumb-container');
            thumb_container.innerHTML = '';

            var img_container = document.createElement('div');
            img_container.classList.add('img-container', 'thumb-image');

            var img = document.createElement('img');
            img.src = '/'+event.detail.thumb_url;
            img_container.append(img);

            thumb_container.append(img_container);
        });

        window.addEventListener('update_more_imgs', event => {
            let more_imgs_container = document.getElementById('more-imgs-container');
            more_imgs_container.innerHTML = '';

            for(x=0; x<event.detail.more_img_urls.length; x++){
                var img_container = document.createElement('div');
                img_container.classList.add('img-container');

                var img = document.createElement('img');
                img.src = '/'+event.detail.more_img_urls[x];
                img_container.append(img);

                var close = document.createElement('i');
                close.classList.add('bi', 'bi-x', 'close-btn');
                close.dataset.id = x;
                close.onclick = function (event){ removeImage(event) };
                img_container.append(close);

                more_imgs_container.append(img_container);
            }
        });

        function removeImage(event){
            Livewire.emit('removeImage', event.target.dataset.id);
        }

        Livewire.hook('element.initialized', (el, component) => {
            if(el.id == 'long-text'){
                console.log(el);

                if(tinymce.get('long-text')){
                    tinymce.remove('#long-text');
                }

                //Initialize TinyMCE
                tinymce.init({
                    selector: '#long-text',
                    branding: false,
                    promotion: false,
                    forced_root_block: false,
                    setup: function (editor) {
                        editor.on('init change', function () {
                            editor.save();
                        });
                        editor.on('change', function (e) {
                            @this.set('long_text', editor.getContent());
                        });
                    }
                });
            }
        })
    </script>
@endpush
</div>
