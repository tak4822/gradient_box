<a href="{{ $link }}" class="card-sm-container">
	<div class="thumb">
		<img src="{{ $image }}" alt="{{ $title }}">
	</div>
	<div class="hover-deco"></div>
	<div class="contents">
		<div class="cat-container">
			<div class="cat-deco"></div>
			<p class="cat-text">{{ $category }}</p>
		</div>
		<h3 class="card-sm-title">{{ $title }}</h3>
		<p  class="card-sm-description">{{ $description }}</p>
	</div>
</a>
