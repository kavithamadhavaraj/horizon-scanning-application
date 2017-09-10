var title_data = [];
var url_data = [];
var desc_data = [];
var obj_id_data =[];
var tech_nodeid = [];

function loadData(){
var req = new XMLHttpRequest();
   
	$.ajax({
		type: 'GET',
		url: SERVER_URL +'techdataselect.php',
		dataType: "json",
		async: true,
		success: function(output){
			console.log(output);
			obj_id_data = output[0];
			title_data = output[1];
			url_data = output[2];
			desc_data = output[3];
			for(var i=0; i < obj_id_data.length; i++){
				tech_nodeid[i] = obj_id_data[i].$oid ;
			}
			var ul = document.getElementById('wizard_list');
			$('#wizard_list').empty();

			for(var i=1; i<=obj_id_data.length; i++){
				var li=document.createElement('li');
					var aTag = document.createElement('a');
					aTag.setAttribute('href',"#step-"+i);
					var spanTag = document.createElement('span')
					spanTag.setAttribute('class',"step_no");
					spanTag.innerHTML = i;
					aTag.appendChild(spanTag);
				li.appendChild(aTag);
				ul.appendChild(li);
				document.getElementById("step-"+i).style.display = "block";
				$('#tech-'+i).empty();
				document.getElementById("tech-"+i).innerHTML = title_data[i-1];
				document.getElementById("tech-"+i+"-desc").innerHTML = desc_data[i-1];
				$('#tech-'+i+'-url').empty();
				var url1 = document.getElementById("tech-"+i+"-url");
				var aTag1= document.createElement('a');
				aTag1.setAttribute('href',url_data[i-1]);
				aTag1.innerHTML = url_data[i-1];
				url1.appendChild(aTag1);
			}
		}
	});

}

