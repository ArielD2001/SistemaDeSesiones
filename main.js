function togle() {
  let mostrar = document.getElementById("contraseña");

  if (mostrar.type == "password") {
    mostrar.type = "text";
  } else {
    mostrar.type = "password";
  }
}
$(document).ready(function () {
  
$('.menu').click(function () { 
    $('.cerrar').toggleClass('toggle-cerrar');
});


});
