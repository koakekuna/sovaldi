function customCookies() {
  window.cookieconsent.initialise({
    container: document.getElementById("home"),
    palette:{ "popup": { "background": '#4e758a' }, "button": { "background": '#ed8b01 ', 'padding': '5px 25px' } },
    revokable:true,
    onStatusChange: function(status) {
      console.log(this.hasConsented() ?
        'enable cookies' : 'disable cookies');
    },
    law: {
      regionalLaw: false,
    },
    location: false,
  });
}

// export default customCookies;