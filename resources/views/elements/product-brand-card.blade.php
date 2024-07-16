@if(isset($posts) && !isset($post))
    <div class="container">
        <div class="row">
        @foreach($posts as $post)
            <div class="{{ $class }}">
            @include('elements.post-list', ['post' => $post])
            </div>
        @endforeach
        </div>
    </div>
@elseif(isset($post))
    <div class="gx-post-item rt-item small-item position-relative my-4">
       <div class="rt-image">
          <a href="{{ $post->url() }}">
              <img width="550" height="250" data-src="{{ $post->image() }}" src="{{ default_image() }}" class="attachment-revieweb-size7 size-revieweb-size7 wp-post-image wp-post-image lazyload" alt="" loading="lazy" />
          </a>										
       </div>
       <div class="entry-content">
          <h3 class="entry-title small-title title-animation-white-normal pb-0"><a href="{{ $post->url() }}">{{ \Vedmant\LaravelShortcodes\Facades\Shortcodes::render($post->post_title) }}</a></h3>
          <ul class="entry-meta d-flex justify-content-between">
             <li class="post-author">by <a href="{{ $post->Author()->Url() }}" title="{{ $post->Author()->name }}" rel="author" class="text-white">{{ $post->Author()->name }}</a></li>
             <li class="post-date">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</li>
          </ul>
       </div>
    </div>
@endif

