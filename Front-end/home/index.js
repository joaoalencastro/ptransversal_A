function toggleNavPanel(x)
{
	var panel = document.getElementById(x), navarrow = document.getElementById("navarrow"), maxH="600px";
	if(panel.style.height == maxH){
		panel.style.height = "0px";
		navarrow.innerHTML = "&#9662;";
	}else{
		panel.style.height = maxH;
		navarrow.innerHTML = "&#9652;";
	}
}
function date()
{
	var now = new Date;
	var day = now.getDate();
	var month = now.getMonth();
	var year = now.getFullYear();
	month++;
	if(day < 10)
	{
		var zero = '0';
		day = zero.concat(day);
	}
	if(month < 10)
	{
		var zero = '0';
		month = zero.concat(month);
	}
	var d = new Date();
	 days = ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"];
	return days[d.getDay()] + ', ' +  day+ '/' + month + '/'+ year;
}	
function Status() 
{
	var status = [1,2,1,2,2,2,2,0,0,2,2,2,0,2,2,2,2,2,2,2,2,2,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
	2,2,2,2,0,0,2,2,2,2,2,2,1,2,2,2,2,0,2,0,2,2,2,2,0,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,
	2,2,2,2,2,2,0,2,2,2,2,2,2,2,2,1,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,0,2,1]
	for(var i = 0; i < 150;i++)
	{
		var id_str = "q";
		id_str = id_str.concat(100+i);
		console.log(id_str);
		if(status[i] == 0)
			var x;
		else if(status[i] == 1)
		{
				document.getElementById(id_str).style.background = "#F0F03E";
		}
		else if(status[i] == 2)
		{
			document.getElementById(id_str).style.background = "#E03A3A";
			document.getElementById(id_str).style.cursor = "auto";
		}
		else
			document.getElementById(id_str).style.background = "black";

	}
}