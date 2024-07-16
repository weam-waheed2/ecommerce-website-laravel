@if(isset($posts) && !isset($post))
<div class="container">
    <div class="row">
        @foreach($posts as $post)
            @include('elements.product-list', ['post' => $post])
        @endforeach
    </div>
</div>
@elseif(isset($post))
<div class="product-img-action-wrap">
    <div class="product-img product-img-zoom">
        <div class="product-img-inner">
            <a href='/shop-product-right'>
                <img class="default-img" src="{{$post->image()}}" alt="" />
            </a>
        </div>
    </div>
    <div class="product-action-1">
        <a aria-label="View" class="action-btn" href="{{$post->url()}}"><i class="fi-rs-eye"></i></a>
    </div>
</div>
<div class="product-content-wrap">
    <div class="product-category">
        Net Weight : {{$post->meta('data') ? json_decode($post->meta('data'), true)['weight'] : ''}}
    </div>
    <h2><a href='{{ $post->url() }}'>{{ \Vedmant\LaravelShortcodes\Facades\Shortcodes::render($post->post_title) }}</a></h2>
    <div class="product-rate-cover">
        <div class="product-rate d-inline-block">
            <div class="product-rating" style="width: 100%"></div>
        </div>
        <span class="font-small text-muted">By <a href='/vendor-details-1'>Siam Ocean</a></span>
    </div>
    <div class="product-card-bottom">
      <div class="add-cart">
          <a class='add' href='{{ $post->url() }}'>View </a>
      </div>
    </div>  
</div>
@endif