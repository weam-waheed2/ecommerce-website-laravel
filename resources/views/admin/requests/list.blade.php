@extends('admin.layouts.master')
@section('title', 'تواصل معنا')

@section('content')
    <div class="row">
        <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8">تواصل معنا</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{url('admin/home')}}">
                                        لوحة التحكم
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    تواصل معنا
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card border mb-5">
                <div class="card-header border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">الكل : {{\App\Models\Request::count()}}</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table align-middle gs-0 gy-4" style="direction: ltr;text-align:left">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th>Form Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Message</th>
                                <th>Sent At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Request::all() as $Request)
                                <tr>
                                    <td>{{ $Request->form_name }}</td>
                                    <td>{{ $Request->name }}</td>
                                    <td>
                                        {{ $Request->email }}
                                    </td>
                                    <td>{{ $Request->phone }}</td>
                                    <td>{{ $Request->country }}</td>
                                    <td>{{ $Request->note }}</td>
                                    <td>{{ $Request->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>

@endsection
