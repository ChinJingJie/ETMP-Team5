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

//Show Password by Liew Woun Kai
function showPwsd(){
	var show = document.getElementById("pwsd");
	var hidepass1 = document.getElementById("hide1");
	var hidepass2 = document.getElementById("hide2");
	if (show.type == "password") {
		show.type = "text";
		hidepass1.style.display = "block";
		hidepass2.style.display = "none";
	} else {
		show.type = "password";
		hidepass1.style.display = "none";
		hidepass2.style.display = "block";
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
function programSelection(text) {
    var selectedValue = text.value;
    sessionStorage.product = document.getElementById("tcourse").value;
    sessionStorage.productIndex = document.getElementById("tcourse").selectedIndex + 1;
    document.getElementById("tcats").selectedIndex = sessionStorage.productIndex - 1;
    var categories = document.getElementById("tcats").value;
    sessionStorage.category = categories;
    if(selectedValue=="Others")
    {
        document.getElementById("dynamicName").style.display = "";
        sessionStorage.category = "Others";
    }
    else
    {
        document.getElementById("dynamicName").style.display = "none";
    }
    document.getElementById("category").value = sessionStorage.category;
}

function IDSelection(text){
	 document.getElementById("trainingID").value = sessionStorage.trid;
}


function storeID(id1){
	sessionStorage.trid = id1;
}

//Data transfer between pages by Chin Jing Jie
function storePrograms(programCat,programName) {
    if (programName == 'Others'){
        sessionStorage.category = "others";
        sessionStorage.product = programName;
    }
    else{
        sessionStorage.category = programCat;
        sessionStorage.product = programName;
    }
}

//Submit type button selected in a single form by Chin Jing Jie
function btnSelect(slt) {
    sessionStorage.selection = slt;
}

//Autoload select dropdown by Chin Jing Jie
function autoProductName() {
    document.getElementById("tcourse").value = sessionStorage.product;
    if (sessionStorage.product == "Others"){
        document.getElementById("dynamicName").style.display = "";
        document.getElementById("fileSlt").style.display = "";
    }
    else
    {
        document.getElementById("dynamicName").style.display = "none";
    }
    document.getElementById("category").value = sessionStorage.category;
}

// Dynamic File Selection Message in Chat by Chin Jing Jie
function fileSelectionMsg(slt) {
    sessionStorage.chatUpload = slt;
    if (sessionStorage.chatUpload == "upload"){
        document.getElementById("fileSlt").style.display = "block";
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
	var vNameOK= chkVenueName();
	var stAddressOK = chkStreetAddress();
	var cityOK = chkCity();
	var postcodeOK = chkPostcode();
	var trStDateOK = chkTrainingStartDate();
	var trEndDateOK = chkTrainingEndDate();
	var trStTimeOK = chkTrainingStartTime();
	var trEndTimeOK = chkTrainingEndTime();
	var trTempOK = chkTrainingTemplate();
    var proceed; 
	proceed = confirm("Proceed on with current form?");
	if (proceed == true)
	{
        if (sessionStorage.selection == "book"){
            if(vNameOK && stAddressOK && cityOK && postcodeOK && trEndDateOK && trStDateOK && trStTimeOK && trEndTimeOK && trTempOK)
            {

                isAllOK = true;
            }else{
                alert(gErrorMsg); 
                gErrorMsg = "";  
                isAllOK = false;
            }
        }
        if (sessionStorage.selection == "save"){
            gErrorMsg = "";  
            isAllOK = true;
        }
    }
	else{
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

function validateForm5(){
	"use strict"; 
	var isAllOK = false;
    gErrorMsg = "";	
	var StarRatingOK = chkStarRating();
	var OvrExperienceOK = chkOvrExperience();
	var ImprovementOK = chkImprovement();
	var TrainPerformOK = chkTrainerComment();
	var proceed; 
	proceed = confirm("Proceed on with current form?");
	if (proceed == true)
	{
		if(OvrExperienceOK && ImprovementOK && TrainPerformOK && StarRatingOK)
		{
			isAllOK = true;
		}
		
		else
		{
		   alert(gErrorMsg);
		   gErrorMsg = "";
		   isAllOK = false;
		}
	}
	
	else
	{
		gErrorMsg = "";  
        isAllOK = false;
	}
	
	return isAllOK;
}

function validateForm6(){
	"use strict"; 
	var isAllOK = false;
    gErrorMsg = "";	
	var oldpassOK = chkoldpass();
	var newpassOK = chknewpass();
	var confirmpassOK = chkconfirmpass(); 

	if(oldpassOK && newpassOK && confirmpassOK)
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
	var code = document.getElementById("code").value;
	var postcode = true;
	if ((code.length == 0)){
		gErrorMsg = gErrorMsg + "Please enter your Postcode\n"
        postcode = false;
        document.getElementById("code").style.borderColor = "red";
	}
	else{
		if ((code.length < 5)){
			gErrorMsg = gErrorMsg + "Please enter your Postcode with not less than 5 digits\n"
			postcode = false;
            document.getElementById("code").style.borderColor = "red";
		}
	}
	return postcode;
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

function chkTrainingTemplate() {  //Training Template
	var selected = false;
	var trTemp = document.getElementById("template").value;

	if (trTemp!=""){
		selected = true;
		document.getElementById("template").style.borderColor = "black";
	}
	else{
		selected = false;
        document.getElementById("template").style.borderColor = "red";
		gErrorMsg = gErrorMsg + "Please Upload a Training Template\n"
	}
	return selected; 
}

function chkCoverImage(){
    //validate there is a file uploaded for adding new training course
	var tImage = document.getElementById("addIMG");
	var tImageV;
	var cImageOk = true;
	if(tImage != null)
	{
		tImageV = document.getElementById("addIMG").value;
	}
	
	else
	{
		tImage = document.getElementById("picture3");
		tImageV = document.getElementById("picture3").value;
	}
	
	if(tImageV == ""){
		gErrorMsg = gErrorMsg + "Please upload an Image\n";
		cImageOk = false;
		tImage.style.borderColor = "red";
	}
	
	return cImageOk;
}

function chkCourseName(){
    //validate name is exist for adding new training course
	var cName = document.getElementById("addNAME");
    var cNameV;  
	var cNameOk = true;
	if(cName != null)
	{
		cNameV = document.getElementById("addNAME").value;
	}
	
	else
	{
		cName = document.getElementById("tName3");
		cNameV = document.getElementById("tName3").value;
	}
	if ((cNameV.length == 0)){ 
		gErrorMsg = gErrorMsg + "Please enter a name for the training course\n" 
        cNameOk = false; 
        cName.style.borderColor = "red";
	}
	if ((cNameV.length >= 50)){
		gErrorMsg = gErrorMsg + "Please limit the name for the training course within 50 characters\n"
		cNameOk = false;
        cName.style.borderColor = "red";
	}
	return cNameOk;
}

function chkDescription(){
    //validate description is exist for adding new training course
    var cDesc = document.getElementById("addDESC");
	var cDescV;
	var cDescOk = true;
	if (cDesc != null)
	{
		cDescV = document.getElementById("addDESC").value; 
	}
	
	else
	{
		cDesc = document.getElementById("tDesc3")
		cDescV = document.getElementById("tDesc3").value;
	}
	if ((cDescV.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter a description for the training course\n" 
        cDescOk = false; 
        cDesc.style.borderColor = "red";
	}
	if ((cDescV.length >= 200)){
		gErrorMsg = gErrorMsg + "Please limit the description for the training course within 200 characters\n"
		cDescOk = false;
        cDesc.style.borderColor = "red";
	}
	return cDescOk;
}

function chkTemplate(){
    //validate there is a file uploaded for adding new training course
	var tTemp = document.getElementById("addTemp");
	var tTempV;
	var cTempOk = true;
	if(tTemp != null)
	{
		tTempV = document.getElementById("addTemp").value;
	}
	
	else
	{
		tTemp = document.getElementById("tTemp3");
		tTempV = document.getElementById("tTemp3").value;
	}
	if(tTempV == ""){
		gErrorMsg = gErrorMsg + "Please upload a Template Link\n";
		tImage = false;
		tTemp.style.borderColor = "red";
	}
	return cTempOk;
}

function chkStarRating()
{
	var star = document.getElementsByName("star");
	var fStar = true;
	
	if(star[0].checked | star[1].checked | star[2].checked | star[3].checked | star[4].checked)
	{
		
	}
	
	else
	{
		gErrorMsg = gErrorMsg + "Please rate a rating for your training program\n";
		fStar = false;
	}
	
	return fStar;
}

function chkOvrExperience()
{
	var val = document.getElementById("experience").value;
	var fOEOK = true;
	
	if (/^\s*$/g.test(val)) {
        gErrorMsg = gErrorMsg + "Please fill in the Overall Experience Field\n";
		fOEOK = false;
		document.getElementById("experience").style.borderColor = "red";
    }	
	return fOEOK ;
}

function chkImprovement()
{
	var val = document.getElementById("improvement").value;
	var fI = true;
	
	if (/^\s*$/g.test(val)) {
        gErrorMsg = gErrorMsg + "Please fill in the Improvement Field\n";
		fI = false;
		document.getElementById("improvement").style.borderColor = "red";
    }	
	return fI ;
}

function chkTrainerComment()
{
	var val = document.getElementById("TrainPerform").value;
	var fTC = true;
	
	if (/^\s*$/g.test(val)) {
        gErrorMsg = gErrorMsg + "Please fill in the Comments on Trainer Performance Field\n";
		fTC = false;
		document.getElementById("TrainPerform").style.borderColor = "red";
    }	
	return fTC ;
}

function chkoldpass(){
	var pwsd = document.getElementById("pwsd").value;     
	var pwsdOk1 = true;	
	if ((pwsd.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter the Old Password\n" 
        pwsdOk1 = false; 
        document.getElementById("pwsd").style.borderColor = "red";
	}
	
	return pwsdOk1;
}

function chknewpass(){
	var pwsd2 = document.getElementById("pwsd2").value;     
	var pwsdOk2 = true;	
	if ((pwsd2.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter the New Password\n" 
        pwsdOk2 = false; 
        document.getElementById("pwsd2").style.borderColor = "red";
	}
	
	return pwsdOk2;
}

function chkconfirmpass(){
	var pwsd3 = document.getElementById("pwsd3").value;
	var pwsd2 = document.getElementById("pwsd2").value;       
	var pwsdOk3 = true;	
	if ((pwsd3.length == 0)){        
		gErrorMsg = gErrorMsg + "Please enter the New Password again\n" 
        pwsdOk3 = false; 
        document.getElementById("pwsd3").style.borderColor = "red";
	}
	else {
		if(pwsd3 != pwsd2)
		{
			gErrorMsg = gErrorMsg + "Password not match\n"
			pwsdOk3 = false;
		}
		
	}
	
	return pwsdOk3;
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
		case "template":
			isOK = chkTrainingTemplate();
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
		case "experience":
			isOK = chkOvrExperience();
			break;
		case "improvement":
			isOK = chkImprovement();
			break;
		case "TrainPerform":
			isOK = chkTrainerComment();
			break;
		case "pwsd":
			isOK = chkoldpass();
			break;
		case "pwsd2":
			isOK = chknewpass();
			break;
		case "pwsd3":
			isOK = chkconfirmpass();
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
				if(myForm == null)
				{
					myForm = document.getElementById("feedbackForm");
					if(myForm == null)
					{
						myForm = document.getElementById("EditTrainingForm");
						if(myForm == null)
						{
							myForm = document.getElementById("changepwsd");
						
						}
						
					}
				}
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
				if(myForm == null)
				{
					myForm = document.getElementById("feedbackForm");
					if(myForm == null)
					{
						myForm = document.getElementById("EditTrainingForm");
						if(myForm == null)
						{
							myForm = document.getElementById("changepwsd");
						
						}
					}
				}
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
      autoProductName();
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
				if(myForm != null)
				{
					myForm.onsubmit = validateForm4;
				}
				
				else
				{
					myForm = document.getElementById("feedbackForm");
					if(myForm != null)
					{
						IDSelection(this);
						myForm.onsubmit = validateForm5;
					}
					
					else
					{
						myForm = document.getElementById("EditTrainingForm");
						if(myForm != null)
						{
							myForm.onsubmit = validateForm4;
						}
						
						else
						{
							myForm = document.getElementById("changepwsd");
							if(myForm != null)
							{
								myForm.onsubmit = validateForm6;
							}
						
							else
							{
							
							}
						}
					}		
				}	
		  }
	  }
   }
}

window.onload = init;
