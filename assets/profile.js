
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


let change_password = document.querySelector('.change_password');

change_password.addEventListener('submit', function(e) {
	let cpass = this["current_password"];
	let npass = this["new_password"];
	let rnpass = this["renew_password"];
	let validForm = true;
	removeError();

	
	if(cpass.value == '' || cpass.value == null){
		cpass.classList.add('error_input');
		insertErrorMsg(cpass, 'Current password required');
		validForm = false;	
	}

	if(!validForm) e.preventDefault();
	e.preventDefault();
});