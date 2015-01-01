// JavaScript Document

var doChange = function(id){
	var oldvalue = document.getElementById(id+"lbl").innerHTML;
    document.getElementById(id+"lbl").innerHTML = document.getElementById(id).value;
	if(document.getElementById(id+"lbl").innerHTML == "")
	{
			document.getElementById(id+"lbl").innerHTML = oldvalue;
	}
}

