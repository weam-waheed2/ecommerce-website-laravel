<div id="gx_media_element_template" class="d-none">
    <label class="form-check-image m-3" gx_media_library="media-list-item" data-id="__ID__" data-alt="__ALT__" data-caption="__CAPTION__" data-dimensions="__dimensions__" data-url="__URL__" data-name="__NAME__">
            <img class="w-100px h-100px" src="__URL__" style="object-fit: cover;"/>
    </label>
</div>
<div id="latest_media_json" class="d-none">
    <?php echo \App\Models\Media::orderBy('ID', 'desc')->limit(100)->get()->toJson(); ?>

</div>
<script>
    var GxMediaLibrary = {
        open: function () {
            $('#gx_media_library').modal('show');
        },
        close: function () {
            $('#gx_media_library').modal('hide');
        },
        multiple: function (is_multiple = false) {
            $('#gx_media_library').attr('multiple', is_multiple);
        },
        insert: function (callback) {
            $('[gx_media_library="insert"]').off('click');
            var dataArray = [];

            if (typeof callback === 'function') {
                $('[gx_media_library="insert"]').click(function () {
                    console.log('ssssss');
                    $('[gx_media_library="media-list-item"].active').each(function (){
                        dataArray.push({'ID': parseInt($(this).attr('data-id')), 'name': $(this).attr('data-name'), 'url': $(this).attr('data-url'),'alt': $(this).attr('data-alt'),'caption': $(this).attr('data-caption')})
                    });
                    callback(dataArray);
                });
            }
        }
    };

    var latest_media_json = JSON.parse($('#latest_media_json').html());
    latest_media_json.forEach(function (i) {
        InsertMediaElement(i);
    })
    function InsertMediaElement(media){
        var template = $('#gx_media_element_template').clone();
        template.html(template.html().replaceAll('__ID__', media.ID).replaceAll('__ALT__', media.alt).replaceAll('__CAPTION__', media.caption).replaceAll('__dimensions__', media.dimensions).replaceAll('__URL__', media.url).replaceAll('__NAME__', media.name));
        $('[gx_media_library="media-list-wrapper"]').append(template.html());
    }
    $('#gx_media_library_file_input').on('change', function () {
        var formData    = new FormData();
        var files       = $('#gx_media_library_file_input')[0].files;
        for (var i = 0; i < files.length; i++) {
            formData.append('files[]', files[i]);
        }
        $('[gx_media_library="progress"]').show();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $('[gx_media_library="progress"] [role="progressbar"]').css('width', percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo e(url('admin/media/upload')); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                $('[gx_media_library="progress"]').hide();
                data.forEach(function (Media) {
                    InsertMediaElement(Media, true);
                });
            },
            error: function(err) {
                alert('Error Uploading');
            }
        });
    });
    $('[gx_media_library="search-input"], [gx_media_library="search-dimensions"]').on('change', function () {
        console.log('ssssss');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo e(url('admin/media/search')); ?>',
            type: 'POST',
            data: {'search': $('[gx_media_library="search-input"]').val(), dimensions: $('[gx_media_library="search-dimensions"]').val()},
            success: function(data) {
                $('[gx_media_library="media-list-wrapper"]').empty();
                data.forEach(function (Media) {
                    InsertMediaElement(Media, true);
                });
            },
            error: function(err) {
                alert('Error Searching');
            }
        });
    });
    $(document).on('click', '[gx_media_library="delete"]', function (){
        var ID = $(this).attr('data-id');
        $.ajax({
            url: '<?php echo e(url('admin/media/delete')); ?>/' + ID,
            method: 'GET',
            success: function(response) {
                $('[gx_media_library="media-list-item"][data-id="'+response.ID+'"]').remove();
                GxAlert('Deleted');
            },
            error: function(xhr, status, error) {
                // Handle the error here
                alert('Error Delete Media');

            }
        });

    });
    $(document).on('click', '[gx_media_library="media-list-item"]', function (){
        if(!$('#gx_media_library').attr('multiple')){
            $('[gx_media_library="media-list-item"]').not(this).removeClass('active');
        }
        $(this).toggleClass('active');
        $('[gx_media_library="form"]')[0].reset();
        if($(this).hasClass('active')){
            $('[gx_media_library="delete"]').attr('data-id', $(this).attr('data-id'));
            $('[gx_media_library="img-preview"]').attr('src', $(this).attr('data-url'));
            $('[gx_media_library="form"]').find('[name="media[ID]"]').val($(this).attr('data-id'));
            $('[gx_media_library="form"]').find('[name="media[ID_view]"]').val($(this).attr('data-id'));
            $('[gx_media_library="form"]').find('[name="media[url_view]"]').val($(this).attr('data-url'));
            $('[gx_media_library="form"]').find('[name="media[alt]"]').val($(this).attr('data-alt'));
            $('[gx_media_library="form"]').find('[name="media[caption]"]').val($(this).attr('data-caption'));


            $('[gx_media_library="img-dimensions"]').text($(this).attr('data-dimensions'));
        }

    });
    $(document).on('submit', '[gx_media_library="form"]', function (e){
        e.preventDefault();
        var Data    = new FormData($(this)[0]);
        var Url     = $(this).prop('action');

        var Form    = $(this);
        $.ajax({
            url: Url,
            method: 'POST', // or 'POST', 'PUT', 'DELETE', etc.
            data: Data,
            contentType: false,
            processData: false,
            success: function(response) {
                $('[gx_media_library="media-list-item"][data-id="'+response.ID+'"]').attr('data-alt', response.alt).attr('data-caption', response.caption);
                GxAlert('Updated');
            },
            error: function(xhr, status, error) {
                // Handle the error here
                alert('Error Updating Media');

            }
        });
    });
</script>
<?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/admin/media/js.blade.php ENDPATH**/ ?>