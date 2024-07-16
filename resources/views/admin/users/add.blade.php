@extends('admin.layouts.master')
@section('title', $edit ? 'تعديل' : 'اضافة مستخدم جديد')

@section('content')
<div class="row">
    <div class="card bg-light-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">{{$edit ? 'تعديل' : 'اضافة مستخدم جديد'}}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{url('admin/home')}}">
                                    لوحة التحكم
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{url('admin/users')}}">
                                    المستخدمين
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                {{$edit ? 'تعديل' : 'اضافة مستخدم جديد'}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card border" style="direction: ltr;text-align:left">
            <div class="card-body">
                <form method="POST">
                    @csrf
                    @if($edit)
                        <input type="hidden" name="user[ID]" value="{{ $user->id }}">
                    @endif
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="contact-name" class="form-label">Name</label>
                                <input type="text" id="contact-name" class="form-control" placeholder="Enter Contact Name" name="user[name]" value="{{ $edit ? $user->name : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="contact-email" class="form-label">Email</label>
                                <input type="email" id="contact-email" class="form-control" placeholder="Enter Contact Email" name="user[email]" value="{{ $edit ? $user->email : '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="contact-email" class="form-label">Password</label>
                                <input type="password" id="contact-password" class="form-control" placeholder="Enter Contact Password" name="user[password]">
                            </div>
                            
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success waves-effect waves-light"><i class="fe-check-circle me-1"></i> {{$edit ? 'Update' : 'Create'}}</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div> 
        </div> 
    </div>
</div>

@endsection
