@extends('admin.layouts.master')
@section('title', 'Media')
@section('content')
    <style>
        .row-actions{
            position: relative;
            left: -9999em;
        }
        .post-index-tr:hover .row-actions{
            position: static;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-5">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">Media</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-300px rounded-start">#</th>
                                <th>Categories</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            @foreach($media as $item)
                                <tr class="post-index-tr">
                                    <td>
                                        <div class="d-flex align-items-center mb-8">
                                            <img src="{{ $item->url() }}" class="media-image">
                                        </div>
                                    </td>
                                    <td class="w-100">
                                        <form method="POST" class="media-form">
                                            <div class="table-responsive">
                                               <table class="w-100">
                                                  <tbody>
                                                     <tr>
                                                        <td colspan="2">
                                                            <input type="hidden" value="{{ $item->ID }}" name="ID">
                                                            <input type="text" class="form-control" disabled="" value="{{ $item->url() }}" style="height: 30px;font-size: 12px;font-weight: 400;padding-right: 33px;">
                                                        </td>
                                                     </tr>
                                                     <tr>
                                                        <td>Image Alt</td>
                                                        <td>
                                                           <input type="text" class="form-control col-lg-8" value="{{ $item->alt }}" name="alt" style="height: 30px;font-size: 12px;font-weight: 400;">
                                                        </td>
                                                     </tr>
                                                     <tr>
                                                        <td>Caption</td>
                                                        <td>
                                                           <input type="text" class="form-control" value="{{ $item->caption }}" name="caption" style="height: 30px;font-size: 12px;font-weight: 400;">
                                                        </td>
                                                     </tr>
                                                     <tr>
                                                        <td>Description</td>
                                                        <td>
                                                           <input type="text" class="form-control" value="{{ $item->description }}" name="description" style="height: 30px;font-size: 12px;font-weight: 400;">
                                                        </td>
                                                     </tr>
                                                  </tbody>
                                               </table>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 12-->
        </div> <!-- end col -->
        <div class="col-xl-12">
            @if($media->hasPages())
            <ul class="pagination pagination-circle pagination-outline">
                <li class="page-item previous {{ $media->onFirstPage() ? 'disabled' : '' }}"><a href="{{ $media->previousPageUrl() }}" class="page-link"><i class="previous"></i></a></li>
            
                @foreach(range($media->currentPage() - 3, $media->currentPage() - 1) as $number)
                    @if($number >= 1)
                        <li class="page-item "><a href="{{ $media->url($number) }}" class="page-link">{{ $number }}</a></li>
                    @endif
                @endforeach
                
                <li class="page-item active"><a href="#" class="page-link">{!! $media->currentPage() !!}</a></li>
                
                @foreach(range($media->currentPage() + 1, $media->currentPage() + 3) as $number)
                    <li class="page-item "><a href="{{ $media->url($number) }}" class="page-link">{{ $number }}</a></li>
                @endforeach
            
                <li class="page-item next {{ $media->onLastPage() ? 'disabled' : '' }}"><a href="{{ $media->nextPageUrl() }}" class="page-link"><i class="next"></i></a></li>
            </ul>
            @endif
        </div>
    </div>
    <style>
    .media-image{
        width: 220px;
        height: 200px;
        object-fit: scale-down;
    }
    </style>
    <script>
        $('.media-form').each(function(){
            var form = $(this);
            $(this).find('input').change(function(){
                var form_array = form.serializeArray();
                $.ajax({
                    type: "POST",
                    url: IMAGES_UPDATE_DATA_URL,
                    data: form_array,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        });
    </script>
@endsection
