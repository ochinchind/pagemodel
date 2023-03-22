<nav class="yuBreadCrumb" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
            <a href="{{route('main')}}" rel="nofollow" itemprop="item" title="Главная">
                <span itemprop="name">Главная</span>
            </a>
            <meta itemprop="position" content="1">
        </li>
      
      @if($links)
        @foreach($links as $l)
            @if(!is_null($l['link']) && $l['link'] != 'menu' && !(isset($l['type']) && $l['type'] == 'data'))
            <li class="breadcrumb-item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                <a href="{{$l['link']}}" rel="nofollow" itemprop="item" title="{{$l['name']}}">
                    <span itemprop="name">{{$l['name']}}</span>
                </a>
                <meta itemprop="position" content="{{$loop->iteration+1}}">
            </li>
            @endif

            @if($l['link'] == 'menu' && !(isset($l['type']) && $l['type'] == 'data'))
            <li class="breadcrumb-item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                <a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#ywHiddenSidebarStart" rel="nofollow" itemprop="item" title="{{$l['name']}}">
                    <span itemprop="name">{{$l['name']}}</span>
                </a>
                <meta itemprop="position" content="{{$loop->iteration+1}}">
            </li>
            @endif

            @if(is_null($l['link']) && !(isset($l['type']) && $l['type'] == 'data'))
            <li class="breadcrumb-item active" aria-current="page" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                <span itemprop="name">{{$l['name']}}</span>
                <meta itemprop="position" content="{{$loop->iteration+1}}">
            </li>
            @endif

            @if(isset($l['type']) && $l['type'] == 'data')
                @foreach($l['data'] as $d)
                    @if(!is_null($d['link']))
                    <li class="breadcrumb-item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <a href="{{$d['link']}}" rel="nofollow" itemprop="item" title="{{$d['name']}}">
                            <span itemprop="name">{{$d['name']}}</span>
                        </a>
                        <meta itemprop="position" content="{{$loop->iteration+1}}">
                    </li>
                    @endif
                    @if(is_null($d['link']))
                    <li class="breadcrumb-item active" aria-current="page" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <span itemprop="name">{{$d['name']}}</span>
                        <meta itemprop="position" content="{{$loop->iteration+1}}">
                    </li>
                    @endif
                @endforeach
            @endif
            
        @endforeach

      @endif
    </ol>
</nav>