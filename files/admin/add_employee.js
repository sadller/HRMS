function checkFName(){
    var pattern = /^[a-zA-Z]+$/;
    var x = document.forms["add_emp_form"]["fname"].value;
    var y = document.getElementById("errfname");
    if(x=="")   {y.innerHTML="";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only characters are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}



function checkLName(){
    var pattern = /^[a-zA-Z]+$/;
    var x = document.forms["add_emp_form"]["lname"].value;
    var y = document.getElementById("errlname");
    if(x=="")   {y.innerHTML="";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only characters are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}




function checkUName(){
    var pattern = /^[a-zA-Z0-9]+$/;
    var x = document.forms["add_emp_form"]["uname"].value;
    var y = document.getElementById("erruname");
    if(x=="")   {y.innerHTML="";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only characters are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}



function checkMobile(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["add_emp_form"]["mobile"].value;
    var y = document.getElementById("errmobile");
    if(x=="")   {y.innerHTML="";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else if(x.length!=10) {y.innerHTML="*Length should be 10 ";     return false;}
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
    
    var x = document.forms["add_emp_form"]["dob"].value;
    var y = document.getElementById("errdob");
    var cur_y = cur.split('-');
    var inp_y = x.split('-');
        cur_y = parseInt(cur_y[0]);
    var inp_d = parseInt(inp_y[2]);
    var inp_m = parseInt(inp_y[1]);
        inp_y = parseInt(inp_y[0]);

    if(x=="")   {y.innerHTML="*Invalid Date";     return false;}
    else if(inp_y>cur_y || inp_y<1950 || inp_d==NaN || inp_m==NaN || inp_y==NaN) {y.innerHTML="*Invalid Year";  x=""; flag=false;   return false;}
    else if(isNaN(inp_d) || isNaN(inp_m) || isNaN(inp_y)) {y.innerHTML="*Invalid Date";   flag=false;   return false;}
    else{y.innerHTML=""; return true;}
}



function checkEmail(){
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var x = document.forms["add_emp_form"]["email"];
    var y = document.getElementById("erremail");
    if(x.value=="")   {y.innerHTML="";    return false;}
    else if(!x.value.match(pattern)) {y.innerHTML="*Invalid Email";    return false;}
    else if(x.length>35) {y.innerHTML="*Max 35 characters";    return false;}
    else{y.innerHTML=""; return true;}
}



function checkNationality(){
    var x = document.forms["add_emp_form"]["nationality"].value;
    var c = document.getElementById("country_list"); 
    var y = document.getElementById("errnationality"); 
    if(!c.find("option value="+x)){
        {y.innerHTML="*Invalid Country";  x="";  return false;}
    }else{y.innerHTML=""; return true;}
}



function checkDOJ(){
    var x = document.forms["add_emp_form"]["doj"].value;
    var y = document.getElementById("errdoj");
    var inp_y = x.split('-');
    var inp_d = parseInt(inp_y[2]);
    var inp_m = parseInt(inp_y[1]);
        inp_y = parseInt(inp_y[0]);
    if(x=="")   {y.innerHTML="";     return false;}
    else if(isNaN(inp_d) || isNaN(inp_m) || isNaN(inp_y)) {y.innerHTML="*Invalid Date";   flag=false;   return false;}
    else if(inp_y<1990) {y.innerHTML="*Must be joined after 1990";     return false;}
    else{y.innerHTML=""; return true;}
}



function checkBasic(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["add_emp_form"]["basic"].value;
    var y = document.getElementById("errbasic");
    if(x=="")   {y.innerHTML="";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}



function checkHRA(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["add_emp_form"]["hra"].value;
    var y = document.getElementById("errhra");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkConveyance(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["add_emp_form"]["conveyance"].value;
    var y = document.getElementById("errconveyance");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkMedical(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["add_emp_form"]["medical"].value;
    var y = document.getElementById("errmedical");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkSpecial(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["add_emp_form"]["special"].value;
    var y = document.getElementById("errspecial");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkProvident(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["add_emp_form"]["provident"].value;
    var y = document.getElementById("errprovident");
    if(x=="") {y.innerHTML=""; return true;}
    if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkBankName(){
    var pattern = /^[a-zA-Z ]+$/;
    var x = document.forms["add_emp_form"]["bankname"].value;
    var y = document.getElementById("errbankname");
    if(x=="")   {y.innerHTML="";     return false;}
    else if(x.length>50) {y.innerHTML="*Max 50 characters.";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only characters are allowed";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkAccount(){
    var pattern = /^[0-9]+$/;
    var x = document.forms["add_emp_form"]["account"].value;
    var y = document.getElementById("erraccount");
    if(x=="")   {y.innerHTML="";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Only Numbers are allowed";     return false;}
    else if(x.length<10 || x.length>16) {y.innerHTML="*Invalid Length ";     return false;}
    else{y.innerHTML=""; return true;}
}

function checkPAN(){
    var pattern = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}$/;
    var x = document.forms["add_emp_form"]["pan"].value;
    var y = document.getElementById("errpan");
    if(x=="")   {y.innerHTML="";   return true;}
    else if(x.length>20) {y.innerHTML="*Max 20 characters.";     return false;}
    else if(!x.match(pattern)) {y.innerHTML="*Invalid PAN.";     return false;}
    else{y.innerHTML=""; return true;}
}
