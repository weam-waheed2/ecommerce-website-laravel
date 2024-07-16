@if(isset($seo) && is_array($seo))
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="en" />
    <meta name="googlebot" content="follow" />
    <meta name="robots" content="index, follow">
    <meta name="robots" content="max-image-preview:large">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1">

    <title>{!! $seo['title'] !!}</title>
    <meta name="description" content="{!! $seo['description'] !!}"/>
    <meta name="keywords" content="{!! $seo['keywords'] !!}"/>

    @if(!empty($seo['canonical']))
        <link rel="canonical" href="{!! $seo['canonical'] !!}"/>
        <meta property="og:url" content="{{ $seo['canonical'] }}" />
    @endif

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="{{ isset($seo['twitter:description']) && !empty($seo['twitter:description']) ? $seo['twitter:description'] : $seo['description'] }}"/>
    <meta name="twitter:title" content="{!! isset($seo['twitter:title']) && !empty($seo['twitter:title']) ? $seo['twitter:title'] : $seo['title'] !!}" />
    <meta name="twitter:image" content="{!! $seo['image'] !!}" />
    <meta name="twitter:creator" content="@TripsInEgypt1" />

    @if(isset($seo['og:type']))
    <meta property="og:type" content="{!! $seo['og:type'] !!}"/>
    @endif

    <meta property="og:title" content="{{ isset($seo['og:title']) ? $seo['og:title'] : $seo['title'] }}" />
    <meta property="og:description" content="{{ isset($seo['og:description']) ? $seo['og:description'] : $seo['description'] }}" />

    <meta property="og:site_name" content="{{ \App\Models\Option::get('site_title') }}" />
    <meta property="og:image" content="{!! $seo['image'] !!}" />

@endif
