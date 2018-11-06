import gradientTransition from '../transitions/gradientHeader';
import trimString from '../modules/trimStringCard';

export default {
  namespace: 'tags',
  onEnter: function () {
    // このページのcontainerが読み込みを開始した時。
  },
  onEnterCompleted: function () {
    // このページのトランジションが完了した時。
    trimString.bigCard();

    gradientTransition.header();

    setTimeout(function () {
      gradientTransition.entryContainer();
    }, 1000);
  },
  onLeave: function () {
    // 次のページへのトランジションが始まった時。
  },
  onLeaveCompleted: function () {
    // このページのcontainerが完全に削除された時。
  }
};
