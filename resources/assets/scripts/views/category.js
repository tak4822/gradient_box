import gradientTransition from '../transitions/gradientHeader';
import trimString from '../modules/trimStringCard';

export default {
  namespace: 'category',
  onEnter: function() {
    // このページのcontainerが読み込みを開始した時。
  },
  onEnterCompleted: function() {
    trimString.bigCard();
    // このページのトランジションが完了した時。
    gradientTransition.header();
    gradientTransition.tags();

    setTimeout(function() {
      gradientTransition.entryContainer();
    }, 1500)
  },
  onLeave: function() {
    // 次のページへのトランジションが始まった時。
  },
  onLeaveCompleted: function() {
    // このページのcontainerが完全に削除された時。
  },
}