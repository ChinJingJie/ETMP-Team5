/* Filename: script.js
   Target page: registrationclient.php
   Purpose : 
   author : Chin Jing Jie, George Can Tze Hui, Liew Woun Kai, Nicholas Lim Tun Yang
   Date written: 31/03/2021
   Revisions: 31/03/2021
*/

//Alert Box by Liew Woun Kai
function box(){
	var logout; 
	logout = confirm("Do you want to continue your action");
	if (logout == true)
	{
		location.href = "login.php";
	}
}

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

// Dynamic Text Box by Chin Jing Jie
function dynamicTextBox(text) {
    var selectedValue = text.value;
    if(selectedValue=="1")
    {
        document.getElementById("dynamicName").style.display = "";
    }
    else
    {
        document.getElementById("dynamicName").style.display = "none";
    }
}

//Data transfer between pages by Chin Jing Jie
function storePrograms(programName) {
    var myprograms = ["Training 1","Training 2","Training 3","Training 4","Others"];
    
    myprograms.forEach(array);
    
    function array(value) {
        if (value == programName) {
            sessionStorage.productIndex = myprograms.indexOf(value);
        }
    }
}

//Autoload select dropdown by Chin Jing Jie
function autoProductName() {
    document.getElementById("tcourse").selectedIndex = sessionStorage.productIndex;
    var product = document.getElementById("tcourse").value;
    sessionStorage.product = product;
    if (product == "1"){
        document.getElementById("dynamicName").style.display = "";
    }
    else
    {
        document.getElementById("dynamicName").style.display = "none";
    }
}

// Registration Form and Training Form Validation by Nicholas Lim Tun Yang and Chin Jing Jie
var gErrorMsg = "";

