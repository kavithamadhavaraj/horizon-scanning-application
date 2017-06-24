var username="";
var passWord="";
var myArray = [];
var req = new XMLHttpRequest();

function login_validation() {
	myArray.push(document.login_form.username.value);
	myArray.push(document.login_form.passWord.value);
	var jsonString = JSON.stringify(myArray);
	var test=0;
		$.ajax({
                type: "POST",
                url: "http://localhost/techstore/gentelella-master/production/authuserverify.php", 
				data : {action: jsonString},
				async: false,
                success: function(output){
                	console.log(output);
                }
            });

		}
