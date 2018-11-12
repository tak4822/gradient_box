import Barba from 'barba.js/dist/barba.min';
import transitionObj from './transitions';
import BarbaOnEveryPage from './onEveryPage';
import BarbaLinkHandler from './linkHandler';
import setting from './setting';

export default function (views) {
  setting();

  Barba.Dispatcher.on('newPageReady', BarbaOnEveryPage);
  Barba.Dispatcher.on('linkClicked', BarbaLinkHandler);

  // Barba Google Tagmaneger
  Barba.Dispatcher.on('initStateChange', function () {

  });

  const transition = Barba.BaseTransition.extend(transitionObj);

  Barba.Pjax.getTransition = () => {
    return transition;
  };

  views.forEach(view => Barba.BaseView.extend(view).init());

  setTimeout(function () {
    // wait for very first loading
    Barba.Pjax.start();
    Barba.Prefetch.init();
  }, 2000);
}
