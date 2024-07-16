<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Site Title</label>
<div class="mb-3">
    <input type="text" class="form-control form-control-solid" name="option[site_title]" value="{{ \App\Models\Option::get('site_title') }}"/>
</div>
<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Tagline</label>
<div class="mb-3">
    <input type="text" class="form-control form-control-solid" name="option[tagline]"  value="{{ \App\Models\Option::get('tagline') }}"/>
</div>
<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">About</label>
<div class="mb-3">
    <textarea type="text" class="form-control form-control-solid" name="option[about]">{{ \App\Models\Option::get('about') }}</textarea>
</div>
<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Founding Date</label>
<div class="mb-3">
    <input type="text" class="form-control form-control-solid date" name="option[founding_date]" value="{{ \App\Models\Option::get('founding_date') }}">
</div>

<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Language</label>
<div class="row">
    <div class="mb-3 col-lg-6">
        <select class="form-control form-control-solid" name="option[language]" data-control="select2">
            @foreach(config('languages') as $key => $val)
                <option {{ \App\Models\Option::get('language') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }} ({{ $key }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-lg-6">
        <select class="form-control form-control-solid" name="option[country]" data-control="select2">
            @foreach(config('countries') as $key => $val)
                <option {{ \App\Models\Option::get('country') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }} ({{ $key }})</option>
            @endforeach
        </select>
    </div>
</div>

<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Home Page</label>
<div class="mb-3">
    <select class="form-control form-control-solid" name="option[homepage]" data-control="select2">
        @foreach(\App\Models\Post::where('post_type', 'page')->get() as $post)
            <option {{ \App\Models\Option::get('homepage') == $post->ID ? 'selected' : '' }} value="{{ $post->ID }}">{{ $post->post_title }}</option>
        @endforeach
    </select>
</div>
<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Search Page</label>
<div class="mb-3">
    <select class="form-control form-control-solid" name="option[search_page]" data-control="select2">
        @foreach(\App\Models\Post::where('post_type', 'page')->get() as $post)
            <option {{ \App\Models\Option::get('search_page') == $post->ID ? 'selected' : '' }} value="{{ $post->ID }}">{{ $post->post_title }}</option>
        @endforeach
    </select>
</div>

<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Email</label>
<div class="mb-3">
    <input type="email" class="form-control form-control-solid" name="option[email]"  value="{{ \App\Models\Option::get('email') }}"/>
</div>
<label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Phone</label>
<div class="mb-3">
    <input type="tel" class="form-control form-control-solid" name="option[phone]"  value="{{ \App\Models\Option::get('phone') }}"/>
</div>

<div class="row">
    <div class="mb-3 col-lg-6">
        <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Logo</label>
        <div class="image-input image-input-outline w-100">
            <img class="image-input-wrapper w-125px h-125px" style="width:100px" id="logo-view" src="{{ !empty(\App\Models\Option::get('logo')) ? asset('assets/uploads/'.\App\Models\Option::get('logo')) : \App\Models\Media::default() }}" style="object-fit: cover;">
            <label class="btn btn-icon btn-circle btn-primary text-primary w-25px h-25px bg-body shadow" data-bs-toggle="tooltip" title="Change avatar" id="change-logo">
                إضافة صورة 
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16"><path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/><path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/></svg>
                
                <input type="hidden" name="option[logo]" value="{{ \App\Models\Option::get('logo') }}" id="logo-value"/>
            </label>
        </div>
    </div>
    <div class="mb-3 col-lg-6">
        <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Favicon</label>
        <div class="image-input image-input-outline w-100">
            <img class="image-input-wrapper w-125px h-125px" style="width:100px" id="favicon-view" src="{{ !empty(\App\Models\Option::get('favicon')) ? asset('assets/uploads/'.\App\Models\Option::get('favicon')) : \App\Models\Media::default() }}" style="object-fit: cover;">
            <label class="btn btn-icon btn-circle btn-primary text-primary w-25px h-25px bg-body shadow" data-bs-toggle="tooltip" title="Change avatar" id="change-favicon">
                إضافة صورة 
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16"><path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/><path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/></svg>
                <input type="hidden" name="option[favicon]" value="{{ \App\Models\Option::get('favicon') }}" id="favicon-value"/>
            </label>
        </div>
    </div>
</div>

<script>
    $('#change-logo').click(function (){
        GxMediaLibrary.multiple(false);
        GxMediaLibrary.open();
        GxMediaLibrary.insert(function (data) {
            console.log(data);
            $.each(data, function( index, value ) {
                $('#logo-value').val(value.name);
                $('#logo-view').attr('src', value.url);
                GxMediaLibrary.close();
            });
        });
    });
    $('#change-favicon').click(function (){
        GxMediaLibrary.multiple(false);
        GxMediaLibrary.open();
        GxMediaLibrary.insert(function (data) {
            console.log(data);
            $.each(data, function( index, value ) {
                $('#favicon-value').val(value.name);
                $('#favicon-view').attr('src', value.url);
                GxMediaLibrary.close();
            });
        });
    });

</script>