var emaildata = "";
var userName = "";
var passWord = "";
var role = "";
function form_validate() {
	emaildata = document.cred_generate_form.EMail.value
	if( document.cred_generate_form.EMail.value == "" )
         {
            alert( "Please provide your Email!" );
            document.cred_generate_form.EMail.focus() ;
         }
	else{
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emaildata) == false) 
        {
            alert('Invalid Email Address');
        } 
		else{
			generate_credentials();
		}
	}
}
function randomString(length, chars) {
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
    return result;
}
function generate_credentials() {
	userName =randomString(8, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
	passWord =randomString(8, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
	document.getElementById("e-mail").value = emaildata;
	document.getElementById("username").value = userName;
	document.getElementById("password").value = passWord;
	document.getElementById('togenerate_cred').style.display = 'none';
	document.getElementById('generated_cred').style.display = 'block';
}
function addCredentials(){
var array=[];
var checkdata;
role = 	document.getElementById("expert").value ;
array.push(emaildata);
array.push(userName);
array.push(passWord);
array.push(role);
var jsonString = JSON.stringify(array);
$.ajax({
        type: "POST",
        async: false,
        url: "http://localhost/techstore/gentelella-master/production/authdataupdate.php",
        data: {action: jsonString}, 
        cache: false,
        success: function(output){
           console.log(output);
           			json = JSON.parse(output);
					console.log(json["answer"]);
					if(json.answer == "success")
						alert("Credentials added successfully");
					else
						alert("Email / User ID already exists !");
        }
    });
	//alert("Document inserted successfully");
	window.location = "http://localhost/techstore/gentelella-master/production/credentials_generate.php";
}
