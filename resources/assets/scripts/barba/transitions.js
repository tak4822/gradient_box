/*
* Transition Obj
*/
// アニメーションの設定(フェードアウト→フェードイン)(オプション)
export default {
  start: function() {
    // document.getElementsByName('body')[0].style.background = 'red';
    //startはトランジションが起動した直後の一番最初に呼び出される。

    //promise.allを使うと、配列で渡された処理が全て終わった後に.thenを実行。
    //この場合は.newContainerLOadingと.fadeOutが終わってから.thenが実行される。
    Promise
    .all([this.newContainerLoading, this.fadeOut()])
    .then(this.fadeIn.bind(this));
  }, // End start function

  fadeOut: function() {
    //古いページコンテンツに対して行う処理。
    //ここでは、animateを使って、fadeoutさせている。
    // $('.transition-overlay').fadeIn(300);
    // $('.loader').fadeIn(100);
    return $(this.oldContainer).animate({ opacity: 0 },{duration:'fast'}).promise();
  },

  fadeIn: function() {
    // topに移動(地味に重要)
    window.scrollTo(0, 0);
    //startに記述したallによって、fadeOutが終わったらこのfadeIn関数が呼び出されている。

    //TODO: if loading speed is too slow, putting loading image
    // $('.loader').delay(200).fadeOut(400); //$('#loader-bg').fadeOut(800);でも可
    // $('.transition-overlay').delay(300).fadeOut(300); //$('#loader').fadeOut(300);でも可

    const _this = this;
    //ここでのnewContainerは、ajaxで読み込まれてきた新しい方の.barba-containerにあたる。
    const $el = $(this.newContainer);

    //opacity:0;になっていた古いbarba-containerをdisplay:none;に。
    //こちらおそらくfadeIn発動時古いbarba-containerの初期設定として。
    $(this.oldContainer).hide();


    //こちらも新しいbarba-containerの初期設定。
    //visiblityがあるのは、デフォルトではこれがhiddenになってるっぽいから。
    $el.css({
      visibility : 'visible',
      opacity : 0,
    });

    $el.animate({opacity: 1}, 200, function() {
      //.done()をつけることで古いbarba-containerのDOMは削除され、transitionが終了する。
      _this.done();
    });
  },
}; // End BaseTransition