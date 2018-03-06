	function danas_datum() {
	document.getElementById('datum').valueAsDate = new Date();
	};

function dodaj_red() {
	var line = document.createElement("tr");
	var text = document.createTextNode("<td>broj</td>");
	line.appendChild(text);
	//document.getElementById("tabela").appendChild(line);
	document.getElementById("dodajdugme").insertBefore(line);
}