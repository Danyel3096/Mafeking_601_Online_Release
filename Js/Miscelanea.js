$.validator.addMethod('metodo', function(value, element) {
	return this.optional(element) || /expresion/.test(value);
});
$.validator.addMethod('contrasena', function(value, element) {
	return this.optional(element) || /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,255}$/.test(value);
});
$.validator.addMethod('latinos', function(value, element) {
	return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
});
$.validator.addMethod('correo', function(value, element) {
	return this.optional(element) || /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/.test(value);
});
(function() {//FUNCION DE BOOTSTRAP VALIDA LOS FORM CON LA CLASE VALIDAR-FORMULARIO
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('validar-formulario');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

var pagina = location.href.substring(location.href.lastIndexOf('/')+1);
var enlaces = document.getElementsByClassName("opcion"); //todos los enlaces
window.onload = function(){ //cuando cargue la pagina...
  for(i=0; i<enlaces.length; i++){ //recorremos los enlaces
    if(enlaces[i].id == pagina){ //cuando el indice sea igual a la variable pagina
      enlaces[i].removeAttribute("hidden"); //mostramos la flecha
      enlaces[i].className += " activo"; //añadimos la clase
    }
  }
}
//INICIO DE GESTOR
