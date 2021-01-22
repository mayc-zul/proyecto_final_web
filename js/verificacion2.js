window.onload = function(){
	//Obtener formulario y los elementos de este
	var add_product = document.add_product.elements;
	var edit_product = document.edit_product.elements;
	
	add_product[1].onkeypress = permitir;
	edit_product[2].onkeypress = permitir;
}

function permitir(event){
	p = "1234567890,$"
	var cod = event.charCode;
	var letra = String.fromCharCode(cod);
	return p.indexOf(letra) != -1;
}