var peticion = false; 
if (window.XMLHttpRequest) {
  peticion = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  peticion = new ActiveXObject("Microsoft.XMLHTTP");
}

function cargarExterno(datos,divID) { 
  if(peticion) {
   var obj = document.getElementById(divID); 
   peticion.open("GET", datos); 
   peticion.onreadystatechange = function() { 
  if (peticion.readyState == 4) { 
   obj.innerHTML = peticion.responseText; 
  } 
} 
peticion.send(null); 
}
}
