'use strict';

let profile_edit = document.querySelector(".profile_edit");
let profile_view = document.querySelector(".profile_view");

document.querySelector('.button_edit').addEventListener('click', ()=>{
	profile_view.style.display="none";
	profile_edit.style.display="flex";
});

document.querySelector('.cancel_submit').addEventListener('click', (e)=>{
	if(confirm("Do you like to cancel the edit?")){
		profile_view.style.display="flex";
		profile_edit.style.display="none";	
	}
	e.preventDefault();
});

function removeError(){
	Array.from(document.querySelectorAll('.error_input')).forEach((val)=>{
		val.classList.remove('error_input');
	});

	Array.from(document.querySelectorAll('.error_msg')).forEach((ele)=>{
		ele.parentNode.removeChild(ele);
	})
}

function insertErrorMsg(element, msg){
	element.insertAdjacentHTML("afterend", `<span class="error_msg">${msg}</span>`);
}

function passErrorMsg(element, msg){
	element.insertAdjacentHTML("afterend", `<span class="error_msg error_msg_pass">${msg}</span>`);
}


profile_edit.addEventListener("submit", function(e){
	let fname = this["fname"];
	let email = this["email"];
	let validForm = true;
	removeError();

	if(fname.value == '' || fname.value == null){
		fname.classList.add('error_input');
		insertErrorMsg(fname, 'Name can\'t be empty');
		validForm = false;	
	}
	
	if(!(/\S+@\S+\.\S+/.test(email.value))){
		email.classList.add('error_input');
		insertErrorMsg(email, 'Enter the valid email');
		validForm = false;
	}

	if(!validForm) e.preventDefault();
});

document.querySelector('.password_form').addEventListener('submit', function(e) {
	let cpass = this["current_password"];
	let npass = this["new_password"];
	let rnpass = this["renew_password"];
	let validForm = true;
	removeError();
	
	if(cpass.value == '' || cpass.value == null){
		cpass.classList.add('error_input');
		insertErrorMsg(cpass, 'Password required');
		validForm = false;	
	}

	if(npass.value == '' || npass.value == null){
		npass.classList.add('error_input');
		insertErrorMsg(npass, 'Enter password');
		validForm = false;	
	}else if(npass.value == cpass.value){
		npass.classList.add('error_input');
		insertErrorMsg(npass, 'Can\'t be same');
		validForm = false;	
	}

	if(rnpass.value == '' || rnpass.value == null){
		rnpass.classList.add('error_input');
		insertErrorMsg(rnpass, 'Re-enter password');
		validForm = false;	
	}else if(npass.value != rnpass.value){
		rnpass.classList.add('error_input');
		insertErrorMsg(rnpass, 'Password doesn\'t match');
		validForm = false;	
	}

	if(!validForm) e.preventDefault();
});

document.querySelector('.change_pass').addEventListener('click', (e)=>{
	document.querySelector('.change_password').style.display="flex";
	e.preventDefault();
});


document.querySelector('.cancel_password').addEventListener('click', (e)=>{
	document.querySelector('.change_password').style.display="none";
	e.preventDefault();
});

let page_location = window.location.href.split('?')[1];
if(page_location==="passerror"){
	profile_view.style.display="none";
	profile_edit.style.display="flex";
	document.querySelector('.change_password').style.display="flex";
	passErrorMsg(document.querySelector('.change_password .container h2'), "Password Incorrect");
}else if(page_location==="passsuccess"){
	profile_view.insertAdjacentHTML("beforebegin", `<span class="pass_success">Password Changed!</span>`);
}