function menuToggle() {
  const toggles = document.querySelectorAll('.menu-toggle, .menu-item-has-children');
  Array.from(toggles).forEach( toggle => {
    toggle.addEventListener('click', function(e) {
      e.preventDefault();
      this.classList.toggle('up');
    });
  });
}

// export default menuToggle;