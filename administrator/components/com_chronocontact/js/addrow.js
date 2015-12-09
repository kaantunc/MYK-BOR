//var counterArray = new Array(0,  1,1,1,1,1,    1,1,1,1,1,   1,1,1,1,1,   1,1,1,1,1);
var dTables = new Object();
var rowCounter = new Object();

function addNRow(Id, columnNo, tabloAlanlarId) {
	if (document.getElementById("rowNumber-" + Id) == null)
		number = 1;
	else {
		number = document.getElementById("rowNumber-" + Id).value;

		if (number == null || number == "") {
			number = 1;
		}
	}

	if (number > 0)
		incrementCounter(Id);
	var tbody = document.getElementById("tablo_" + Id).getElementsByTagName(
			"tbody")[0];
	for (j = 0; j < number; j++) {

		var row = document.createElement("tr");
		//row.setAttribute("class", "tablo_row");
		if (((getCounter(Id) + j - 1)%2) == 0)
			row.className = "tablo_row";
		else
			row.className = "tablo_row2";
		
		row.setAttribute("id", "tablo_" + Id + "_"
				+ (getCounter(Id) + j));

		for (i = 0; i < columnNo; i++) {
			var data = document.createElement("td");
			if (dTables[tabloAlanlarId] != null
					&& dTables[tabloAlanlarId][i][0] == "combo") {
				
				var combos = dTables[tabloAlanlarId][i][1];
				
				var inp=document.createElement("select");
				inp.setAttribute("id", "input"+Id+"-"+(i+1)+"-"+((getCounter(Id)) + j));
				inp.setAttribute("name", "input"+Id+"-"+(i+1)+"[]");
				
				if(dTables[tabloAlanlarId][i][2] != null){
					//inp.setAttribute("class", dTables[tabloAlanlarId][i][2]);
					inp.className = dTables[tabloAlanlarId][i][2];
					if( dTables[tabloAlanlarId][i][2] == "disabled")
					inp.disabled=true;
				}
				
				if(dTables[tabloAlanlarId][i][3] != null && dTables[tabloAlanlarId][i][3] != ""){
//					inp.setAttribute("onchange", dTables[tabloAlanlarId][i][3]);
					jQuery(inp).change(new Function("", "return " + dTables[tabloAlanlarId][i][3] + ";"));
				}
				
				if(dTables[tabloAlanlarId][i][4] != null){
					//inp.setAttribute("style", inp.getAttribute("style") + ";width:"+dTables[tabloAlanlarId][i][4]+"px");
					inp.style.width = dTables[tabloAlanlarId][i][4]+"px";
				}
				for (m = 0; combos[m]; m++) {
					inp.options[m] = new Option(combos[m][1],combos[m][0]);
				}
				
				var newDiv = document.createElement("div");
				newDiv.setAttribute("id", "div"+Id+"-"+(i+1)+"-"+((getCounter(Id)) + j));
				
				data.appendChild(newDiv);
				newDiv.appendChild(inp);
				  
				
				/*var inp = document.createElement("select");
				inp.setAttribute("id", "input" + Id + "-" + (i + 1) + "-"
						+ (getCounter(Id) + j));
				inp.setAttribute("name", "input" + Id + "-" + (i + 1) + "[]");

				for (m = 1; dTables[tabloAlanlarId][i][m]; m++) {
					inp.options[m - 1] = new Option(
							dTables[tabloAlanlarId][i][m][1],
							dTables[tabloAlanlarId][i][m][0]);
				}
				data.appendChild(inp);*/
			}
			else if (dTables[tabloAlanlarId] != null
					&& dTables[tabloAlanlarId][i][0] == "listbox") {
				
				var combos = dTables[tabloAlanlarId][i][1];
				
				var inp=document.createElement("select");
				inp.setAttribute("id", "input"+Id+"-"+(i+1)+"-"+((getCounter(Id)) + j));
				inp.setAttribute("name", "input"+Id+"-"+(i+1)+"-"+((getCounter(Id)) + j)+"[]");
				
				if(dTables[tabloAlanlarId][i][2] != null){
					//inp.setAttribute("class", dTables[tabloAlanlarId][i][2]);
					inp.className = dTables[tabloAlanlarId][i][2];
				}
				
				if(dTables[tabloAlanlarId][i][3] != null){
					inp.setAttribute("onchange", dTables[tabloAlanlarId][i][3]);
				}
				

				if(dTables[tabloAlanlarId][i][4] != null){
					inp.setAttribute("multiple", "multiple");
					inp.setAttribute("size", dTables[tabloAlanlarId][i][4]);
				}
				

				if(dTables[tabloAlanlarId][i][5] != null){
					//inp.setAttribute("style", inp.getAttribute("style") + ";width:"+dTables[tabloAlanlarId][i][5]+"px");
					inp.style.width = dTables[tabloAlanlarId][i][5]+"px";
				}

				for (m = 0; combos[m]; m++) {
					inp.options[m] = new Option(combos[m][1],combos[m][0]);
				}
				data.appendChild(inp);
				
				
				/*var inp = document.createElement("select");
				inp.setAttribute("id", "input" + Id + "-" + (i + 1) + "-"
						+ (getCounter(Id) + j));
				inp.setAttribute("name", "input" + Id + "-" + (i + 1) + "[]");

				for (m = 1; dTables[tabloAlanlarId][i][m]; m++) {
					inp.options[m - 1] = new Option(
							dTables[tabloAlanlarId][i][m][1],
							dTables[tabloAlanlarId][i][m][0]);
				}
				data.appendChild(inp);*/
			}
			else if (dTables[tabloAlanlarId] != null
					&& dTables[tabloAlanlarId][i][0] == "radio") {
				
				var radios = dTables[tabloAlanlarId][i][1];

				var inp;

				for (m = 0; radios[m]; m++) {

					
					inp = document.createElement("input");
					inp.setAttribute("id", "input" + Id + "-" + (i + 1) + "-"
							+ ((getCounter(Id)) + j)+ "-" + m);
					inp.setAttribute("name", "input" + Id + "-" + (i + 1)+ "-"
							+ (getCounter(Id) + j) + "[]" );
					inp.setAttribute("type", "radio");
					inp.setAttribute("value", radios[m][0]);
					if (radios[m][2]=="checked"){
						inp.setAttribute("checked", radios[m][2]);
					}
					data.appendChild(inp);
					data.appendChild(document.createTextNode(radios[m][1] + ""));
					data.appendChild(document.createElement("br"));
					//data.appendChild(document.createElement("br"));
				}
				//data.setAttribute("class", "tablo_radio_hucre");
				data.className = "tablo_radio_hucre";

//				var inp;
//
//				for (m = 1; dTables[tabloAlanlarId][i][m]; m++) {
//					data.appendChild(document
//							.createTextNode(dTables[tabloAlanlarId][i][m][1]
//									+ ":"));
//
//					inp = document.createElement("input");
//					inp.setAttribute("id", "input" + Id + "-" + (i + 1) + "-"
//							+ (getCounter(Id) + j));
//					inp.setAttribute("name", "input" + Id + "-" + (i + 1) + "-"
//							+ (getCounter(Id) + j));
//					inp.setAttribute("type", "radio");
//					inp.setAttribute("value", dTables[tabloAlanlarId][i][m][0]);
//					data.appendChild(inp);
//
//					data.appendChild(document.createElement("br"));
//				}

			} 
			else if (dTables[tabloAlanlarId] != null
					&& dTables[tabloAlanlarId][i][0] == "checkbox") {
				
				
				
				var classOfElement = dTables[tabloAlanlarId][i][1];//buradan class gelmeli
				var checked = dTables[tabloAlanlarId][i][2];//buradan checked gelmeli
				var checkBoxName = dTables[tabloAlanlarId][i][3];//buradan checkBoxName gelmeli
				var readOnly = dTables[tabloAlanlarId][i][4];//buradan readOnly gelmeli

				var inp;

				
					data.appendChild(document.createTextNode(checkBoxName));

					inp = document.createElement("input");
					inp.setAttribute("id", "input" + Id + "-" + (i + 1) + "-" + ((getCounter(Id)) + j));
					inp.setAttribute("name", "input" + Id + "-" + (i + 1) + "-" + ((getCounter(Id)) + j) + "[]" );
					inp.setAttribute("type", "checkbox");
					if(checked=="checked")
					inp.setAttribute("checked", checked );
					inp.setAttribute("class", classOfElement );
					data.appendChild(inp);

					data.appendChild(document.createElement("br"));
				
				


			}
			else if (dTables[tabloAlanlarId] != null
					&& dTables[tabloAlanlarId][i][0] == "upload") {
				//var upId = Id;
				var upId = Id + "_" + j;
				//
				var id_ek="";
				if(dTables[tabloAlanlarId][i][1] != null){
					var upId = Id + "_" + j;
					id_ek = "organizasyonSemasi";
					upId = id_ek + upId;
				}
				//
				
				var genelStr = '<div id="'+upId+'_form_div_'+(getCounter(Id) + j)+'">'
				+'<div id="'+upId+'_result_div_'+(getCounter(Id) + j)+'">'
				+'</div>'
				+'<form action="?option=com_file_upload&amp;id='+upId+'&amp;sira='+(getCounter(Id) + j)+'" id="'+upId+'_upload_form_'+(getCounter(Id) + j)+'"' 
					+'method="post" enctype="multipart/form-data" target="'+upId+'_upload_target_'+(getCounter(Id) + j)+'" onsubmit="return startUpload(\''+ upId + '\', \'' + (getCounter(Id) + j) + '\')">'
				+'<iframe style="width: 0pt; height: 0pt; border: 0px solid rgb(255, 255, 255);" src="#" name="'+upId+'_upload_target_'+(getCounter(Id) + j)+'"' 
					+'id="'+upId+'_upload_target_'+(getCounter(Id) + j)+'"></iframe>'
				+'<input type="hidden" name="file_count" value="'+(getCounter(Id) + j)+'">'
				+'<input type="hidden" name="id" value="'+upId+'">'
				+'<div id="'+upId+'_upload_process_'+(getCounter(Id) + j)+'" style="visibility: hidden; height: 0px;">Gönderiliyor...<img src="administrator/components/com_chronocontact/images/loader.gif">'
				+'</div>'
				+'<div id="'+upId+'_upload_form_span_'+(getCounter(Id) + j)+'">'
				+'<input type="file" size="30" id="'+upId+'_file_'+(getCounter(Id) + j)+'" name="'+upId+'_file_'+getCounter(Id)+'">'
				+'<input type="submit" name="'+upId+'_submitBtn_'+getCounter(Id)+'" class="up_submitbtn" value="Yükle">'
				+'</div>'
				+'<input type="hidden" id="'+upId+'_form_hidden_'+(getCounter(Id) + j)+'" name="'+upId+'_form_hidden[]">'
				+'</form>'
				+'</div>';
				
				data.innerHTML = genelStr + data.innerHTML;

			}
			else if(dTables[tabloAlanlarId] != null
					&& dTables[tabloAlanlarId][i][0] == "textarea"){
				
				var rowCount = null;
				var colCount = null;
				var validateClasses = "";
				var inp = document.createElement("textarea");
				
				if(dTables[tabloAlanlarId][i][1]!= null)
					validateClasses = dTables[tabloAlanlarId][i][1];
				
				if(dTables[tabloAlanlarId][i][2]!= null)
					rowCount = dTables[tabloAlanlarId][i][2];
				
				if(dTables[tabloAlanlarId][i][3]!= null)
					colCount = dTables[tabloAlanlarId][i][3];
				
				
				if(dTables[tabloAlanlarId][i][4] != null){
					inp.setAttribute("readOnly", "readonly");
					//alert("class: " +validateClasses);
				}

				inp.setAttribute("id", "input" + Id + "-" + (i + 1) + "-"
						+ (getCounter(Id) + j));
				inp.setAttribute("name", "input" + Id + "-" + (i + 1) + "[]");
				
				if(validateClasses != ""){
					//inp.setAttribute("class", validateClasses);
					inp.className = validateClasses;
				}
				
				if(rowCount)
					inp.setAttribute("rows", rowCount);
				
				if(colCount)
					inp.setAttribute("cols", colCount);
				data.appendChild(inp);
			}
			
			else if(dTables[tabloAlanlarId] != null
					&& dTables[tabloAlanlarId][i][0] == "hidden"){
				

				var textFieldSize = 25;
				var validateClasses = "";
				if(dTables[tabloAlanlarId][i][2] != null){
					textFieldSize = dTables[tabloAlanlarId][i][2];
					//alert("size: "+validateClasses);
				}
				if(dTables[tabloAlanlarId][i][1] != null){
					validateClasses = dTables[tabloAlanlarId][i][1];
					//alert("class: " +validateClasses);
				}
				
				var inp = document.createElement("input");
				inp.setAttribute("id", "input" + Id + "-" + (i + 1) + "-"
						+ (getCounter(Id) + j));
				inp.setAttribute("name", "input" + Id + "-" + (i + 1) + "[]");
				inp.setAttribute("type", "hidden");
				inp.setAttribute("size", textFieldSize);
				if(validateClasses != ""){
					//inp.setAttribute("class", validateClasses);
					if(validateClasses=="datepicker")
					{
						jQuery(inp).datepicker({ });
						jQuery(inp).attr("maxlength", "10");
					}
					inp.className = validateClasses;
					//inp.setAttribute("title",  title="This field is required,Please enter a valid number in this field,Please use numbers only in this field,Please use letters only (a-z) in this field,Please use letters only (a-z) or numbers (0-9) in this field,Please enter a valid date in this format yyyy/mm/dd,Please enter a valid email address,Please enter a valid URL,Please use this date format: dd/mm/yyyy,Please enter a valid $ amount,Please make sure that the two fields match,Please select one of the options,Please make a selection");
				}
				
				if(dTables[tabloAlanlarId][i][4] != null){
					inp.setAttribute("readOnly", "readonly");
					//alert("class: " +validateClasses);
				}
				
				data.appendChild(inp);
				
				if(dTables[tabloAlanlarId][i][5] == true){
					inp.setAttribute("disabled",true);
					//alert("class: " +validateClasses);
				}
				data.appendChild(inp);
				
				
				if(dTables[tabloAlanlarId][i][3] == "date"){
					
					var inp = document.createElement("input");
					inp.setAttribute("id", "datebutton" + Id + "-" + (i + 1) + "-"
							+ (getCounter(Id) + j));
					inp.setAttribute("type", "button");
					inp.setAttribute("value", "...");
					
//					if(dTables[tabloAlanlarId][i][4] != null)
//						inp.setAttribute("disabled", "disabled");
					
					data.appendChild(inp);
					
					//alert("class: " +validateClasses);
				}
			}
			
			
			else {
				var textFieldSize = 25;
				var validateClasses = "";
				if(dTables[tabloAlanlarId][i][2] != null){
					textFieldSize = dTables[tabloAlanlarId][i][2];
					//alert("size: "+validateClasses);
				}
				if(dTables[tabloAlanlarId][i][1] != null){
					validateClasses = dTables[tabloAlanlarId][i][1];
					//alert("class: " +validateClasses);
				}
				
//				var div1 = document.createElement("div");
//				div1.setAttribute("class", "form_item");
//				var div2 = document.createElement("div");
//				div2.setAttribute("class", "form_element cf_textbox");

				var inp = document.createElement("input");
				inp.setAttribute("id", "input" + Id + "-" + (i + 1) + "-"
						+ (getCounter(Id) + j));
				inp.setAttribute("name", "input" + Id + "-" + (i + 1) + "[]");
				inp.setAttribute("type", "text");
				inp.setAttribute("size", textFieldSize);
				if(validateClasses != ""){
					//inp.setAttribute("class", validateClasses);
					if(validateClasses=="datepicker")
					{
						jQuery(inp).datepicker({ });
						jQuery(inp).attr("maxlength", "10");
					}
					inp.className = validateClasses;
					//inp.setAttribute("title",  title="This field is required,Please enter a valid number in this field,Please use numbers only in this field,Please use letters only (a-z) in this field,Please use letters only (a-z) or numbers (0-9) in this field,Please enter a valid date in this format yyyy/mm/dd,Please enter a valid email address,Please enter a valid URL,Please use this date format: dd/mm/yyyy,Please enter a valid $ amount,Please make sure that the two fields match,Please select one of the options,Please make a selection");
				}
				
				if(dTables[tabloAlanlarId][i][4] != null){
					inp.setAttribute("readOnly", "readonly");
					//alert("class: " +validateClasses);
				}
				
//				div2.appendChild(inp);
//				div1.appendChild(div2);

				data.appendChild(inp);
				
				if(dTables[tabloAlanlarId][i][5] == true){
					inp.setAttribute("disabled",true);
					//alert("class: " +validateClasses);
				}
				data.appendChild(inp);
				
				/*if(dTables[tabloAlanlarId][i][6] == true){
					inp.setAttribute("onchange","vakvak(this)");
					//alert("class: " +validateClasses);
				}
				data.appendChild(inp);*/
				
				if(dTables[tabloAlanlarId][i][3] == "date"){
					
					var inp = document.createElement("input");
					inp.setAttribute("id", "datebutton" + Id + "-" + (i + 1) + "-"
							+ (getCounter(Id) + j));
					inp.setAttribute("type", "button");
					inp.setAttribute("value", "...");
					
//					if(dTables[tabloAlanlarId][i][4] != null)
//						inp.setAttribute("disabled", "disabled");
					
					data.appendChild(inp);
					
					//alert("class: " +validateClasses);
				}
				
			}

			row.appendChild(data);
		}
		// Satir Silme tusunu ekle
		var data = document.createElement("td");
		//data.setAttribute("class", "tablo_sil_hucre");
		data.className = "tablo_sil_hucre";
		//data.setAttribute('width', '10%');
		data.width = "10%";
		var inp = document.createElement("input");
		inp.setAttribute("id", "satirSil_"+Id+"-"+(getCounter(Id) + j));
		inp.setAttribute("type", "button");
		inp.setAttribute("value", "Sil");
		var delId = (getCounter(Id) + j);
		//inp.setAttribute("onclick", 'deleteRow("' + "tablo_" + Id + "_"	+ (getCounter(Id) + j) + '")');
		//inp.style.width= ""+(550/columnNo)+"px";
		
		inp.onclick = newDeleteRowFunc(Id, delId);
		
		data.appendChild(inp);
		row.appendChild(data);

		tbody.appendChild(row);

	}
	
	for (j = 0; j < number-1; j++)
		incrementCounter(tabloAlanlarId);
	
	return true;
}

