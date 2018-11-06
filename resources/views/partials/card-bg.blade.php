<div class="card-bg-container">
    <a class="inside-wrapper" href="{{ $link }}">
        <div class="card-bg-top">
            <img class="thumb" src="{{ $image }}" alt="{{ $title }}">
            <div class="hover-deco"></div>
            <div class="date-title">
                <p class="card-date">{{ $date }}</p>
                <div class="deco"></div>
                <p class="card-bg-title">{{ $title }}</p>
            </div>
        </div>
        <p class="card-short-description">{{ $description }}</p>

    </a>
    <div class="tags-container">
        @foreach($tags as $key => $tag)
            @if($key < 2)
                <a href="{{ get_tag_link($tag->term_id) }}" class="tag-wrapper pull-left">
                    <div class="tag-deco">
                        <img class="image-cover" src="@asset('images/tag_deco.svg')" alt="">
                    </div>
                    <p class="tag-text">{{ $tag->name }}</p>
                </a>
            @endif
        @endforeach
    </div>
</div>