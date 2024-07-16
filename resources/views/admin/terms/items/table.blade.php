<tr>
    <td>
        <div class="d-flex align-items-center mb-8">
            <span class="bullet bullet-vertical h-40px bg-success"></span>
            <div class="flex-grow-1 ms-3">
                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-4">{{ str_repeat('—', $depth) }} {{ $term->name }}</a>
            </div>
        </div>
    </td>
    <td>
        <a href="{{ url('admin/terms/edit/' . $term->ID) }}" class="btn btn-success btn-sm text-white">Edit</a>
    </td>
    <td>
    <a href="{{ url('admin/terms/delete/' . $term->ID) }}" class="btn btn-danger btn-sm text-white">Delete</a>
    </td>
</tr>
@if(count($term->childs()))
    @foreach($term->childs() as $child)
        @include('admin.terms.items.table',['term' => $child, 'depth' => $depth + 1])
    @endforeach
@endif
