const staticISI = document.getElementById('static-isi');
const stickyISI = document.getElementById('sticky-isi');
const footer = document.getElementById('colophon');
let inFooter = false;

// configure the intersection observer instance
const intersectionObserverConfig = {
  // start fading out sticky ISI 20px before reaching static ISI
  rootMargin: '0px 0px 20px 0px',
  ratio: 0,
};

function onIntersection(entries){
  entries.forEach(entry => {
    const { target, isIntersecting, intersectionRatio } = entry;

    // If static ISI is in the viewport, disable the sticky ISI
    if (target === staticISI && (isIntersecting || intersectionRatio > 0 )) {
      stickyISI.classList.add('disabled');
    // If the footer is in the viewport, disable the sticky ISI
    } else if (target === footer && (isIntersecting || intersectionRatio > 0 )) {
      stickyISI.classList.add('disabled');
      inFooter = true;
    // If scrolling back up from the footer, keep stickyISI disabled
    } else if (target === staticISI && inFooter && (!isIntersecting || intersectionRatio === 0)) {
      stickyISI.classList.add('disabled');
    // If scrolling back up, we're no longer in the footer
    } else if (target === footer && inFooter && (!isIntersecting || intersectionRatio === 0)) {
      inFooter = false;
    // Finally, if the staticISI is not in view, then remove the stickyISI
    } else if (target === staticISI && (!isIntersecting || intersectionRatio === 0)) {
      stickyISI.classList.remove('disabled');
    }
  });
}

// create observer instance
const observer = new IntersectionObserver(onIntersection, intersectionObserverConfig);

// provide the observer with a target
observer.observe(staticISI);
observer.observe(footer);
