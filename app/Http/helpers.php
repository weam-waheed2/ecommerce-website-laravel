<?php
include __DIR__ . '/Plugins/autop.php';
function upload_path($slug = ''){
    return base_path(env('UPLOAD_PATH') . $slug);
}

function upload_url($path = ''){
    return env('UPLOAD_URL') . $path;
}

function public_url($path = ''){
    return env('PUBLIC_URL') . $path;
}

function compress($code) {
    $search = array(

        // Remove whitespaces after tags
        '/\>[^\S ]+/s',

        // Remove whitespaces before tags
        '/[^\S ]+\</s',

        // Remove multiple whitespace sequences
        '/(\s)+/s',

        // Removes comments
        '/<!--(.|\s)*?-->/'
    );
    $replace = array('>', '<', '\\1');
    $code = preg_replace($search, $replace, $code);
    $code = str_replace('<p><div', '<div', $code);
    $code = str_replace('</div></p>', '</div>', $code);

    return $code;
}

function default_image(){
    return 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
}


function gx_icon($name, $data = [], $wrapper_class = ''){
    if(is_file(base_path('public/svg/' . $name . '.svg'))){
        $icon = file_get_contents(base_path('public/svg/' . $name . '.svg'));
        if(isset($data['width'])){
            $icon = preg_replace('#width="(.*?)\"#', '', $icon);
            $icon = str_replace('<svg ', '<svg width="'.$data['width'].'" ', $icon);
        }
        if(isset($data['height'])){
            $icon = preg_replace('#height="(.*?)\"#', '', $icon);
            $icon = str_replace('<svg ', '<svg height="'.$data['height'].'" ', $icon);
        }
        if(isset($data['color'])){
            $icon = str_replace('<svg ', '<svg fill="'.$data['color'].'" ', $icon);
        }
        return '<span class="'.$wrapper_class.'">'.compress($icon).'</span>';
    }
}
function gx_icon_url($name){
    return url('public/svg/' . $name . '.svg');
}
