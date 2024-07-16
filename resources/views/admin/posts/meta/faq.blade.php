<button type="button" class="btn btn-primary mb-3" id="insert-new-faq">Insert FAQ</button>
<div class="accordion" id="faq-accordion-parent">
    @php
        $i = 0;
    @endphp
    @if(!empty($faq) && is_array($faq = json_decode($faq, 1)))
        @foreach($faq as $faq_item)
            <div class="accordion-item mb-3">
                <h2 class="accordion-header position-relative" id="gx_faq_accordion_1_header_{{ $i }}">
                    <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#itinerary_accordion_{{ $i }}" aria-expanded="true" aria-controls="itinerary_accordion_{{ $i }}">
                        {{ $faq_item['question'] }}
                    </button>
                    <div class="position-absolute" style="top: 20px;right: 50px;z-index: 5;" onclick="$(this).parent().parent().remove();">
                        <i class="fa fa-trash"></i>
                    </div>
                </h2>
                <div id="itinerary_accordion_{{ $i }}" class="accordion-collapse collapse show" aria-labelledby="gx_faq_accordion_1_header_{{ $i }}" data-bs-parent="#faq-accordion-parent">
                    <div class="accordion-body">
                        <div class="col-lg-12">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Question</label>
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" placeholder="Title" name="meta[faq][{{ $i }}][question]" value="{{ $faq_item['question'] }}"/>
                            </div>

                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Answer</label>
                            <div class="mb-5">
                                <textarea data-kt-autosize="true" class="form-control form-control-solid" rows="3" name="meta[faq][{{ $i }}][answer]">{{ $faq_item['answer'] }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    @endif
</div>

@php
    $faq_template =
        '<div class="accordion-item mb-3">
                <h2 class="accordion-header position-relative" id="gx_faq_accordion_1_header___FAQ_ID__">
                    <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#itinerary_accordion___FAQ_ID__" aria-expanded="true" aria-controls="itinerary_accordion___FAQ_ID__">
                        Day __FAQ_ID__
                    </button>
                    <div class="position-absolute" style="top: 20px;right: 50px;z-index: 5;" onclick="$(this).parent().parent().remove();">
                        <i class="fa fa-trash"></i>
                    </div>
                </h2>
                <div id="itinerary_accordion___FAQ_ID__" class="accordion-collapse collapse show" aria-labelledby="gx_faq_accordion_1_header___FAQ_ID__" data-bs-parent="#faq-accordion-parent">
                    <div class="accordion-body">
                        <div class="col-lg-12">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Question</label>
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" placeholder="Title" name="meta[faq][__FAQ_ID__][question]"/>
                            </div>

                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Answer</label>
                            <div class="mb-5">
                                <textarea data-kt-autosize="true" class="form-control form-control-solid" rows="3" name="meta[faq][__FAQ_ID__][answer]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        $search = array(
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );

        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
        $faq_template = preg_replace($search, $replace, $faq_template);
@endphp
<script>
    var faq_ID = {{ $i }};
    $('#insert-new-faq').click(function (){
        $('#faq-accordion-parent').append('{!! $faq_template !!}'.replaceAll('__FAQ_ID__', faq_ID));
        faq_ID++;
    })
</script>
