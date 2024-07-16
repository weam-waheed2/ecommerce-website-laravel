@php($social = \App\Models\Option::get('social'))
@if($social)
    @php($social = json_decode($social,1))
@endif
<form method="POST">
    @csrf
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Facebook</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][facebook]" value="{{ @$social['facebook'] }}"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Twitter</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][twitter]" value="{{ @$social['twitter'] }}"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Instagram</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][instagram]" value="{{ @$social['instagram'] }}"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Youtube</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][youtube]" value="{{ @$social['youtube'] }}"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Pinterest</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][pinterest]" value="{{ @$social['pinterest'] }}"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Linkedin</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][linkedin]" value="{{ @$social['linkedin'] }}"/>
    </div>
    <label class="form-label fs-4 fw-bolder text-gray-700 mb-3">Tripadvisor</label>
    <div class="mb-5">
        <input type="url" class="form-control form-control-solid" name="option[social][tripadvisor]" value="{{ @$social['tripadvisor'] }}"/>
    </div>
    <div class="mb-5">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>
