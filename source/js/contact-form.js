document.addEventListener("change", function(event) {
  let element = event.target;
  if (element && element.matches(".form-control")) {
    element.classList[element.value ? "add" : "remove"]("-hasvalue")
  }
})