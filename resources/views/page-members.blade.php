@extends('layouts.app')

@section('content')
<div class="regular-contents">
  <p class="contents-title">Canarie Members</p>
  <p class="members-ask">Canarieは一緒に遊ぶ友達をいつも探しています。興味がある方は是非ご連絡ください！</p>
  <div class="members-container">
    <div class="member-wrapper">
      <div class="main-contents">
        <div class="img-wrapper">
          <div class="deco"></div>
          <img src="@asset('images/takeshi_sm.jpg')" alt="">
        </div>
        <p class="name-en">Takeshi Oide</p>
      </div>
      <div class="contents-bottom">
        <p class="name">大出　岳志</p>
        <a href="http://takeshioide.com/" class="website">http://takeshioide.com</a>
        <div class="sns-wrapper">
          <a class="sns-link" href="https://www.facebook.com/takeshi.oide.35">
            <img src="@asset('images/facebook-logo.svg')" alt="">
          </a>
          <a class="sns-link" href="https://www.instagram.com/takeshioide/">
            <img src="@asset('images/instagram-logo.svg')" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection