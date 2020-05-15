	
	function validateForm() {
		var noValidation = document.getElementById("#registro").novalidate;
		
		if (!noValidation){
			var error1 = passwordValidation();
			var error2 = passwordConfirmation();
			
			return (error1.length==0) && (error2.length==0);
		}
		else 
			return true;
	}
	

	
	function passwordValidation(){
		var password = document.getElementById("contraseña");
		var pwd = password.value;
		var valid = true;

		valid = valid && (pwd.length>=8);
		
		var hasNumber = /\d/;
		var hasUpperCases = /[A-Z]/;
		var hasLowerCases = /[a-z]/;
		valid = valid && (hasNumber.test(pwd)) && (hasUpperCases.test(pwd)) && (hasLowerCases.test(pwd));
		
		if(!valid){
			var error = "Por favor introduzca una contraseña correcta! Tamaño >= 8, (mayúsculas y minúsculas) letras y digitos";
		}else{
			var error = "";
		}
	        password.setCustomValidity(error);
		return error;
	}
	

	function passwordConfirmation(){
        var password = document.getElementById("contraseña");
		var pwd = password.value;
	
		var passconfirm = document.getElementById("confirmar");
		var confirmation = passconfirm.value;

		if (pwd != confirmation) {
			var error = "La contraseña no coincide con su confirmacion";
		}else{
			var error = "";
		}

		passconfirm.setCustomValidity(error);

		return error;
	}