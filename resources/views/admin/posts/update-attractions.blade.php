@extends('admin.layouts.master')
@section('title', $title)

@section('content')
<form method="POST">
    @csrf
    <div class="row">
        @foreach(\App\Models\Post::where('post_type', 'tour')->get() as $post)
        <div class="col-xl-6">
            <h1>{{ $post->post_title }}</h1>
            @if(!empty(\App\Models\PostMeta::getMeta($post->ID, 'highlights')) && is_array($highlights = json_decode(\App\Models\PostMeta::getMeta($post->ID, 'highlights'), 1)))
                @php($highlights = $highlights)
            @endif

        @if(isset($highlights) && !empty($highlights))
            <div class="pr-i-itinery py-5" style="background:#f0f0f0;">
                <div class="gl-wrap">
                    <h3 class="pr-i-heading" id="tour-highlights">Tour Highlights</h3>
                    <div class="row mx-auto" style="max-width: 82rem;">
                        <div class="col-lg-12">
                            <table class="tour-info-table w-100">
                                <tbody class="w-100">
                                @foreach($highlights as $highlight)
                                    <tr style="display: table-row;">
                                        <td class="px-5 w-auto my-auto text-nowrap text-center" style="border-right: 1px solid #e1e1e1;">
                                            <h3>{{ $highlight['title'] }}</h3>
                                        </td>
                                        <td class="px-5 w-auto my-auto text-center fw-light text-muted post-desc">
                                            {!! str_replace(PHP_EOL, '- ', $highlight['content']) !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
        <div class="col-xl-6">
            <div class="card mb-5">
                <div class="card-body p-5">
                    <span class="card-label fw-bolder fs-3 mb-1">Attractions</span>
                    <div class="separator separator-dashed my-4"></div>
                    <div class="scroll-y mh-200px mh-lg-325px">
                        @php($checked = \App\Models\TermRelationship::where('post_ID', $post->ID)->pluck('term_ID')->toArray())
                        @php($terms = \App\Models\Term::where('taxonomy', 'tour_attraction')->whereIn('ID', $checked)->get())
                        @foreach($terms as $term)
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5 justify-content-start" data-taxonomy="{{ $term->taxonomy }}">
                                <input class="form-check-input" {{ in_array($term->ID, $checked) ? 'checked' : '' }} type="checkbox" value="{{ $term->ID }}" name="post[{{ $post->ID }}][terms][]"/>
                                <span class="form-check-label ms-2 fs-6 text-gray-700">{{ $term->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</form>

@endsection