function validateForm(){
    "use strict";  
    var isAllOK = false;  
    gErrorMsg = ""; 
	var fNameOK = fName();
	var passwordOK = chkPswd();
	var recpasswordOK = chkReconfirmPassword();
	var emailOK = chkEmail();
	var phoneOK = chkPhone();
	var occupationOK = chkOccupation();
	var termcondOK = chkTermCond();
	
	if(fNameOK && passwordOK &&  recpasswordOK && emailOK && phoneOK && occupationOK && termcondOK)
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
	var passwordOK = chkPswd();
	var recpasswordOK = chkReconfirmPassword();
	var emailOK = chkEmail();
	var phoneOK = chkPhone();
	var staffidOK = chkStaffID();
	var termcondOK = chkTermCond();
	
	
	if(fNameOK && passwordOK &&  recpasswordOK && emailOK && phoneOK && staffidOK && termcondOK)
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

function validateForm3(){
    "use strict";  
	
    var isAllOK = false;
	gErrorMsg = "";	
	var fNameOK = fName();
	var emailOK = chkEmail();
	var phoneOK = chkPhone();
	var vNameOK= chkVenueName();
	var stAddressOK = chkStreetAddress();
	var cityOK = chkCity();
	var postcodeOK = chkPostcode();
	var trProgramOK = chkTrainingProgram();
	var trCategoryOK = chkTrainingCategory();
	var trStDateOK = chkTrainingStartDate();
	var trEndDateOK = chkTrainingEndDate();
	var trStTimeOK = chkTrainingStartTime();
	var trEndTimeOK = chkTrainingEndTime();
	
	if(fNameOK && emailOK && phoneOK && vNameOK && stAddressOK && cityOK && postcodeOK && trCategoryOK && trStDateOK && trEndDate && trStTimeOk && trEndTimeOK)
	{
		isAllOK = true;
	}
	
	else
	{
	   alert(gErrorMsg); 
       gErrorMsg = "";  
       isAllOK = false;
	}
   
    return isAllOK;
}

function validateForm4(){
    "use strict";  
    var isAllOK = false;
	gErrorMsg = "";	
	var addImageOK = chkCoverImage();
	var addCourseOK = chkCourseName();
	var addDescOK = chkDescription();
	var addTempOK = chkTemplate();
	
	if(addImageOK && addCourseOK && addDescOK && addTempOK)
	{
		isAllOK = true;
	}
	else
	{
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

function chkPswd(){
	var pwsd = document.getElementById("pwsd").value;     
	var pwsdOk = true;	
	if ((pwsd.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter a Password\n" 
        pwsdOk = false; 
        document.getElementById("pwsd").style.borderColor = "red";
	}
	
	return pwsdOk;
}

function chkReconfirmPassword(){
	var pwsd1 = document.getElementById("pwsd1").value;
	var pwsd = document.getElementById("pwsd").value;    
	var pwsd1Ok = true;	
	if ((pwsd1.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter reconfirmation Password\n" 
        pwsd1Ok = false; 
        document.getElementById("pwsd1").style.borderColor = "red";
	}
	
	else {
		if(pwsd != pwsd1)
		{
			gErrorMsg = gErrorMsg + "Reconfirmation Password is not the same as Password\n"
			pwsd1Ok = false;
		}
		
	}
	
	return pwsd1Ok;
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


function chkVenueName() {  //Venue Name
	var vname = document.getElementById("venue").value;
	var pattern = /^[a-zA-Z ]+$/      
	var vnameOk = true;
	if ((vname.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter your Venue name\n" 
        vnameOk = false; 
        document.getElementById("venue").style.borderColor = "red";
	}

	return vnameOk;
}

function chkStreetAddress() {  //Street Address
	var street = document.getElementById("street").value;
	//var pattern = /^[a-zA-Z ]+$/      
	var streetOk = true;
	if ((street.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter your Street Address\n" 
        cityOk = false; 
        document.getElementById("street").style.borderColor = "red";
	}

	return streetOk;
}

function chkCity() {  //Street Address
	var city = document.getElementById("city").value;
	var pattern = /^[a-zA-Z ]+$/      
	var cityOk = true;
	if ((city.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter the City\n" 
        cityOk = false; 
        document.getElementById("city").style.borderColor = "red";
	}

	return cityOk;
}

function chkPostcode() {  //Postcode
	var postcode = document.getElementById("code").value;
	var pattern = /^[a-zA-Z ]+$/      
	var postcodeOk = true;
	if ((postcode.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter the Postcode\n" 
        postcodeOk = false; 
        document.getElementById("code").style.borderColor = "red";
	}
	return postcodeOk; 
}

function chkTrainingProgram() {  // Training Program
	var selected = false;
	var trpr = document.getElementById("tcourse").value;

	if (trpr!=""){
		selected = true;
		document.getElementById("tcourse").style.borderColor = "black";
	}
	else{
		selected = false;
        document.getElementById("tcourse").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Choose a Training Program\n"
	}
	return selected;
}

function chkTrainingCategory() {  //Training Category
	var tCat = document.getElementById("category").value;   
	var tCatOk = true;
	if ((tCat.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter the Training Category\n" 
        tCat = false; 
        document.getElementById("category").style.borderColor = "red";
	}

	return tCatOk;  
}

function chkTrainingStartDate() {  //Training Start Date
	var selected = false;
	var trStDate = document.getElementById("Stdays").value;

	if (trStDate!=""){
		selected = true;
		document.getElementById("Stdays").style.borderColor = "black";
	}
	else{
		selected = false;
        document.getElementById("Stdays").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Choose a Training Start Date\n"
	}
	return selected; 
}

function chkTrainingEndDate() {  //Training End Date
	var selected = false;
	var trEDate = document.getElementById("Edays").value;

	if (trEDate!=""){
		selected = true;
		document.getElementById("Edays").style.borderColor = "black";
	}
	else{
		selected = false;
        document.getElementById("Edays").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Choose a Training End Date\n"
	}
	return selected; 
}

function chkTrainingStartTime() {  //Training Start Time
	var selected = false;
	var trSTime = document.getElementById("Stime").value;

	if (trSTime!=""){
		selected = true;
		document.getElementById("Stime").style.borderColor = "black";
	}
	else{
		selected = false;
        document.getElementById("Stime").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Choose a Training Start Time\n"
	}
	return selected; 
}

function chkTrainingEndTime() {  //Training End Time
	var selected = false;
	var trETime = document.getElementById("Etime").value;

	if (trETime!=""){
		selected = true;
		document.getElementById("Etime").style.borderColor = "black";
	}
	else{
		selected = false;
        document.getElementById("Etime").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Choose a Training End Time\n"
	}
	return selected; 
}

function chkCoverImage(){
    //validate there is a file uploaded for adding new training course
	var tImage = document.getElementById("addIMG").value;
	var cImageOk = true;
	if(tImage == ""){
		gErrorMsg = gErrorMsg + "Please upload an Image\n";
		tImage = false;
		document.getElementById("addIMG").style.borderColor = "red";
	}
	return cImageOk;
}

function chkCourseName(){
    //validate name is exist for adding new training course
    var cName = document.getElementById("addNAME").value;  
	var cNameOk = true;
	if ((cName.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter a name for the training course\n" 
        cNameOk = false; 
        document.getElementById("addNAME").style.borderColor = "red";
	}
	if ((cName.length >= 50)){
		gErrorMsg = gErrorMsg + "Please limit the name for the training course within 50 characters\n"
		cNameOk = false;
        document.getElementById("addNAME").style.borderColor = "red";
	}
	return cNameOk;
}

function chkDescription(){
    //validate description is exist for adding new training course
    var cDesc = document.getElementById("addDESC").value;  
	var cDescOk = true;
	if ((cDesc.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter a description for the training course\n" 
        cDescOk = false; 
        document.getElementById("addDESC").style.borderColor = "red";
	}
	if ((cDesc.length >= 200)){
		gErrorMsg = gErrorMsg + "Please limit the description for the training course within 200 characters\n"
		cDescOk = false;
        document.getElementById("addDESC").style.borderColor = "red";
	}
	return cDescOk;
}

function chkTemplate(){
    //validate there is a file uploaded for adding new training course
	var tTemp = document.getElementById("addTemp").value;
	var cTempOk = true;
	if(tTemp == ""){
		gErrorMsg = gErrorMsg + "Please upload a Template Link\n";
		tImage = false;
		document.getElementById("addTemp").style.borderColor = "red";
	}
	return cTempOk;
}

function validateInputOnBlur(){
	
	var objectLostFocus_id = this.id;
	var isOk = false;
	
	switch (objectLostFocus_id){
		case "name": 
			isOk = fName();
			break;
		case "pwsd": 
			isOk = chkPassword();
			break;
		case "pwsd1": 
			isOk = chkReconfirmPassword();
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
		case "venue":
			isOK = chkVenueName();
			break;
		case "street":
			isOK = chkStreetAddress();
			break;
		case "city":
			isOK = chkCity();
			break;
		case "code":
			isOK = chkPostcode();
			break;
		case "tcourse":
			isOK = chkTrainingCategory();
			break;
		case "category":
			isOK = chkTrainingProgram();
			break;
		case "Stdays":
			isOK = chkTrainingStartDate();
			break;
		case "Edays":
			isOK = chkTrainingEndDate();
			break;
		case "Stime":
			isOK = chkTrainingStartTime();
			break;
		case "Etime":
			isOK = chkTrainingEndTime();
			break;
		case "addIMG":
			isOK = chkCoverImage();
			break;
		case "addNAME":
			isOK = chkCourseName();
			break;
		case "addDESC":
			isOK = chkDescription();
			break;
		case "addTemp":
			isOK = chkTemplate();
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
	var myForm = document.getElementById("applicationForm");
	if(myForm == null)
    { 
		myForm = document.getElementById("adminRegistrationForm");
		if(myForm == null)
		{
			myForm = document.getElementById("clientRegistrationForm");
			if(myForm == null)
			{
				myForm = document.getElementById("addCourseForm");
				
			}
			
		}
	}
	var inputElements = myForm.getElementsByTagName("input");
	for (var i = 0; i < inputElements.length; i++){
		inputElements[i].onblur = validateInputOnBlur;
	}
}


function registerInputsOnClick(){  
	var myForm = document.getElementById("applicationForm");
	if(myForm == null)
    { 
		myForm = document.getElementById("adminRegistrationForm");
		if(myForm == null)
		{
			myForm = document.getElementById("clientRegistrationForm");
			if(myForm == null)
			{
				myForm = document.getElementById("addCourseForm");
				
			}
			
		}
	}
	var inputElements = myForm.getElementsByTagName("input");
	for (var i = 0; i < inputElements.length; i++){
		inputElements[i].onclick = resetFormat;
	}
}

function init() {
    var myForm = document.getElementById("applicationForm");
   
	registerInputsOnBlur();
	registerInputsOnClick();
   
   if(myForm != null)
   {
      myForm.onsubmit = validateForm3;
   }
   
   else
   {
	  myForm = document.getElementById("clientRegistrationForm");
	  if(myForm != null)
	  {	
			myForm.onsubmit = validateForm;
	  }
	  
	  else
	  {
		   myForm = document.getElementById("adminRegistrationForm");
		   if(myForm != null)
			{	
					myForm.onsubmit = validateForm2;
			}
			
		  else
		  {
				myForm = document.getElementById("addCourseForm");
				myForm.onsubmit = validateForm4;
		  }
	  }
   }
}

window.onload = init;