function newDeleteRowFunc(Id, delId, elementId){
	return function(){ 
		if (elementId){
			xmlhttpPost(function (){return true;}, 'index.php?option=com_kurulus_edit&task=isTaslak&format=raw&id=' + elementId, function (){return;}, deleteUpdatePageFunction, "tablo_" + Id + "_" + delId, elementId);
		}else{	
			deleteRow("tablo_" + Id + "_"	+ delId, elementId );
			deleteInput(Id+delId);
		}
	};
}

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

function xmlhttpPost(checkFunction, strURL, getQueryStringFunction, updatePageFunction , id, elementId) {
	if(checkFunction != null && !checkFunction())
		return;
	var xmlHttpReq = false;
	var self = this;
	// Mozilla/Safari
	if (window.XMLHttpRequest) {
		self.xmlHttpReq = new XMLHttpRequest();
	}
	// IE
	else if (window.ActiveXObject) {
		self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	self.xmlHttpReq.open('POST', strURL, true);
	self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	self.xmlHttpReq.onreadystatechange = function() {
		if (self.xmlHttpReq.readyState == 4) {
			var str = self.xmlHttpReq.responseText;
			//document.getElementById("debug").innerHTML = str;
			updatePageFunction(str, id, elementId);
		}
	};
	self.xmlHttpReq.send(getQueryStringFunction());
}

function deleteUpdatePageFunction(str, id, elementId){
	var conf = true;
	
	if (str){ //Taslak
		conf = confirm('Listeden silinmek istenen öğenin taslak verisi bulunmaktadır. Silinsin mi?');
	}
	
	if (conf)
		deleteRow(id, elementId);
}

function deleteInput(id){
	var input_id = document.getElementById(id);
	input_id.remove();
}

function deleteRow(id, elementId) {	
	var tablo_id = id.substring(0, id.lastIndexOf('_'));

	var tablo = document.getElementById(tablo_id);
	var eleman = document.getElementById(id);

	var rowIndex = eleman.sectionRowIndex+1;
	tablo.deleteRow(rowIndex, elementId);

	return true;
}

function createTable(name, headers, dTabloIndex) {
	if(dTabloIndex == null)
		dTabloIndex = name;
	var table = document.createElement("table");
	table.setAttribute('id', 'tablo_' + name);
	table.style.width= "100%";
	var headRow = document.createElement ('tr');
	thead = document.createElement('thead');
	//thead.setAttribute("class", "tablo_header");
	thead.className = "tablo_header";
	for (i = 0; headers[i]; i++) {
		
		th = document.createElement('th');
		
		var headerRawText = headers[i];

		for(;headerRawText.indexOf('<br />') != -1;){
			var firstPart = headerRawText.substring(0, headerRawText.indexOf('<br />'));
			
			thtext1 = document.createTextNode(firstPart);
			th.appendChild(thtext1);
			th.appendChild(document.createElement("br"));
			
			//thtext2 = document.createTextNode(secondPart);
			headerRawText = headerRawText.substring(headerRawText.indexOf('<br />')+6,headerRawText.length);

			
		}
		th.appendChild(document.createTextNode(headerRawText));
//		else{
//			thtext = document.createTextNode(headers[i]);
//			th.appendChild(thtext);
//		}
		
		headRow.appendChild(th);
		
	}
	
	th = document.createElement('th');
	thtext = document.createTextNode("Satırı Sil?");
	th.appendChild(thtext);
	headRow.appendChild(th);
	thead.appendChild(headRow);
	
	table.appendChild(thead);

	tbody = document.createElement('tbody');
	table.appendChild(tbody);
	document.getElementById(name + "_div").appendChild(table);
	addNRow(name, headers.length, dTabloIndex);

	var rowNumber = document.createElement("input");
	rowNumber.setAttribute("id", "rowNumber-" + name);
	rowNumber.setAttribute("name", "rowNumber-" + name);
	rowNumber.setAttribute("type", "text");
	rowNumber.setAttribute("size", "1");
	rowNumber.setAttribute("value", "1");

	document.getElementById(name + "_div").appendChild(rowNumber);

	var addRows = document.createElement("input");
	//addRows.setAttribute("onclick", "javascript:addNRow('" + name + "','"+ headers.length + "','" + dTabloIndex + "');");
	addRows.setAttribute("type", "button");
	addRows.setAttribute("id", "satirEkle_"+name);
	addRows.setAttribute("value", "Adet yeni satir ekle");
	
	addRows.onclick = function(){ 
		addNRow(name , headers.length , dTabloIndex);
	    return true;
	};

	document.getElementById(name + "_div").appendChild(addRows);

	return true;
}
