@foreach($terms as $term)
    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-3 justify-content-start" data-taxonomy="{{ $term->taxonomy }}">
        <input class="form-check-input" {{ in_array($term->ID, $checked) ? 'checked' : '' }} type="checkbox" value="{{ $term->ID }}" name="terms[]"/>
        <span class="form-check-label fs-3 text-gray-700">{{ str_repeat('—', $depth) }} {{ $term->name }}</span>
    </label>
    @if(count($term->childs()))
        @include('admin.terms.items.checkbox',['terms' => $term->childs(), 'depth' => $depth + 1, 'checked' => $checked])
    @endif
@endforeach
