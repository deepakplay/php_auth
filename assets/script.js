'use strict';

const login_form = document.querySelector("#login_form");
const register_form = document.querySelector("#register_form");


function insertErrorMsg(element, msg){
	element.insertAdjacentHTML("afterend", `<span class="error_msg">${msg}</span>`);
}

let page_location = window.location.href.split('?')[1];
if(page_location.split('&')[0]==="register"){
	login_form.style.display="none";
	register_form.style.display="flex";
	if(page_location.split('&')[1]=='error'){
		register_form.querySelector('h2').insertAdjacentHTML('afterend', '<span class="error_form">Details Error Login</span>');
	}else if(page_location.split('&')[1]=='duplicate'){
		register_form.querySelector('h2').insertAdjacentHTML('afterend', '<span class="error_form">User already exists</span>');
	}
}else if(page_location.split('&')[0]==="login"){
	login_form.style.display="flex";
	register_form.style.display="none";
	if(page_location.split('&')[1]=='error'){
		login_form.querySelector('h2').insertAdjacentHTML('afterend', '<span class="error_form">Invalid email/password</span>');
	}else if(page_location.split('&')[1]=='regsuccess'){
		document.querySelector('body').insertAdjacentHTML('afterbegin', '<span class="success_register">Registered Successfully</span>');
	}
};


function removeError(){
	Array.from(document.querySelectorAll('.error_input')).forEach((val)=>{
		val.classList.remove('error_input');
	});

	Array.from(document.querySelectorAll('.error_msg')).forEach((ele)=>{
		ele.parentNode.removeChild(ele);
	})
}

login_form.addEventListener("submit", (e)=>{
	let email = this["login_email"];
	let pass = this["login_pass"];
	let validForm = true;
	removeError();

	if(!(/\S+@\S+\.\S+/.test(email.value))){
		email.classList.add('error_input');
		insertErrorMsg(email, 'Enter the valid email');
		validForm = false;
	}

	if(pass.value == '' || pass.value == null){
		pass.classList.add('error_input');
		insertErrorMsg(pass, 'Enter the password');
		validForm = false;	
	}

	if(!validForm) e.preventDefault();
});

register_form.addEventListener('submit', (e)=>{
	let name = this['register_name'];
	let email = this['register_email'];
	let pass = this['register_pass'];
	let cpass = this['register_cpass'];
	let validForm = true;
	removeError();


	if(name.value == "" || name.value == null){
		name.classList.add('error_input');
		insertErrorMsg(name, 'Enter your full name');
		validForm = false;
	}

	if(!(/\S+@\S+\.\S+/.test(email.value))){
		email.classList.add('error_input');
		insertErrorMsg(email, 'Enter the valid email');
		validForm = false;
	}

	if(pass.value == '' || pass.value == null){
		pass.classList.add('error_input');
		insertErrorMsg(pass, 'Enter the password');
		validForm = false;	
	}

	if(cpass.value == '' || cpass.value == null){
		cpass.classList.add('error_input');
		insertErrorMsg(cpass, 'Conform your password');
		validForm = false;	
	}

	if(pass.value !== cpass.value){
		cpass.classList.add('error_input');
		insertErrorMsg(cpass, 'Passwords didn’t match');
		validForm = false;	
	}

	if(!validForm) e.preventDefault();
});
