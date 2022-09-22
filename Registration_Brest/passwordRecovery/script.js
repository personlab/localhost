const password_checker = document.querySelector('.password-Checker');
const password = document.querySelector('#password');
const progress_bar = document.querySelector('.bar');

password.onkeyup = () => {
  console.log(password.value);
  checkPasswordStrength(password.value);
}

function checkPasswordStrength(password) {
  let strength = 0;

  if (password.match(/(?=.*[A-Z])/)) strength++; // 1. uppercase characters
  if (password.match(/(?=.*[a-z])/)) strength++; // 1. lowercase characters
  if (password.match(/(?=.*[0-9])/)) strength++; // 1. numerical characters
  if (password.match(/(?=.*[`!№?~@#$%^&*])/)) strength++; // 1. special characters
  if (password.match(/(?=.{7,})/)) strength++; // 1. 7 characters

  console.log(strength);

  switch (strength) {
    case 0:
       password_checker.style.borderColor = 'transparent';
       progress_bar.style.cssText = `width : ${(strength / 5) * 100}%; background-color: unset;`;
       break;
    case 1:
       password_checker.style.borderColor = 'red';
       progress_bar.style.cssText = `width : ${(strength / 5) * 100}%; background-color: red;`;
       break;
    case 2:
       password_checker.style.borderColor = 'orangered';
       progress_bar.style.cssText = `width : ${(strength / 5) * 100}%; background-color: orangered;`;
       break;
    case 3:
       password_checker.style.borderColor = 'gold';
       progress_bar.style.cssText = `width : ${(strength / 5) * 100}%; background-color: gold;`;
       break;
    case 4:
       password_checker.style.borderColor = 'deepskyblue';
       progress_bar.style.cssText = `width : ${(strength / 5) * 100}%; background-color: deepskyblue;`;
       break;
    case 5:
       password_checker.style.borderColor = 'lime';
       progress_bar.style.cssText = `width : ${(strength / 5) * 100}%; background-color: lime;`;
       break;
  }
}

function show_hide_password_1(target){
	var input = document.getElementById('password');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}

function show_hide_password(target){
	var input = document.getElementById('password-input');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}
