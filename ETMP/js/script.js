/* Filename: script.js
   Target page: registrationclient.php
   Purpose : 
   author : Chin Jing Jie, George Can Tze Hui, Liew Woun Kai, Nicholas Lim Tun Yang
   Date written: 31/03/2021
   Revisions: 31/03/2021
*/

// Form Validation by Nicholas Lim Tun Yang 
// refer form Lab6 COS10011 sample code
var gErrorMsg = "";

function validateForm(){
    "use strict";  
    var isAllOK = false;  
    gErrorMsg = ""; 
	var fNameOK = fName();
    var emailOK = chkEmail();
	var phoneOK = chkPhone();
	var staffIdOK = chkStaffID();
	var occupationOK = chkOccupation();
	var term&condOK = chkTerm&Cond();

    if (fNameOK && emailOK && phoneOK && staffIdOK && occupationOK = false && term&condOK){
        isAllOK = true;
    }
	
	else if (fNameOK && emailOK && phoneOK && staffIdOK = false && occupationOK && term&condOK){
		isAllOK = true;
	}
   else{
       alert(gErrorMsg); 
       gErrorMsg = "";  
       isAllOK = false;
   }
   return isAllOK;
}

function fName() {  //Full Name
	var name = document.getElementById("name").value;
	var pattern = /^[a-zA-Z ]+$/      
	var nameOk = true;
	if ((name.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter your Full name\n" 
        nameOk = false; 
        document.getElementById("name").style.borderColor = "red";
	}
	else{
		if (!pattern.test(name)){
			gErrorMsg = gErrorMsg + "Please enter your Full name in alphabetical characters only\n"
			nameOk = false; 
            document.getElementById("name").style.borderColor = "red";
		}
	}
	if ((name.length >= 25)){
		gErrorMsg = gErrorMsg + "Please enter your Full name not more than 25 characters\n"
		nameOk = false;
        document.getElementById("name").style.borderColor = "red";
	}
	return  nameOk;
}

function chkEmail() {  //Email
	var email = document.getElementById("email");
	var result = false; 
	var pattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-za-zA-Z0-9.-]{1,4}$/;
	if (pattern.test(email.value)){
		result = true;
	}
    else{  
       result = false;
       document.getElementById("email").style.borderColor = "red";
       gErrorMsg = gErrorMsg + "Please enter a valid email address\n"
	}
	return result;
}

function chkPhone() {  //Phone Number
	var phone = document.getElementById("phone").value;
	var num = true;
	if (isNaN(phone)){
		gErrorMsg = gErrorMsg + "Please enter your Phone Number in numeric number only\n"
		num = false;
        document.getElementById("phone").style.borderColor = "red";
	}
    else{
        if (phone.length == 0){
            gErrorMsg = gErrorMsg + "Please enter your Phone Number\n"
            num = false;
            document.getElementById("phone").style.borderColor = "red";
        }
        else{
            if ((phone.length > 11)){
                gErrorMsg = gErrorMsg + "Please enter your Phone Number not more than 11 digits\n"
                num = false;
                document.getElementById("phone").style.borderColor = "red";
            }
            else if ((phone.length < 10)){
                gErrorMsg = gErrorMsg + "Please enter your Phone Number for not less than 10 digits\n"
                num = false;
                document.getElementById("phone").style.borderColor = "red";
            }
            else{
                num = true;
            }
        }    
    }
	return num;
}

function chkStaffID() {  //Staff ID
	var code = document.getElementById("staffid").value;
	var staffid = true;
	if ((code.length == 0)){
		gErrorMsg = gErrorMsg + "Please enter your Staff ID\n"
        staffid = false;
        document.getElementById("staffid").style.borderColor = "red";
	}
	else{
		if ((code.length >= 5)){
			gErrorMsg = gErrorMsg + "Please enter your Staff ID with not more than 5 digits\n"
			staffid = false;
            document.getElementById("staffid").style.borderColor = "red";
		}
	}
	return staffid;
}

function chkOccupation() {  // Occupation
	var selected = false;
	
	var occupation = document.getElementById("occupation").value;
	if (occupation!=""){
		selected = true;
	}
	else{
		selected = false;
        document.getElementById("occupation").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Choose an Occupation\n"
	}
	return selected;
}

function chkTerm&Cond() {  // Terms and Condition
	var selected = false;
	
	var T&C = document.getElementById("t&c").value;
	if (T&C!=""){
		selected = true;
	}
	else{
		selected = false;
        document.getElementById("t&c").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Agree to the Terms and Condtions\n"
	}
	return selected;
}

function validateInputOnBlur(){
	
	var objectLostFocus_id = this.id;
	var isOk = false;
	
	switch (objectLostFocus_id){
		case "name": 
			isOk = fName();
			break;
		case "email": 
			isOk = chkEmail();
			break;
		case "phone":
			isOk = chkPhone();
			break;
		case "staffid":
			isOk = chkStaffID();
			break;
		case "occupation":
			isOk = chkOccupation();
			break;
		case "T&C":
			isOk = chkTerm&Cond();
			break;
            }
	if (!isOk) {
        document.getElementById(objectLostFocus_id).style.borderColor = ""; 
        document.getElementById(objectLostFocus_id).style.backgroundColor = "lightgray";
		gErrorMsg = "";
	}
}

function resetFormat(){
   var clicked_id = this.id;    
   document.getElementById(clicked_id).style.backgroundColor = "white";
   document.getElementById(clicked_id).style.borderColor = "grey";
}


function registerInputsOnBlur(){   
	var inputElements = document.getElementById("myForm").getElementsByTagName("input");
	for (var i = 0; i < inputElements.length; i++){
		inputElements[i].onblur = validateInputOnBlur;
	}
}


function registerInputsOnClick(){   
	var inputElements = document.getElementById("myForm").getElementsByTagName("input");
	for (var i = 0; i < inputElements.length; i++){
		inputElements[i].onclick = resetFormat;
	}
}

function init() {
   var myForm = document.getElementById("clientRegistrationForm");
   if (myForm == ""){
		 myForm = document.getElementById("adminRegistrationForm");
		 }
   registerInputsOnBlur();
   registerInputsOnClick();
   myForm.onsubmit = validateForm;
}

window.onload = init; 


