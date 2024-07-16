@extends('admin.layouts.master')
@section('title', ucfirst($item) . ' - الاعدادات')

@section('content')
    <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8"> الاعدادات</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{url('admin/home')}}">
                                    لوحة التحكم
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                الاعدادات
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5 mb-xl-10 border">
        <div class="card-body pt-0 pb-0">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x fs-5 fw-bolder">
                @foreach(['main', 'social'] as $nav)
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 mb-3 {{ $nav == $item ? 'active' : '' }}" href="{{ url('admin/settings/' . $nav) }}">{{ ucfirst($nav) }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
<form method="POST">
    @csrf
    <div class="card border mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0" style="direction: ltr;text-align:left">
            @include('admin.settings.items.' . $item)
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
    </div>
</form>
@endsection
