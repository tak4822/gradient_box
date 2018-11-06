const addHead = (el, idCount, tocCount) => {
    el.attr('id', "toc_" + idCount);
    const list = '<li class="toc-list">' +
        '<a href="#toc_' + idCount + '">' +
        '<span class="toc-num">' + ((tocCount < 10) ? '0' : '') + tocCount + '</span>' +
        '<span class="toc-deco"></span>' +
        '<span class="toc-text">' +  el.text() +'</span>' +
        '</a>' +
        '</li>';
    return list;
}

const addSubHead = (el, idCount) => {
    el.attr('id', "toc_sub_" + idCount);
    const list = '<li class="toc-sub-list">' +
        '<a href="#toc_sub_' + idCount + '">' +
        '<span class="toc-sub-text">' +  el.text() +'</span>' +
        '</a>' +
        '</li>';
    return list;
}

export default function() {
  let idCount = 1;
  let toc = '';
  let currentlevel = 0;
  let tocCount = 1;

  $(".custom-heading-text, .custom-red-text").each(function(){
    let level = 0;
    if(this.nodeName.toLowerCase() == "h2") {
        level = 1;
    } else if(this.nodeName.toLowerCase() == "h3") {
        level = 2;
    }

    const el = $(this);

    if(currentlevel === 0 && level === 1) { // 0 -> 1
        toc += '<ul class="toc">';
        currentlevel++;
        toc += addHead(el, idCount, tocCount);
        tocCount++;
    } else if(currentlevel === 1 && level === 2) { // 1 -> 2
        toc += '<ul class="toc-sub">';
        currentlevel++;
        toc += addSubHead(el, idCount);
    } else if(currentlevel === 2 && level === 1) { // 2 -> 1
        toc += "</ul>";
        currentlevel--;
        toc += addHead(el, idCount, tocCount);
        tocCount++;
    } else if(currentlevel === 1 && level === 1) { // 1 -> 1
        toc += addHead(el, idCount, tocCount);
        tocCount++;
    }else if(currentlevel === 2 && level === 2) { // 2 -> 2
        toc += addSubHead(el, idCount);
    }
    idCount++;
  });

    toc += "</ul>";

  if(idCount >= 2){ toc = '<div class="toc-container">' + toc + '</div>'; }
  $("#toc").html(toc);

  //ページ内リンク#非表示。加速スクロール
  $('a[href^=#]').click(function(){
    const speed = 1000,
      href= $(this).attr("href"),
      target = $(href == "#" || href == "" ? 'html' : href),
      position = target.offset().top - 100;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
}
