<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget news-letter">
            <h3 class="widget-title text-uppercase text-center">Get Newsletter</h3>

            <form action="/subscribe" method="post">
                {{ csrf_field() }}
                <input type="email" placeholder="Your email address" name="email">
                <input type="submit" value="Subscribe Now"
                       class="text-uppercase text-center btn btn-subscribe">
            </form>

        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
            @foreach($popular_posts as $p_post)
            <div class="popular-post">


                <a href="{{ route('post.show', $p_post->slug) }}" class="popular-img"><img src="{{ url($p_post->getImage()) }}" alt="">

                    <div class="p-overlay"></div>
                </a>

                <div class="p-content">
                    <a href="{{ route('post.show', $p_post->slug) }}" class="text-uppercase">{{ $p_post->title }}</a>
                    <span class="p-date">{{ $p_post->getDate() }}</span>

                </div>
            </div>
            @endforeach
        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>

            <div id="widget-feature" class="owl-carousel">
                @foreach($featured_posts as $f_post)
                <div class="item">
                    <div class="feature-content">
                        <img src="{{ url($f_post->getImage()) }}" alt="">

                        <a href="{{ route('post.show', $f_post->slug) }}" class="overlay-text text-center">
                            <h5 class="text-uppercase">{{ $f_post->title }}</h5>

                            <p>{!! $f_post->description !!}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
            @foreach($recent_posts as $r_post)
            <div class="thumb-latest-posts">
                <div class="media">
                    <div class="media-left">
                        <a href="{{ route('post.show', $r_post->slug) }}" class="popular-img"><img src="{{ url($r_post->getImage()) }}" alt="">
                            <div class="p-overlay"></div>
                        </a>
                    </div>
                    <div class="p-content">
                        <a href="{{ route('post.show', $r_post->slug) }}" class="text-uppercase">{{ $r_post->title }}</a>
                        <span class="p-date">{{ $r_post->getDate() }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
                @foreach($categories as $category)
                <li>
                    <a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a>
                    <span class="post-count pull-right"> ({{ $category->posts()->count() }})</span>
                </li>
                @endforeach
            </ul>
        </aside>
    </div>
</div>
