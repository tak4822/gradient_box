@extends('layouts.app')

@section('content')
<div class="regular-contents">
  <p class="contents-title">Sitemap</p>
  <div class="sitemap-container">
    <ul>
      <li><a href="/" class="sitemap-bg-title">Home</a></li>
      <li><a href="/new" class="sitemap-bg-title">New Posts</a></li>
      <li><a href="/popular" class="sitemap-bg-title">Popular Posts</a></li>
      <li><a href="/contact" class="sitemap-bg-title">お問い合わせ</a></li>
      <li><a href="/policy" class="sitemap-bg-title">プライバシーポリシー</a></li>
      <li>
        <p class="sitemap-bg-title">Category</p>
        <ul>
          <li><a href="/category/interview">Interview</a></li>
          <li><a href="/category/living">Living</a></li>
          <li><a href="/category/job">Job</a></li>
          <li><a href="/category/love">Love</a></li>
          <li><a href="/category/food">Food</a></li>
          <li><a href="/category/trip">Trip</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
@endsection