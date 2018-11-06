export default function () {
  // 現在と同じページのリンクをクリックした場合、リロードをしない設定(オプション)
  const links = document.querySelectorAll('a[href]');
  const cbk = function (e) {
    if (e.currentTarget.href === window.location.href) {
      e.preventDefault();
      e.stopPropagation();
    }
  };
  for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', cbk);
  }
}
