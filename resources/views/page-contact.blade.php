@extends('layouts.app')

@section('content')
<div class="regular-contents">
  <p class="contents-title">お問い合わせ</p>
  <div class="contact-container">
    <p>いつもCanarieをご利用頂きありがとうございます。</p>
    <p>Canarieは取材リクエストや、バナー広告、広告記事の出稿を受け付けています。<br />詳細な資料については、お問い合わせいただいたクライアント様に個別にご連絡いたします。</p>
    <br>
    <p>サービスに関するお問い合わせ・ご意見・ご感想などもご気軽にご連絡ください。</p>

    @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
    @endwhile
  </div>
</div>
@endsection