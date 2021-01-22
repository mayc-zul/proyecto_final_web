window.onload = function(){
	//Obtener formulario y los elementos de este
	var login_form = document.login_form.elements;
	console.log(login_form)
	var regist_form = document.regist_form.elements;
	
	login_form[0].onkeypress = permitir;
	login_form[1].onkeypress = permitir;
	
	regist_form[0].onkeypress = permitir;
	regist_form[4].onkeypress = permitir;
}

function permitir(event){
	switch(this.type){
		case "text": 
			p = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ 1234567890"
			break;
		case "password":
			p = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
			break;
	}

	var cod = event.charCode;
	var letra = String.fromCharCode(cod);
	return p.indexOf(letra) != -1;
}