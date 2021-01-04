function checkPassword(){
    var x = document.forms["edit_form"]["password"].value;
    var y = document.getElementById("errpassword");
    if(x=="")   { y.innerHTML="*Password must be filled out";     return false;}
    else if(x.length>20) { y.innerHTML="*Max 20 characters allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkMobile(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["mobile"].value;
    var y = document.getElementById("errmobile");
    if(x=="")   { y.innerHTML="*Mobile must be filled out";     return false;}
    else if(!x.match(pattern)) { y.innerHTML="*Only Numbers are allowed";     return false;}
    else if(x.length!=10) { y.innerHTML="*Length should be 10 ";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkDOB(){
    var d=new Date();
        if(d.getMonth()+1 <= 9)
			var cur=d.getYear()+1900+"-0"+(d.getMonth()+1);
		else
			var cur=d.getYear()+1900+"-"+(d.getMonth()+1);
        if(d.getDate()<= 9)
			var cur=d.getYear()+1900+"-0"+(d.getMonth()+1)+"-0"+d.getDate();
		else
			var cur=d.getYear()+1900+"-"+(d.getMonth()+1)+"-"+d.getDate();
    
    var x = document.forms["edit_form"]["dob"].value;
    var y = document.getElementById("errdob");
    var cur_y = cur.split('-');
    var inp_y = x.split('-');
        cur_y = parseInt(cur_y[0]);
    var inp_d = parseInt(inp_y[2]);
    var inp_m = parseInt(inp_y[1]);
        inp_y = parseInt(inp_y[0]);
        
    if(x=="")   { y.innerHTML="*Please input a valid Date";     return false;}
    else if(inp_y>cur_y || inp_y<1950) { y.innerHTML="*Invalid Year";     return false;}
    else if(isNaN(inp_d) || isNaN(inp_m) || isNaN(inp_y)) { y.innerHTML="*Invalid Date";   flag=false;   return false;}
    else{y.innerHTML=""; return true;}
}

function checkEmail(){
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var x = document.forms["edit_form"]["email"];
    var y = document.getElementById("erremail");
    if(x.value=="")   {y.innerHTML="*Email must be filled out";    return false;}
    else if(!x.value.match(pattern)) {y.innerHTML="*Invalid Email";    return false;}
    else if(x.length>35) {y.innerHTML="*Max 35 characters";    return false;}
    else{y.innerHTML=""; return true;}
}

function checkF_name(){
    var pattern = /^[a-zA-Z ]+$/;
    var x = document.forms["edit_form"]["f_name"].value;
    var y = document.getElementById("errf_name");
    if(x=="")   {y.innerHTML="*Username must be filled out";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only characters are allowed";     return false;}
    else if(x.length>30) {y.innerHTML="*Max 30 characters";    return false;}
    else{y.innerHTML=""; return true;}
}

function checkMYear(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["m_year"].value;
    var y = document.getElementById("errm_year");
    if(x=="")   {y.innerHTML="";  return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    if(parseInt(x)<1900 || isNaN(x) || x.length>4) {y.innerHTML="*Invalid Year";     return false;}
    y.innerHTML=""; return true;
}

function checkBYear(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["b_year"].value;
    var y = document.getElementById("errb_year");
    if(x=="")   {y.innerHTML="";  return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    if(parseInt(x)<1900 || isNaN(x) || x.length>4) {y.innerHTML="*Invalid Year";     return false;}
    y.innerHTML=""; return true;
}

function checkMCGPA(){
    var pattern1 = /^([0-9]){1,2}$/;
    var pattern = /^([0-9]){1,2}([.]){1}([0-9]){1,2}$/;
    var per = /[%]/; 
    var x = document.forms["edit_form"]["m_cgpa"].value;
    var y = document.getElementById("errm_cgpa");
    if(x=="")   {y.innerHTML="";  return true;}
    if(x.match(pattern1)) {y.innerHTML="";   return true;}
    if(x.match(per)) {y.innerHTML="*% sign not allowed";     return false;}
    if(!x.match(pattern)) {y.innerHTML="*Invalid CGPA";     return false;}
    if(parseInt(x)<0 || parseInt(x)>100 || isNaN(x) || x.length>4) {y.innerHTML="*Invalid CGPA";     return false;}
    y.innerHTML=""; return true;
}

function checkBCGPA(){
    var pattern1 = /^([0-9]){1,2}$/;
    var pattern = /^([0-9]){1,2}([.]){1}([0-9]){1,2}$/;
    var per = /[%]/;
    var x = document.forms["edit_form"]["b_cgpa"].value;
    var y = document.getElementById("errb_cgpa");
    if(x=="")   {y.innerHTML="";  return true;}
    if(x.match(pattern1)) {y.innerHTML="";   return true;}
    if(x.match(per)) {y.innerHTML="*% sign not allowed";     return false;}
    if(!x.match(pattern)) {y.innerHTML="*Invalid CGPA";     return false;}
    if(parseInt(x)<0 || parseInt(x)>100 || isNaN(x) || x.length>4) {y.innerHTML="*Invalid CGPA";    return false;}
    y.innerHTML=""; return true;
}

function checkDOJ(){
  
    var x = document.forms["edit_form"]["doj"].value;
    var y = document.getElementById("errdoj");
    var inp_y = x.split('-');
    var inp_d = parseInt(inp_y[2]);
    var inp_m = parseInt(inp_y[1]);
        inp_y = parseInt(inp_y[0]);
    if(x=="")   {y.innerHTML="*Please input a valid Date";     return false;}
    else if(isNaN(inp_d) || isNaN(inp_m) || isNaN(inp_y)) {y.innerHTML="*Invalid Date";   flag=false;   return false;}
    else if(inp_y<1990) {y.innerHTML="*Must be joined after 1990";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkBasic(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["basic"].value;
    var y = document.getElementById("errbasic");
    if(x=="")   {y.innerHTML="*Basic Salary must be filled out";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkHRA(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["hra"].value;
    var y = document.getElementById("errhra");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkConveyance(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["conveyance"].value;
    var y = document.getElementById("errconveyance");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkMedical(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["medical"].value;
    var y = document.getElementById("errmedical");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkSpecial(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["special"].value;
    var y = document.getElementById("errspecial");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkProvident(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["provident"].value;
    var y = document.getElementById("errprovident");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkBankName(){
    var pattern = /^[a-zA-Z ]+$/;
    var x = document.forms["edit_form"]["bankname"].value;
    var y = document.getElementById("errbankname");
    if(x=="")   {y.innerHTML="*Bank Name must be filled out";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only characters are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkAccount(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["edit_form"]["account"].value;
    var y = document.getElementById("erraccount");
    if(x=="")   {y.innerHTML="*Account No. must be filled out";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else if(x.length<10 || x.length>16) {y.innerHTML="*Invalid Length ";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkPAN(){
    var pattern = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}$/;
    var x = document.forms["edit_form"]["pan"].value;
    var y = document.getElementById("errpan");
    if(x=="")   {y.innerHTML="";   return true;}
    else if(!x.match(pattern)) {y.innerHTML="*Invalid PAN";     return false;}
    else{y.innerHTML=""; return true;}
}