@foreach($terms as $term)
    <option {{ $term->ID == $selected ? 'selected' : '' }} value="{{ $term->ID }}">{{ str_repeat('—', $depth) }} {{ $term->name }}</option>
    @if(count($term->childs()))
        @include('admin.terms.items.select',['terms' => $term->childs(), 'depth' => $depth + 1, 'selected' => $selected])
    @endif
@endforeach
