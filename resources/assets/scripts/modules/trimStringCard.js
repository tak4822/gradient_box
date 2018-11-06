import '../util/trim';
/*
*  Triming string inside card for responsive
*/
export default {
  // Triming for card-sm
  smallCard() {
    if($('.card-sm-container').length) {
      if (window.matchMedia('(max-width:340px)').matches) {
        document.querySelectorAll('.card-sm-title').forEach((el) => {
          el.innerText = el.innerText.customTrim(25);
        });
      } else if (window.matchMedia('(max-width:400px)').matches) {
        document.querySelectorAll('.card-sm-title').forEach((el) => {
          el.innerText = el.innerText.customTrim(35);
        });
      } else if (window.matchMedia('(max-width:650px)').matches) {
        document.querySelectorAll('.card-sm-title').forEach((el) => {
          el.innerText = el.innerText.customTrim(28);
        });
        document.querySelectorAll('.card-sm-description').forEach((el) => {
          el.innerText = el.innerText.customTrim(60);
        });
      } else {
        document.querySelectorAll('.card-sm-title').forEach((el) => {
          el.innerText = el.innerText.customTrim(32);
        });
        document.querySelectorAll('.card-sm-description').forEach((el) => {
          el.innerText = el.innerText.customTrim(85);
        });
      }
    }
  },
  //Triming for card-bg
  bigCard() {
    if ($('.card-bg-container').length) {
      if (window.matchMedia('(max-width:340px)').matches) {
        document.querySelectorAll('.card-bg-title').forEach((el) => {
          el.innerText = el.innerText.customTrim(22);
        });
        document.querySelectorAll('.card-short-description').forEach((el) => {
          el.innerText = el.innerText.customTrim(65);
        });
      } else if (window.matchMedia('(max-width:400px)').matches) {
        document.querySelectorAll('.card-bg-title').forEach((el) => {
          el.innerText = el.innerText.customTrim(25);
        })
      } else {
          document.querySelectorAll('.card-bg-title').forEach((el) => {
              el.innerText = el.innerText.customTrim(40);
          })
      }
    }
  },
}
