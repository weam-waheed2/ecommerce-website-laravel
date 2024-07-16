@extends('layouts.master')

@section('seo')
    @include('elements.seo', ['seo' => $post->seo()])
@endsection

@php
    $faqs = [
        [
            'title' => 'Questions About Siam Ocean',
            'items' => [
                [
                    'question' => 'What is Siam Ocean?',
                    'answer' =>
                        'Siam Ocean Food Industries is one of the specialized companies in producing a variety of high-quality food products that meet the needs of both the local and international markets.',
                ],
                [
                    'question' => 'What Makes Us Different?',
                    'answer' => 'The company keeps pace with the latest advancements in the food industry to meet customer needs. It constantly researches the highest quality standards to ensure that its products are the hallmark of both the local and international markets.'
                ],
            ],
        ],

    ];

    $only_faq_items = [];
    foreach ($faqs as $faq_item) {
        foreach ($faq_item['items'] as $faq) {
            $only_faq_items[] = $faq;
        }
    }

@endphp

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container" style="max-width: 1610px;">
            @include('elements.breadcrumb', ['post' => $post, 'position' => 0, 'is_parent' => false])
        </div>
    </div>
    <div class="container my-5">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <h1 class="mb-15">
                        {{ $post->post_title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        {!! compress(\Vedmant\LaravelShortcodes\Facades\Shortcodes::render(gx_autop($post->post_content))) !!}

        <div class="row">
            <div class="col-xl-10 m-auto">
                @php($i = 1)
                @foreach ($faqs as $faq_item)
                <div class="mb-45">
                    <h2 class="text-center">{{$faq_item['title']}}</h2>
                </div>
                
                <div class="accordion my-3" id="accordionPanelsStayOpenExample">
                    @foreach ($faq_item['items'] as $faq)
                    <div class="accordion-item my-3">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-{{ $i }}" aria-expanded="true"
                                aria-controls="panelsStayOpen-{{ $i }}" style="font-weight: 700">
                                {{ $faq['question'] }}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-{{ $i }}" class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                {!! compress(gx_autop($faq['answer'])) !!}
                            </div>
                        </div>
                    </div>
                    @php($i++)
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <script type="application/ld+json">
    {!! json_encode([
            '@context'      => 'https://schema.org',
            '@type'         => 'FAQPage',
            'mainEntity'    => array_map(function ($v) {
                return [
                    '@type'             => 'Question',
                    'name'              => $v['question'],
                    'acceptedAnswer'    => ['@type' => 'Answer', 'text' => strip_tags($v['answer'])]
                ];
            }, $only_faq_items)
        ]) !!}
</script>
@endsection
