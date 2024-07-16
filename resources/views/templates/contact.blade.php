@extends('layouts.master')

@section('seo')
    @include('elements.seo', ['seo' => $post->seo()])
@endsection

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container" style="max-width: 1610px;">
        @include('elements.breadcrumb', ['post' => $post, 'position' => 0, 'is_parent' => false])
    </div>
</div>
<div class="container my-5">
    <div class="archive-header">
        <div class="row align-items-center">
            <div class="col-xl-12">
                <h1 class="mb-15">
                    {{ $post->post_title }}
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="page-content pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 m-auto">
                <section class="align-items-end mb-50">
                    <div class="mb-lg-0 mb-md-5 mb-sm-5">
                        <h4 class="mb-20 text-brand">How can help you ?</h4>
                        <h1 class="mb-30">Let us know how we can help you</h1>
                    </div>
                    <div class="col-lg-12">
                        
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="container mb-50 d-none d-md-block">
        <div class="border-radius-15 overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3439.7128569539773!2d30.6199583!3d30.4442409!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458990b8b099cdb%3A0xbe0136cd9ac2109!2z2LPZitin2YUg2KfZiNi02YY!5e0!3m2!1sen!2seg!4v1717936274949!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <section class="mb-50">
                    <div class="row mb-60">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h4 class="text-brand mb-3">Address :</h4>
                            <div>
                                Al metawaren area Sadat City, Monufia Governorate, Egypt
                            </div>
                            
                            <h4 class="mt-15 text-brand mb-3">Phone:</h4>
                            <div>
                                {{ \App\Models\Option::get('phone') }}
                            </div>
                            <h4 class="mt-15 text-brand mb-3">Email: </h4>
                            <div>
                                {{ \App\Models\Option::get('email') }}
                            </div>
                            <div class="pr-50 d-lg-block d-none">
                                <img class="border-radius-15 mt-50" src="{{asset('assets/imgs/page/contact-2.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="contact-from-area padding-20-row-col">
                                <h5 class="text-brand mb-10">Contact form</h5>
                                <h2 class="mb-10">Drop Us a Line</h2>
                                <form class="contact-form-style mt-30" id="form_send" action="{{ url('contact/send') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="url" value="{{url()->current()}}">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="name" placeholder="Your Name" type="text" fdprocessedid="x70n5">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="email" placeholder="Your Email" type="email" fdprocessedid="rby0jd">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="phone" placeholder="Your Phone" type="tel" fdprocessedid="rri1h">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="field_form shipping_calculator">
                                                <div class="form-group">
                                                    <div class="custom_select">
                                                        <select name="country" placeholder="Country" fdprocessedid="8mbtss" class="form-control select-active w-100">
                                                            <option>Country</option>
                                                            @foreach (config('countries') as $country)
                                                            <option value="{{$country}}">{{$country}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="textarea-style mb-30">
                                                <textarea name="note" placeholder="Message"></textarea>
                                            </div>
                                            <button class="submit submit-auto-width" type="submit" fdprocessedid="n506dd">Send message</button>
                                        </div>
                                    </div>
                                    <div class="contact-form-response-wrapper mt-3"></div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection