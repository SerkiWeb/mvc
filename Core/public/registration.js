
window.onload = function() {
	document.getElementById('password').addEventListener('change', checkPassword);
	document.getElementById('conf_password').addEventListener('change', confPassword);
}

function checkPassword(event)
{
	password = event.target;
	bt_registration = document.getElementById('bt_registration'); 
	re_1 = /[A-Z]/;
	re_2 = /[\$%&µ#@]/;

	if (!re_1.test(password.value)) {
		password.setCustomValidity('Votre mot de passe doit contenir au moins 1 MAJ');	
		return;
	}

	if (!re_2.test(password.value)) {
		password.setCustomValidity('Votre mot de passe doit contenir au moins 1 un caractère spéciale');
		return;	
	}

	password.setCustomValidity('');
}

function confPassword(event) {
	confPassword = event.target;
	bt_registration = document.getElementById('bt_registration');

	if (confPassword.value != document.getElementById('password').value) {
		confPassword.setCustomValidity('vos mot de passe ne correspondent pas');
	
		return;
	}
	confPassword.setCustomValidity('');
}