@extends('admin.layouts.master')
@section('title', 'Media Editor')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-5">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">Media Edito</h3>
                </div>
                <div class="card-body py-3" style="height: 600px">
                    <div id="tui-image-editor-container"></div>
                </div>
                <div class="card-footer">
                    <form method="POST" id="image_save_form">
                        @csrf
                        <textarea id="image_base" name="image_base" class="form-control"></textarea>
                        <button type="button" class="btn btn-success" id="image_save_click">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <link type="text/css" href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css" rel="stylesheet" />
    <link type="text/css" href="{{ public_url('admin/assets/plugins/custom/image-editor/dist/tui-image-editor.css') }}" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.4.0/fabric.js"></script>
    <script type="text/javascript" src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>
    <script type="text/javascript" src="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
    <script type="text/javascript" src="{{ public_url('admin/assets/plugins/custom/image-editor/dist/tui-image-editor.js') }}"></script>
    <script type="text/javascript" src="{{ public_url('admin/assets/plugins/custom/image-editor/examples/js/theme/white-theme.js') }}"></script>
    <script type="text/javascript" src="{{ public_url('admin/assets/plugins/custom/image-editor/examples/js/theme/black-theme.js') }}"></script>
    <script>
        // Image editor
        var imageEditor = new tui.ImageEditor("#tui-image-editor-container", {
            includeUI: {
                loadImage: {
                    path: "{{ $media->Url() }}",
                    name: "SampleImage",
                },
                theme: blackTheme, // or whiteTheme
                initMenu: "filter",
                menuBarPosition: "bottom",
            },
            cssMaxWidth: 700,
            cssMaxHeight: 900,
            usageStatistics: false,
        });
        window.onresize = function () {
            imageEditor.ui.resizeEditor();
        };


        var supportingFileAPI   = !!(window.File && window.FileList && window.FileReader);
        var rImageType          = /data:(image\/.+);base64,/;
    function base64ToBlob(data) {
        var mimeString = '';
        var raw, uInt8Array, i, rawLength;

        raw = data.replace(rImageType, function(header, imageType) {
            mimeString = imageType;

            return '';
        });

        raw = atob(raw);
        rawLength = raw.length;
        uInt8Array = new Uint8Array(rawLength); // eslint-disable-line

        for (i = 0; i < rawLength; i += 1) {
            uInt8Array[i] = raw.charCodeAt(i);
        }

        return new Blob([uInt8Array], {type: mimeString});
    }
        $('#image_save_click').click(function(event) {
            var imageName           = imageEditor.getImageName();
            var dataURL             = imageEditor.toDataURL();
            var blob, type, w;
    
            $('#image_base').val(imageEditor.toDataURL());
            //$('#image_save_form').submit();
        });
    </script>
@endsection
