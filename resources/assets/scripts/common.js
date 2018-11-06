import newsletter from './modules/newsLetter';
import clearFixedHeader from './modules/navScroll';
import hamburgerClick from './modules/hamburger';
import navHover from './modules/navHover';


export default function() {
  newsletter();
  clearFixedHeader(); // TODO:the nav is not hidden even when its reaching the footer
  hamburgerClick();
  navHover();
}
