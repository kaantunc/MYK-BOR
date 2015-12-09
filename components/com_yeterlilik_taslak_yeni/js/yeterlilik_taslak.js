function goToPage(pageName, yeterlilik_id){
	var form = document.ChronoContact_yeterlilik_taslak; 
	var action = 'index.php?option=com_yeterlilik_taslak_yeni&layout='+pageName+'&yeterlilik_id='+yeterlilik_id;
	
	form.action = action;    
	form.submit();
}
function yorumKaydet(pageName, yeterlilikId){
	var form = document.ChronoContact_yeterlilik_taslak; 
	var action = 'index.php?option=com_yeterlilik_taslak_yeni&task=yorumKaydet&layout='+pageName+'&yeterlilik_id='+yeterlilikId;

    form.action = action; 
	form.submit();
}
function yorumKaydet_Kurulus(pageName, standartId){
	var form = document.ChronoContact_meslek_std_taslak; 
	var action = 'index.php?option=com_meslek_std_taslak&task=yorumKaydet_Kurulus&layout='+pageName+'&standart_id='+standartId;

    form.action = action; 
	form.submit();
}
function validateSart(){
	if(jQuery("#sekil").val().length == 0)
		{
			jQuery("#sekil").css("border", "1px solid red");
			jQuery("#submitButton").attr('disabled', true);
			jQuery("#ERRORTEXT").html("Lütfen doldurunuz");
		}
	else
		{
				
			jQuery("#sekil").css("border", "1px solid #BDBDBD");
			jQuery("#submitButton").attr('disabled', false);
			jQuery("#ERRORTEXT").html(" ");
			
		}
	
}
function validateYeterlilikKaynaklari(){
	if(jQuery('#tablo_kaynak_meslek tbody tr').length == 0 )
		{
			
			jQuery("#tabloDIV").css("border", "1px solid red");
			jQuery("#kaydetButton").attr('disabled', true);
			jQuery("#ERRORTEXT").html("En az bir satır girmek zorunludur");
		}
	else
		{
			var hatali = false;
		
			jQuery('select[name="inputkaynak_meslek-3[]"]').each(function(index) {
			    if(jQuery(this).val() == "Seçiniz")
			    {
			    	hatali = true;
			    	jQuery("#tabloDIV").css("border", "1px solid red");
					jQuery("#kaydetButton").attr('disabled', true);
					jQuery("#ERRORTEXT").html("Lütfen Meslek Standart Adı Seçiniz");
			    }
			});
			//alert(jQuery('input[name$="inputkaynak_meslek-3[]"]').length);
			
			if(hatali==false)
			{
				jQuery("#tabloDIV").css("border", "none");
				jQuery("#kaydetButton").attr('disabled', false);
				jQuery("#ERRORTEXT").html(" ");
			}
		}
	
}
function userSubmit (index, yeterlilik_id){
	var action = "";
	var taslak = "";
	
	action = "index.php?option=com_yeterlilik_taslak_yeni&view=yeterlilik_taslak&layout=tum_basvuru&yeterlilik_id=" + yeterlilik_id+"&id="+index;
	
	var form = document.ChronoContact_yeterlilik_taslak;
	form.action = action;
    form.submit();
}
function sektorSorumlusuSubmit (index, yeterlilik_id){
	var action = "";
	if (index == 1){
		action = "index.php?option=com_yeterlilik_taslak_yeni&task=yorumlariGonder&yeterlilik_id=" + yeterlilik_id;
	}else if (index == 2){
		action = "index.php?option=com_yeterlilik_taslak_yeni&task=onBasvuruOnayla&yeterlilik_id=" + yeterlilik_id;
	}else if (index == 3){
		action = "index.php?option=com_yeterlilik_taslak_yeni&task=basvuruOnayla&yeterlilik_id=" + yeterlilik_id;
	}else if (index == 4){
		action = "index.php?option=com_yeterlilik_taslak_yeni&task=basvuruKurulusaGonder&yeterlilik_id=" + yeterlilik_id;
	}
	
	var form = document.ChronoContact_yeterlilik_taslak;
	form.action = action;
    form.submit();
}
function addTableValues (arr, params, name, arrId, noRowAdd, colCount){
	
	//alert("addTableValues: "+arr);
	
	
	if (noRowAdd == null)
		noRowAdd = false;
	
	var addRowColCount  = params.length;
	
	if (colCount == null)
		colCount = addRowColCount;
	
	var arrLength = arr.length;
	var rowNumber = (arrLength/colCount)-1;
	
//	document.getElementById("rowNumber-"+name).value = rowNumber;
//	addNRow (name,addRowColCount,name);
//	if (!noRowAdd)
//		rowAdded(name, name);
//	document.getElementById("rowNumber-"+name).value = 1;
	for (var j = 0; j < rowNumber; j++)
		document.getElementById ("satirEkle_"+name).onclick();
	
//	fireOnchangeFuncs(arr, params, name);
	
	jQuery(document).ready(function() {
		//Add the values to table
		var count = 0;
		for (var i = 0; count < arrLength; i++){		
			if (isset (arrId) && arrId != null){
				var rowId =  "tablo_" + name + "_"+(i+1);
				var elementId = name+"_"+(i+1);
				
				var idInp = document.createElement("input");
				idInp.setAttribute("type", "hidden");
				idInp.setAttribute("id", elementId);
				idInp.setAttribute("name",elementId);
				idInp.setAttribute("value", arrId [i]);
				
				var rowInp = document.createElement("input");
				rowInp.setAttribute("type", "hidden");
				rowInp.setAttribute("id", rowId);
				rowInp.setAttribute("name",rowId);
				rowInp.setAttribute("value", "1");
				
				var mainDiv  = document.getElementById(name+"_div");
				mainDiv.appendChild (idInp);
				var tableRow = document.getElementById(rowId);
				tableRow.appendChild(rowInp);
			}
			
			for (var j = 0; j < colCount; j++){ 
				var item = document.getElementById ('input'+name+'-'+(j+1)+'-'+(i+1));
				
			    if (params[j] == "text" || params[j] == "textarea"){
			    	item.value = arr[count];
			    	
			    }
			    else if (params[j] == "combo"){
			    	for (var k = 0; k < item.length; k++){
			        	if(item.options[k].value == arr[count]){
			        		item.selectedIndex = k;
			        		jQuery(item).change();
			    		}
			        }

			    }
			    else if(params[j]== "checkbox")
			    {
			    	
			    	if(arr[count]=="checked")
			    		item.checked = true;
			    	else
			    		item.checked = false;
			    } 
			    count++;  
			}
		}
	});
}
function addTableValuesReadOnly (arr, params, name, arrId, noRowAdd, colCount){
	
	if (noRowAdd == null)
		noRowAdd = false;
	
	var addRowColCount  = params.length;
	
	if (colCount == null)
		colCount = addRowColCount;
	
	var arrLength = arr.length;
	var rowNumber = (arrLength/colCount)-1;
	
	for (var j = 0; j < rowNumber; j++)
		document.getElementById ("satirEkle_"+name).onclick();
	
	
	jQuery(document).ready(function() {
		//Add the values to table
		var count = 0;
		for (var i = 0; count < arrLength; i++){		
			if (isset (arrId) && arrId != null){
				var rowId =  "tablo_" + name + "_"+(i+1);
				var elementId = name+"_"+(i+1);
				
				var idInp = document.createElement("input");
				idInp.setAttribute("type", "hidden");
				idInp.setAttribute("id", elementId);
				idInp.setAttribute("name",elementId);
				idInp.setAttribute("value", arrId [i]);
				
				var rowInp = document.createElement("input");
				rowInp.setAttribute("type", "hidden");
				rowInp.setAttribute("id", rowId);
				rowInp.setAttribute("name",rowId);
				rowInp.setAttribute("value", "1");
				
				var mainDiv  = document.getElementById(name+"_div");
				mainDiv.appendChild (idInp);
				var tableRow = document.getElementById(rowId);
				tableRow.appendChild(rowInp);
			}
			
			for (var j = 0; j < colCount; j++){ 
				var item = document.getElementById ('input'+name+'-'+(j+1)+'-'+(i+1));
				
				item.disabled="true";
			    
				if (params[j] == "text" || params[j] == "textarea"){
			    	item.value = arr[count];
			    	
			    	/*var x = jQuery('#'+'input'+name+'-'+(j+1)+'-'+(i+1));
			    	x.attr('cols', '');
			    	x.attr('rows', '');
			    	x.css('height', '100%');
			    	x.css('width', '100%');
			    	*/
			    }
			    else if (params[j] == "combo"){
			    	for (var k = 0; k < item.length; k++){
			        	if(item.options[k].value == arr[count]){
			        		item.selectedIndex = k;
			        		jQuery(item).change();
			    		}
			        }
			    }
			    else if(params[j]== "checkbox")
			    {
			    	
			    	if(arr[count]=="checked")
			    		item.checked = true;
			    	else
			    		item.checked = false;
			    }
			    	 
			    count++;  
			}
		}
	});
}
/*
function fireOnchangeFuncs(arr, params, name){
	var colCount  = params.length;
	var arrLength = arr.length;
	var count = 0;
	for (var i = 0; count < arrLength; i++){
		for (var j = 0; j < colCount; j++){ 
			var item = document.getElementById ('input'+name+'-'+(j+1)+'-'+(i+1));
			
			if (item !=null && params[j] == "combo"){
		    	for (var k = 0; k < item.length; k++){
		        	if(item.options[k].value == arr[count]){
		        		item.options[k].selected = "selected";
		        		item.onchange();
		    		}
		        }
		    }
		    count++;  
		}
	}
}*/
function satirEkleKaldir (tableName){
	elementSil(document.getElementById("rowNumber-"+tableName));
	elementSil(document.getElementById("satirEkle_"+tableName));
}
function satirSilKaldir (tableName, colNum){
	// tablo başlığından Satırı Sil? th sini sil
	var tabloElement = document.getElementById("tablo_"+tableName);
	var theadler = tabloElement.getElementsByTagName("thead");
	var thler;
	if(theadler[0])
		thler = theadler[0].getElementsByTagName("th");
	if(thler[colNum])
		elementSil(thler[colNum]);

	// Sil td lerini sil
	var trInp = document.getElementById("tablo_"+tableName+"_1");
	
	for(var i=2; trInp!= null ;i++){
		var tdler = trInp.getElementsByTagName("td");
		for(var j=0;j<tdler.length;j++){
			if(tdler[j].className == "tablo_sil_hucre"){
				elementSil(tdler[j]);
				break;
			}
		}
		
		trInp = document.getElementById("tablo_"+tableName+"_"+i);
	}
}
function isset(varname){
	return(typeof(varname)!="undefined");
}




