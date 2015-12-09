
var dPanels = new Object();
var rowCounter = new Object();

function getCounter(param) {
	if (rowCounter[param] == null)
		rowCounter[param] = 0;
	return rowCounter[param];

}
function incrementCounter(param) {
	if (rowCounter[param] == null)
		rowCounter[param] = 0;
	rowCounter[param]++;
	
	return true;
}

// radio => new Array("label", "radio", new Array(
// new Array("option1val", "option2val", "option3val"),
// new Array("option1id", "option2id", "option3id")))
//var sAlanlar = new Array(new Array("ad", "text"), new Array("soyad", "text"),
//		new Array("label", "radio", new Array(new Array("option1id",
//				"option1val"), new Array("option2id", "option2val"))));

function addPRows(Id, counterNo, alanlarId) {

	// alert("tablo: tablo_"+Id);
	var tbody = document.getElementById(Id + "_div").getElementsByTagName(
			"tbody")[0];

	for (inputIndex = 1; inputIndex < dPanels[alanlarId].length; inputIndex++) {
		incrementCounter(Id);
		var inputObj = dPanels[alanlarId][inputIndex];

		if (inputObj[1] == "text") {
			
			var textFieldSize = 25;
			var validateClass = null;
			
			if(inputObj[2] != null){
				validateClass = inputObj[2];
			}
			
			if(inputObj[3] != null){
				textFieldSize = inputObj[3];
			}
			
			var row = document.createElement("tr");
			row.setAttribute("id", "tablo_" + Id + "_"
					+ (getCounter(Id)));// getCounter(counterNo)+j

			var data = document.createElement("td");

			data.appendChild(document.createTextNode(inputObj[0]));
			//data.setAttribute("width", "150px");
			data.className = "panelTd";
			row.appendChild(data);

			data = document.createElement("td");

			var inp = document.createElement("input");
			inp.setAttribute("id", "input" + Id + "-" + (inputIndex + 1) + "-"
					+ (getCounter(Id)));// getCounter(counterNo)+j
			inp.setAttribute("name", "input" + Id + "-" + (inputIndex + 1));
			inp.setAttribute("type", "text");
			inp.setAttribute("size", textFieldSize);
			
			if(validateClass){
				//inp.setAttribute("class", validateClass);
				inp.className = validateClass;
			}
			data.appendChild(inp);
			data.className = "panelInputTd";
			
			if(inputObj[4] != null){
				
				var inp = document.createElement("input");
				inp.setAttribute("id", "datebutton" + Id + "-" + (inputIndex + 1) + "-"
						+ (getCounter(Id)));
				inp.setAttribute("type", "button");
				inp.setAttribute("value", "...");
				
//				if(dTables[tabloAlanlarId][i][4] != null)
//					inp.setAttribute("disabled", "disabled");
				
				data.appendChild(inp);
				
				//alert("class: " +validateClasses);
			}

		}
		
		else if (inputObj[1] == "textarea") {
			
			var rowCount = null;
			var colCount = null;
			var validateClass = null;
			
			if(inputObj[2]!= null)
				validateClass = inputObj[2];
			
			if(inputObj[3]!= null)
				rowCount = inputObj[3];
			
			if(inputObj[4]!= null)
				colCount = inputObj[4];
			
			var row = document.createElement("tr");
			row.setAttribute("id", "tablo_" + Id + "_"
					+ (getCounter(Id)));// getCounter(counterNo)+j

			var data = document.createElement("td");

			data.appendChild(document.createTextNode(inputObj[0]));
			//data.setAttribute("width", "150px");
			row.appendChild(data);

			data = document.createElement("td");

			var inp = document.createElement("textarea");
			inp.setAttribute("id", "input" + Id + "-" + (inputIndex + 1) + "-"
					+ (getCounter(Id)));// getCounter(counterNo)+j
			inp.setAttribute("name", "input" + Id + "-" + (inputIndex + 1));
			
			if(validateClass){
				//inp.setAttribute("class", validateClass);
				inp.className = validateClass;
			}
			
			if(rowCount)
				inp.setAttribute("rows", rowCount);
			
			if(colCount)
				inp.setAttribute("cols", colCount);
			
			data.appendChild(inp);
			//data.className = "colspanTd";
			//data.setAttribute("colspan", "2");
			//data.colSpan = "2";
		}
		
		else if (inputObj[1] == "baslik") {
			var row = document.createElement("tr");
			row.setAttribute("id", "tablo_" + Id + "_"
					+ (getCounter(Id)));// getCounter(counterNo)+j

			var data = document.createElement("td");
			
			var h3baslik = document.createElement("h3");
			
			h3baslik.appendChild(document.createTextNode(inputObj[0]));
			//data.setAttribute("width", "100%");
			//data.width = "100%";

			data.appendChild(h3baslik);
			//data.setAttribute("colspan", "2");
			data.colSpan = "2";
			data.className = "colspanTd";
			
			row.appendChild(data);
		}
		
		else if (inputObj[1] == "radio") {

			var row = document.createElement("tr");
			row.setAttribute("id", "tablo_" + Id + "_"
					+ (getCounter(Id)));// getCounter(counterNo)+j

			var data = document.createElement("td");

			data.appendChild(document.createTextNode(inputObj[0]));
			//data.setAttribute("width", "150px");
			data.className = "panelTd";
			row.appendChild(data);

			data = document.createElement("td");

			var radios = inputObj[2];

			var inp;

			for (m = 0; radios[m]; m++) {

				data.appendChild(document.createTextNode(radios[m][1] + ":"));

				inp = document.createElement("input");
				inp.setAttribute("id", "input" + Id + "-" + (inputIndex + 1) + "-"
						+ (getCounter(Id)));
				inp.setAttribute("name", "input" + Id + "-" + (inputIndex + 1) + "-"
						+ (getCounter(Id)));
				inp.setAttribute("type", "radio");
				inp.setAttribute("value", radios[m][0]);
				data.appendChild(inp);

				data.appendChild(document.createElement("br"));
			}

		}
		else if (inputObj[1] == "combo") {
			
			var validateClass = null;
			
			if(inputObj[3]!= null)
				validateClass = inputObj[3];

			var row = document.createElement("tr");
			row.setAttribute("id", "tablo_" + Id + "_"
					+ (getCounter(Id)));// getCounter(counterNo)+j

			var data = document.createElement("td");

			data.appendChild(document.createTextNode(inputObj[0]));
			//data.setAttribute("width", "150px");
			data.className = "panelTd";
			row.appendChild(data);

			data = document.createElement("td");

			var combos = inputObj[2];

			var inp=document.createElement("select");
			inp.setAttribute("id", "input"+Id+"-"+(inputIndex+1)+"-"+(getCounter(Id)));
			inp.setAttribute("name", "input"+Id+"-"+(inputIndex+1));

			if(validateClass){
				//inp.setAttribute("class", validateClass);
				inp.className = validateClass;
			}
			
			for (m = 0; combos[m]; m++) {
				inp.options[m] = new Option(combos[m][1],combos[m][0]);
			}
			data.appendChild(inp);

		}
		
		else if (inputObj[1] == "dtablo") {
						
			var row = document.createElement("tr");
			row.setAttribute("id", "tablo_" + Id + "_"
					+ (getCounter(Id)));// getCounter(counterNo)+j
			
			if(inputObj[0]!=""){

				var data = document.createElement("td");

				data.appendChild(document.createTextNode(inputObj[0]));
				row.appendChild(data);
			}
				
			data = document.createElement("td");
			
			if(inputObj[0]==""){
				//data.setAttribute("colspan", "2");
				data.colSpan = "2";
				data.className = "colspanTd";
			}

			var inp = document.createElement("div");

			inp.setAttribute("id", "div"+Id+"-"+(inputIndex+1)+"-"+(getCounter(Id))+"_div");
			data.appendChild(inp);
			//createTablo2("div"+Id+"-"+(i+1)+"-"+(getCounter(counterNo)));
									
		}
		
		row.appendChild(data);
		tbody.appendChild(row);
		
		if (inputObj[1] == "dtablo") {
			
			inputObj[2]("div"+Id+"-"+(inputIndex+1)+"-"+(getCounter(Id)));
			
		}
	}

	return true;
}

