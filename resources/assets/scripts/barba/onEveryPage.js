export default function (
  currentStatus,
  oldStatus,
  barbaContainer,
  newPageRawHTML
) {
  // if ( Barba.HistoryManager.history.length === 1 ) {  // ファーストビュー
  //   return; // この時に更新は必要ありません
  // }


  window.scrollTo(0, 0); // page goes to top
  $('.sidebar').css('opacity', 1); // show sidebar after page goes to top

  // jquery-pjaxから借りた
  const $newPageHead = $('<head />').html(
    $.parseHTML(
      newPageRawHTML.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0],
      document,
      true
    )
  );
  // 変更したいタグ(ご自身の環境に合わせて適宜変更してください)
  const headTags = [
    "link[rel='canonical']",
    "link[rel='shortlink']",
    "link[rel='alternate']",
    "meta[name='description']",
    "meta[property^='og']",
    "meta[name^='twitter']",
    "meta[name='robots']",
  ].join(',');
  $('head')
    .find(headTags)
    .remove(); // タグを削除する
  $newPageHead.find(headTags).appendTo('head'); // タグを追加する

  const script = barbaContainer.querySelector('script');
  if (script !== null) {
    eval(script.innerHTML); // execute inline script
  }

  const instEmbed = document.querySelector('.instagram-media');
  if (instEmbed !== null) {
    window.instgrm.Embeds.process(); // execute instagram script
    // instEmbed.style.margin = '0 auto';
  }
}
