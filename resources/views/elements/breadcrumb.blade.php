<div class="breadcrumb">
    <div class="container">
        <div itemscope="" itemtype="http://schema.org/BreadcrumbList" class="p-0 ms-0">
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="ms-0">
                <a itemprop="item" href="{{ url('/') }}" itemprop="name"><i class="fi-rs-home mr-5"></i>Home </a>
                <meta itemprop="position" content="1">
            </span>
            @if($post['post_type'] == 'page' && !empty($post['post_parent']))
                @foreach($post->ParentList() as $parent)
                    @if(!empty($parent))
                        <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="{{ $parent->url() }}"><span itemprop="name">{{ $parent->post_title }}</span></a>
                            <meta itemprop="position" content="1">
                        </span>
                    @endif
                @endforeach
            @else
                @foreach($post->CategoryList() as $category)
                    @if(!empty($category))
                        <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="{{ $category->url() }}"><span itemprop="name">{{ $category->name }}</span></a>
                            <meta itemprop="position" content="1">
                        </span>
                    @endif
                @endforeach
            @endif
            <span class="breadcrumb_last">{{ $post['post_title'] }}</span>
        </div>
    </div>
</div>