function addPanel(name, order, alanlarId, panelName, datePick) {
	name = alanlarId;
	order++;
	
	var panelCounter = document.getElementById("panelCount_" + alanlarId);
	panelCounter.value++;

	//alert(name.substring(0,name.length-1)+order + "_div");
	if (document.getElementById(name.substring(0, name.length - 1) + order
			+ "_div") == null) {
		var divElement = document.createElement('div');
		var id;
		if(name != alanlarId){
			id = name.substring(0, name.length - 1) + order + "_div";
		}else
			id = name.substring(0, name.length) + order + "_div";
		divElement.setAttribute("id", id);
		//divElement.setAttribute("class", "panel_main_div");
		divElement.className = "panel_main_div";
		document.getElementById(name + "_div").appendChild(divElement);
	}
	if(name != alanlarId){
		name = name.substring(0, name.length-1) + order;
	}else{
		name = name + order;
	}	
	createPTable(name, order, alanlarId, panelName);
	removeOldAddButton(alanlarId);
	addAddButton(name, order, alanlarId, panelName, datePick);
	
	/////////////////Belgelendirme başvurusu - akreditasyon bilgi sayfası için:
	if ( datePick != null) {
		var columnNoArr = new Array('5', '6', '7', '8');
		for (var i = 0; i < columnNoArr.length; i++){
			var columnNo = columnNoArr[i];	
			addDatePick2(name, columnNo);
		}
	}
	///////////////////////////////////////////////////////////////////////////

	return true;
}

function removeOldAddButton(alanlarId) {
	var button = document.getElementById("addNewPanelButton_"+alanlarId);
	var parent = button.parentNode.removeChild(button);
	
	return true;
}

