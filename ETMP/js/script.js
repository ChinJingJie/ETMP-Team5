/* Filename: script.js
   Target page: registrationclient.php
   Purpose : 
   author : Chin Jing Jie, George Can Tze Hui, Liew Woun Kai, Nicholas Lim Tun Yang
   Date written: 31/03/2021
   Revisions: 31/03/2021
*/

//tab content by Chin Jing Jie
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Form Validation by Nicholas Lim Tun Yang 
var gErrorMsg = "";

function validateForm(){
    "use strict";  
    var isAllOK = false;  
    gErrorMsg = ""; 
	var fNameOK = fName();
	var emailOK = chkEmail();
	var phoneOK = chkPhone();
	var occupationOK = chkOccupation();
	var termcondOK = chkTermCond();
	
	if(fNameOK && emailOK && phoneOK && occupationOK && termcondOK)
	{
		isAllOK = true;
	}
	
   else{
       alert(gErrorMsg); 
       gErrorMsg = "";  
       isAllOK = false;
   }
   return isAllOK;
}

function validateForm2(){
    "use strict";  
    var isAllOK = false;  
    gErrorMsg = ""; 
	var fNameOK = fName();
	var emailOK = chkEmail();
	var phoneOK = chkPhone();
	var staffidOK = chkStaffID();
	var termcondOK = chkTermCond();
	
	
	
	if(fNameOK && emailOK && phoneOK && staffidOK && termcondOK)
	{
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
	if ((name.length >= 50)){
		gErrorMsg = gErrorMsg + "Please enter your Full name not more than 50 characters\n"
		nameOk = false;
        document.getElementById("name").style.borderColor = "red";
	}
	return nameOk;
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

function chkOccupation() {  // Occupation
	var selected = false;
	
	var occupation = document.getElementById("occupation").value;
	if (occupation!=""){
		selected = true;
		document.getElementById("occupation").style.borderColor = "black";
	}
	else{
		selected = false;
        document.getElementById("occupation").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Choose an Occupation\n"
	}
	return selected;
}

function chkStaffID() {  //Phone Number
	var staffid = document.getElementById("staffid").value;
	var id = false;
    if (staffid.length == 0){
        gErrorMsg = gErrorMsg + "Please enter your Staff Id\n"
        id = false;
        document.getElementById("staffid").style.borderColor = "red";
    }
	
	else{
        if ((staffid.length > 6)){
              gErrorMsg = gErrorMsg + "Please enter your Staff Id not more than 5 digits\n"
              id = false;
              document.getElementById("staffid").style.borderColor = "red";
        }
        else if ((staffid.length < 5)){
            gErrorMsg = gErrorMsg + "Please enter your Staff Id for not less than 5 digits\n"
            id = false;
            document.getElementById("staffid").style.borderColor = "red";
        }
        else{
            id = true;
        }
    }            
	return id;
}

function chkTermCond() {  // Terms and Condition
	var selected = false;
	
	if (document.getElementById("t&c").checked){
		selected = true;
	}
	else{
		gErrorMsg = gErrorMsg + "Please agree to the Terms and Condition\n"
		selected = false;
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
	var myForm = document.getElementById("clientRegistrationForm");
	if(myForm == null)
    { 
		myForm = document.getElementById("adminRegistrationForm");
	}
	var inputElements = myForm.getElementsByTagName("input");
	for (var i = 0; i < inputElements.length; i++){
		inputElements[i].onblur = validateInputOnBlur;
	}
}


function registerInputsOnClick(){  
	var myForm = document.getElementById("clientRegistrationForm");
	if(myForm == null)
    { 
		myForm = document.getElementById("adminRegistrationForm");
	}
	var inputElements = myForm.getElementsByTagName("input");
	for (var i = 0; i < inputElements.length; i++){
		inputElements[i].onclick = resetFormat;
	}
}

function init() {
   var myForm = document.getElementById("clientRegistrationForm");
   if(myForm != null)
   {
	  registerInputsOnBlur();
	  registerInputsOnClick();
      myForm.onsubmit = validateForm;
   }
   
   else
   {
	  myForm = document.getElementById("adminRegistrationForm");
	  registerInputsOnBlur();
	  registerInputsOnClick();
      myForm.onsubmit = validateForm2;
   }
}


window.onload = init;