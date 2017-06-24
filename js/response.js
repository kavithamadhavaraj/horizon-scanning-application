function scoreCalc() {
var arr = [	["Check11", "Check12", "Check131", "Check132", "Check133", "Check134", "Check135"],
			["Check21", "Check22", "Check231", "Check232", "Check233", "Check234", "Check235"],
			["Check31", "Check32", "Check331", "Check332", "Check333", "Check334", "Check335"],
			["Check41", "Check42", "Check431", "Check432", "Check433", "Check434", "Check435"],
			["Check51", "Check52", "Check531", "Check532", "Check533", "Check534", "Check535"],
			["Check61", "Check62", "Check631", "Check632", "Check633", "Check634", "Check635"],
			["Check71", "Check72", "Check731", "Check732", "Check733", "Check734", "Check735"],
			["Check81", "Check82", "Check831", "Check832", "Check833", "Check834", "Check835"],
			["Check91", "Check92", "Check931", "Check932", "Check933", "Check934", "Check935"],
			["CheckA1", "CheckA2", "CheckA31", "CheckA32", "CheckA33", "CheckA34", "CheckA35"]
];
var nodeid=[];
var scoreMap = [];
var titleMap =[];
//var scoreMap = new Object();
//var titleMap = new Object();
for(var j=0; j<obj_id_data.length; j++){
	var temp =[];
	for(var k = 0; k < 7; k++){
		var tech = document.getElementsByName(arr[j][k]);
		for (var i = 0; i < tech.length; i++) {
			if (tech[i].checked) {
				temp[k]= parseInt(tech[i].value);
			}
			else{
				temp[k]= null;
			}
		}
	}
	if(temp.length!= 0){
		nodeid.push(tech_nodeid[j]);
		scoreMap.push(temp);
		titleMap.push(title_data[j]);
		//scoreMap[tech_nodeid[j]] = temp;
		//titleMap[tech_nodeid[j]] = title_data[j];
	}
}
console.log(scoreMap);
var userData = {node: nodeid , score: scoreMap, title: titleMap};
var jsonString = JSON.stringify(userData);
	
var test = userData['score'];
var req = new XMLHttpRequest();
$.ajax({
        type: "POST",
        url: 'http://localhost/techstore/gentelella-master/production/techdataupdate.php',
		data: {data1 : jsonString},
		dataType: "json",
		async: true,
        success: function(data)
        {	
        	console.log("success");
			 console.log(data);
       }
    });
req.onreadystatechange = function() 
{
	if(req.readyState == 4) {
        return req.status === 200 ? 
            success(req.responseText) : error(req.status);
    }
}
}
