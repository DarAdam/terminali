	function danas_datum() {
	document.getElementById('datum').valueAsDate = new Date();
	};

function dodaj_red() {
	var table = document.getElementById("tabela");
	var ukred = table.getElementsByTagName("tr").length;
	var red = table.insertRow(ukred-1);
	var cell1 = red.insertCell(0);
	var cell2 = red.insertCell(1);
	var cell3 = red.insertCell(2);

	var inputT = document.createElement('input');
	var att = document.createAttribute("name");
	att.value = "terminal[]";
	inputT.setAttributeNode(att);

	var inputQ = document.createElement('input');
	var attQ = document.createAttribute("name");
	attQ.value = "qprox[]";
	inputQ.setAttributeNode(attQ);

	cell1.innerHTML = ukred - 1;
	cell2.appendChild(inputT);
	cell3.appendChild(inputQ);
}