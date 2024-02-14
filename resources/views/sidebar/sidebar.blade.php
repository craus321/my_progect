


<div class="col-lg-4 pl-50">
    <div class="widget mb-60">
        <div class="sidebar-searc">
            <form action="{{ route('blog.search') }}" method="GET" class="search-form">
                <div class="search-container">
                    <input type="text" name="search" id="searchInput" placeholder="Поиск...">
                    <button type="submit" id="searchButton">Поиск</button>
                </div>
            </form>
        </div>
    </div>
    <div class="widget mb-40">
        <div class="sidebar-author text-center">
            <div class="sidebar-title mb-25">


                <h4>{!! setting('blog.avtor_1') !!}</h4>
            </div>
            <div class="sidebar-author-info">
                <div class="sidebar-author-img mb-20">

                    <img src="{{ Voyager::image(setting('blog.avtor_2')) }}" alt="img" style="max-width: 100%; height: auto;">
                </div>
                <p>{!! setting('blog.avtor') !!}</p>
                <ul>
                    <li><a href=  {!! setting('kontaktnye-dannye.Contact') !!}><img src="{{ asset('img/icon_footer/vk.png') }}" alt="ВКонтакте" width="33" height="33"></a></li>
                    <li><a href=  {!! setting('kontaktnye-dannye.Contact_1') !!}><img src="{{ asset('img/icon_footer/telegram.png') }}" alt="ВКонтакте" width="33" height="33"></a></li>

                </ul>
            </div>
        </div>
    </div>




    <div class="widget mb-40">
        <div class="sidebar-title mb-25">
            <h4>Недавные посты</h4>
        </div>
        <div class="rc-post">
            <ul>
                @foreach ($posts as $post)
                <li>
                    <div class="rc-post-thumb">
                        <a href="#" class="custom-image"><img src="{{ asset('storage/' . $post->image) }}" alt="img"></a>

                    </div>
                    <div class="rc-post-content">


                        <h6><a href="{{ route('blog.details', ['id' => $post->id]) }}">{{ $post->title }}</a></h6>
                        <span>{{ Carbon\Carbon::parse($post->created_at)->isoFormat('LL') }}</span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>








    <div class="widget mb-40">
        <div class="sidebar-title mb-20">
            <h4>Категории</h4>
        </div>
        <div class="cat-list">
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{ route('blog.category', ['category_id' => $category->id]) }}">{{ $category->name }}</a></li>
                @endforeach

            </ul>
        </div>

    </div>









    <div class="widget">
        <div class="sidebar-title mb-20">
            <h4>Tags</h4>
        </div>
        <div class="sidebar-tag">
            <ul>
                @foreach ($tags as $tag)
                    @if ($tag)
                        <li><a href="{{ route('blog.tag', ['tag' => $tag]) }}">{{ $tag }}</a></li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>

</div>