function addAddButton(name, order, alanlarId, panelName, datePick) {
	
	var addPanelButtonDiv = document.createElement("div");
	//addPanelButtonDiv.setAttribute("class", "add_panel_div");
	addPanelButtonDiv.className = "add_panel_div";
	
	var addRows = document.createElement("input");
	//addRows.setAttribute("onclick", "javascript:addPanel('" + name + "','" + order + "','" + alanlarId + "','" + panelName + "');");
	addRows.setAttribute("type", "button");
	addRows.setAttribute("id", "addNewPanelButton_"+alanlarId);
	addRows.setAttribute("value", "Yeni "+panelName+" Ekle");
	addRows.onclick = function(){ // Note: onclick, not onClick
		addPanel(name, order, alanlarId, panelName, datePick);
		return true;
	};
	
	addPanelButtonDiv.appendChild(addRows);
	document.getElementById(name + "_div").appendChild(addPanelButtonDiv);
	
	return true;
}

//function createPanel(name, order, alanlarId, panelName) {
//	createPTable(name, order, alanlarId);
//	addAddButton(name, order, alanlarId, panelName);
//}

function createPTable(name, order, alanlarId, panelName) {
	var tableDiv =document.createElement("div");
	//tableDiv.setAttribute("class", "table_div");
	tableDiv.className = "table_div";
	
	var table = document.createElement("table");
	table.setAttribute('id', 'tablo_' + name);
	table.style.width= "100%";

	tbody = document.createElement('tbody');
	table.appendChild(tbody);
	
	var topDiv = document.createElement("div");
	//topDiv.setAttribute("class", "panel_top_div");
	topDiv.className = "panel_top_div";
	
	var heading = document.createElement("div");
	//heading.setAttribute("class", "panel_heading");
	heading.className = "panel_heading";
	var headerText = document.createTextNode(dPanels[alanlarId][0]);
	heading.appendChild(headerText);
	
	var buttonDiv = document.createElement("div");
	//buttonDiv.setAttribute("class", "panel_kaldir_button_div");
	buttonDiv.className = "panel_kaldir_button_div";
	buttonDiv.setAttribute("id", "panel_kaldir_button");
	
	var delButton = document.createElement("button");
	//delButton.setAttribute("onclick", "javascript:deletePanel('"+name + "_div');");
	delButton.setAttribute("type", "button");
		var buttonText = document.createTextNode(panelName +' Kaldır');
	delButton.appendChild(buttonText);
	
	delButton.onclick = function(){ 
		deletePanel(name + "_div");
	    return true;
	};
	
	buttonDiv.appendChild(delButton);
	
	var clearDiv = document.createElement("div");
	clearDiv.className = "panel_clear";
	
	
	var mainDiv = document.getElementById(name + "_div");
	
	topDiv.appendChild(heading);
	topDiv.appendChild(buttonDiv);
	topDiv.appendChild(clearDiv);
	mainDiv.appendChild(topDiv);
	tableDiv.appendChild(table);
	mainDiv.appendChild(tableDiv);
	
	mainDiv.appendChild(document.createElement("hr"));

	addPRows(name, order, alanlarId);
	// addNRow(name,order,headers.length);

	return true;
}

function createNPanels(n, name, panelName, datePick){
	
	if(panelName == null)
		panelName = "Panel";
	
	panelNumber=1;
	if(document.getElementById('tablo_' + name) == null){		
		createPTable(name, panelNumber, name, panelName);
		addAddButton(name, panelNumber, name, panelName, datePick);
		panelNumber++;
		
		var panelCountInp = document.createElement("input");
		panelCountInp.setAttribute("type", "hidden");
		panelCountInp.setAttribute("id", "panelCount_" + name);
		panelCountInp.setAttribute("name", "panelCount_" + name);
		panelCountInp.setAttribute("value", "0");
		
		var mainDiv = document.getElementById(name + "_div");
		mainDiv.appendChild(panelCountInp);
		
	}
	
	for(;panelNumber<=n;panelNumber++){
		addPanel(name, panelNumber-1, name, panelName);
	}
	
	return true;
}

function deletePanel(name){
	
	var divClassesToDelete = new Array("panel_top_div", "table_div");
	
	var panelDiv = document.getElementById(name);
	
	if(panelDiv==null)
		return;
	
	var childDivs = panelDiv.getElementsByTagName("div");
	
	for(var i=0;i<childDivs.length;i++){
		
		for(var j=0;j<divClassesToDelete.length;j++){
			if(divClassesToDelete[j]== childDivs[i].className){			
				if(childDivs[i].parentNode == panelDiv){
					removeChildSafe(childDivs[i]);
				}
			}
		}
					
	}
	var childHr = panelDiv.getElementsByTagName("hr");
	
	if(childHr[0]==null){
		return;
	}
	
	removeChildSafe(childHr[0]);
	
	return true;
}

function removeChildSafe(el) {
    //before deleting el, recursively delete all of its children.
    while(el.childNodes.length > 0) {
        removeChildSafe(el.childNodes[el.childNodes.length-1]);
    }
    el.parentNode.removeChild(el);
}
