
var boCount = new Object();
var boToplamCount = new Object();
var islemCount = new Object();
var tableLetters = ['A', 'B', 'C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','Y','Z'];
var tableCount = 0;// hiç tablo oluşturulmadıysa 0 dan başlat
function addGibTable(divId, readOnly){
		
	createGibTable(tableLetters[tableCount++], divId, readOnly);
}

function getIslemCount(tableLetter){
	if(islemCount[tableLetter] == null || islemCount[tableLetter] == 0)
		islemCount[tableLetter] = 1;
	return islemCount[tableLetter];
}

function addToIslemCount(tableLetter, num){
	islemCount[tableLetter] = getIslemCount(tableLetter)+num;
}

function getBoToplamCount(tableLetter){
	if(boToplamCount[tableLetter]==null || boToplamCount[tableLetter]==0)
		boToplamCount[tableLetter] = 1;
	return boToplamCount[tableLetter];
}

function addToBoToplamCount(tableLetter, num){
	boToplamCount[tableLetter] = getBoToplamCount(tableLetter)+num;
}

function getBoCount(tableLetter, parent){
	if(boCount[tableLetter + parent]==null || boCount[tableLetter + parent]==0)
		boCount[tableLetter + parent] = 1;
	return boCount[tableLetter + parent];
}

function addToBoCount(tableLetter, parent, num){
	boCount[tableLetter + parent] = getBoCount(tableLetter, parent)+num;
}

function setBoCount(tableLetter, parent, num){
	boCount[tableLetter + parent] = num;
}

function createGibTable(tableLetter, divId, readOnly){
	if (readOnly == null)
		readOnly = "";
	
	// gib table silme
	//jQuery('<div id="table_'+tableLetter+'_Div"><input type="button" class="removeGibTable" onclick="confirm(\'Emin misiniz?\') && removeGibTable(\''+tableLetter+'\')" value="Görev Tablosunu Kaldır" /></div').appendTo('#'+divId);
	jQuery('<div id="table_'+tableLetter+'_Div"></div').appendTo('#'+divId);
	jQuery('<table id="table_'+tableLetter+'" border="0" class="tableGib"></table').appendTo('#table_'+tableLetter+'_Div');

	var thead = jQuery('<thead class="gibHeader"><td colspan="2">Görevler</td><td colspan="2">İşlemler</td><td colspan="3">Başarım Ölçütleri</td>');

	jQuery('#table_'+tableLetter+'').append(thead);

	var tbody = jQuery('<tbody id="table_'+tableLetter+'_tbody"></tbody>');

	tbody.append(jQuery('<tr class="tablo_header_acik">'+
    '<td>Kod</td><td>Adı</td><td>Kod</td><td>Adı</td><td>Kod</td><td>Açıklama</td><td>Dip Not</td></tr>'));

	tbody.append(jQuery('<tr id="'+tableLetter+'_1_1" class="'+tableLetter+'_1_last"><td id="'+tableLetter+'Static" class="headerTd">'+tableLetter+'<br><input id="ekle_'+tableLetter+'" type="button" value=">" onclick="islemEkle(\''+tableLetter+'\')" /></td><td id="'+tableLetter+'Inp"><textarea rows="5" cols="20" class="gib_input" id="input_'+tableLetter+'" name="input_'+tableLetter+'" '+readOnly+' ></textarea><textarea rows="2" cols="20" class="gib_input" id="input_dipnot_'+tableLetter+'" name="input_dipnot_'+tableLetter+'" '+readOnly+' ></textarea></td><td id="'+tableLetter+'1Static" class="headerTd">'+tableLetter+'.1<br><input id="ekle_'+tableLetter+'_1" value=">" type="button" onclick="boEkle(\''+tableLetter+'\', '+getIslemCount(tableLetter)+')" /></td><td id="'+tableLetter+'1Inp"><textarea rows="5" cols="30" class="gib_input" id="input_'+tableLetter+'_1" name="input_'+tableLetter+'_1" '+readOnly+' ></textarea><textarea rows="2" cols="30" class="gib_input" id="input_dipnot_'+tableLetter+'_1" name="input_dipnot_'+tableLetter+'_1" '+readOnly+' ></textarea></td><td id="'+tableLetter+'_1_1_Static" class="headerTd">'+tableLetter+'.1.1<br><input id="sil_'+tableLetter+'_1_1" value="Sil" disabled="disabled" type="button" onclick="removeRow(\''+tableLetter+'\',\'1\',\'1\')" /></td><td><textarea rows="5" cols="40" class="gib_input" id="input_'+tableLetter+'_1_1" name="input_'+tableLetter+'_1_1" '+readOnly+' ></textarea></td><td><textarea rows="5" cols="10" class="gib_input" id="input_dipnot_'+tableLetter+'_1_1" name="input_dipnot_'+tableLetter+'_1_1" '+readOnly+' ></textarea></td></tr>'));

	jQuery('#table_'+tableLetter+'').append(tbody);
	
}


function boEkle(tableLetter, parent, readOnly){
	if (readOnly == null)
		readOnly = "";
	
	//var tbody = jQuery('#table_n_tbody');
	
	//parent=jQuery('#boCount').val();

	//if(boCount[parent]==null || boCount[parent] == 0)
		//boCount[parent] = '1';
	
	addToBoCount(tableLetter, parent, 1);
	addToBoToplamCount(tableLetter, 1);

	var lastTr = jQuery('.'+tableLetter+'_'+parent+'_last');

	//jQuery('<tr><td>A.'+parent+'.'+boCount[parent]+'</td><td><input type="text" /></td></tr>').appendTo('#table_n_tbody');
	//var prere=jQuery('#A'+parent+'Static').parent().parent();
	//var par =jQuery('#A'+parent+'Static').parent().parent().children();
	//var lastTr = jQuery('#A'+parent+'Static').parent().parent().children('#A_'+parent+'_last');
	
	lastTr.removeClass(tableLetter+'_'+parent+'_last');
	lastTr.after('<tr id="'+tableLetter+'_'+parent+'_'+getBoCount(tableLetter, parent)+'" class="'+tableLetter+'_'+parseInt(parent)+'_last"><td id="'+tableLetter+'_'+parent+'_'+getBoCount(tableLetter, parent)+'_Static">'+tableLetter+'.'+parent+'.'+getBoCount(tableLetter, parent)+'</td></td><td><textarea rows="5" cols="40" class="gib_input" id="input_'+tableLetter+'_'+parent+'_'+getBoCount(tableLetter, parent)+'" name="input_'+tableLetter+'_'+parent+'_'+getBoCount(tableLetter, parent)+'" '+readOnly+'></textarea></td><td><textarea rows="5" cols="10" class="gib_input" id="input_dipnot_'+tableLetter+'_'+parent+'_'+getBoCount(tableLetter, parent)+'" name="input_dipnot_'+tableLetter+'_'+parent+'_'+getBoCount(tableLetter, parent)+'" '+readOnly+' ></textarea><input id="sil_'+tableLetter+'_'+parent+'_'+getBoCount(tableLetter, parent)+'" value="Sil" type="button" onclick="removeRow(\''+tableLetter+'\',\''+parent+'\',\''+getBoCount(tableLetter, parent)+'\')" /></tr>');

//	var ele = document.getElementById(tableLetter+''+parent+'Static');	
//	//ele.setAttribute("rowspan", getBoCount(tableLetter, parent));
//	ele.rowSpan=getBoCount(tableLetter);
//	
//	ele = document.getElementById(tableLetter+''+parent+'Inp');	
//	//ele.setAttribute("rowspan", getBoCount(tableLetter, parent));
//	ele.rowSpan=getBoCount(tableLetter);
//	
//	ele = document.getElementById(tableLetter+'Static');	
//	//ele.setAttribute("rowspan", getBoToplamCount(tableLetter));
//	ele.rowSpan=getBoToplamCount(tableLetter);
//	
//	ele = document.getElementById(tableLetter+'Inp');	
//	//ele.setAttribute("rowspan", getBoToplamCount(tableLetter));
//	ele.rowSpan=getBoToplamCount(tableLetter);
	
	jQuery('#'+tableLetter+'Static').attr("rowspan",getBoToplamCount(tableLetter));
	jQuery('#'+tableLetter+'Inp').attr("rowspan",getBoToplamCount(tableLetter));
	
	jQuery('#'+tableLetter+''+parent+'Static').attr("rowspan",getBoCount(tableLetter, parent));
	jQuery('#'+tableLetter+''+parent+'Inp').attr("rowspan",getBoCount(tableLetter, parent));
	
	
	
	//staticText.
	//alert("sd");
	
}

function removeRow(tableLetter, parent, count){
	
	//alert(parent+"gel baalım: " + count);
	//var trId = tableLetter + '_' + parent + '_' + count;

	var ele = document.getElementById(tableLetter+''+parent+'Static');	
	ele.setAttribute("rowspan", getBoCount(tableLetter, parent)-1);
	
	if(getBoCount(tableLetter, parent) > 1)
		ele.rowSpan = getBoCount(tableLetter, parent)-1;
	
	ele = document.getElementById(tableLetter+''+parent+'Inp');	
	ele.setAttribute("rowspan", getBoCount(tableLetter, parent)-1);
	if(getBoCount(tableLetter, parent) > 1)
		ele.rowSpan=getBoCount(tableLetter, parent)-1;
	
	ele = document.getElementById(tableLetter+'Static');	
	ele.setAttribute("rowspan", getBoToplamCount(tableLetter)-1);
	
	if(getBoToplamCount(tableLetter, parent) > 1)
		ele.rowSpan=getBoToplamCount(tableLetter)-1;
	
	ele = document.getElementById(tableLetter+'Inp');
	ele.setAttribute("rowspan", getBoToplamCount(tableLetter)-1);
	if(getBoToplamCount(tableLetter, parent) > 1)
		ele.rowSpan=getBoToplamCount(tableLetter)-1;
	
//	jQuery('#'+tableLetter+''+parent+'Static').attr("rowspan",getBoCount(tableLetter, parent)-1);
//	jQuery('#'+tableLetter+''+parent+'Inp').attr("rowspan",getBoCount(tableLetter, parent)-1);
//	jQuery('#'+tableLetter+'Static').attr("rowspan",getBoToplamCount(tableLetter)-1);
//	jQuery('#'+tableLetter+'Inp').attr("rowspan",getBoToplamCount(tableLetter)-1);
	if(jQuery('#'+tableLetter + '_' + parent + '_' + count).hasClass(tableLetter + '_' + parent + '_last')){
		var prevTr = jQuery('#'+tableLetter + '_' + parent + '_' + (parseInt(count)-1));
		if(prevTr.length == 0){
			addToIslemCount(tableLetter, -1);
		}
		else{
			jQuery('#'+tableLetter + '_' + parent + '_' + (parseInt(count)-1)).addClass(tableLetter + '_' + parent + '_last');
		}
	}

	if(count == 1){
		var nextTr = jQuery('#'+tableLetter + '_' + parent + '_' + (parseInt(count)+1));
		if(nextTr.length !=0){
			var children = jQuery('#'+tableLetter + '_' + parent + '_' + count).children();
			children[children.length-3].parentNode.removeChild(children[children.length-3]);
			children[children.length-2].parentNode.removeChild(children[children.length-2]);
			children[children.length-1].parentNode.removeChild(children[children.length-1]);
			//jQuery('#'+tableLetter + '_' + parent + '_' + count).children().remove();
			//jQuery('#'+tableLetter + '_' + parent + '_' + count).children().remove();
			
			jQuery('#'+tableLetter + '_' + parent + '_' + (parseInt(count)+1)).children().appendTo(
					jQuery('#'+tableLetter + '_' + parent + '_' + count));

			count++;

			if(jQuery('#'+tableLetter + '_' + parent + '_' + count).hasClass(tableLetter + '_' + parent + '_last')){
				
				jQuery('#'+tableLetter + '_' + parent + '_' + (parseInt(count)-1)).addClass(tableLetter + '_' + parent + '_last');
			}
			
		}
		else{
			addToBoToplamCount(tableLetter, -1);
			addToBoCount(tableLetter, parent, -1);
			for(var i=0;i<getIslemCount(tableLetter) - parent + 1;i++)
				reOrderIslem(tableLetter, parseInt(parent)+i);
			jQuery('#'+tableLetter + '_' + parent + '_' + count).remove();
			//reOrderBoTd(tableLetter, parent, count);
			for(var i=0;i<getIslemCount(tableLetter) - parent + 1;i++)
				reOrderRows(tableLetter, parseInt(parent)+1+i, count);
			
			return;
		}

		
	}
	jQuery('#'+tableLetter + '_' + parent + '_' + count).remove();

	
	
	reOrderBoTd(tableLetter, parent, count);
	reOrderRowsOnly(tableLetter, parent, count);
	
	addToBoToplamCount(tableLetter, -1);
	addToBoCount(tableLetter, parent, -1);
}
function reOrderRowsOnly(tableLetter, parent, count){

	//var allRows = jQuery('#table_'+tableLetter+'_tbody').children();

	for(var i=parseInt(count)+1;i<=getBoCount(tableLetter, parent)+1;i++){
		var tr = jQuery('#'+tableLetter + '_' + parent + '_' + i);

		if(tr.length != 0){

			var td = jQuery('#'+tableLetter + '_' + parent + '_' + i+ ' > #'+tableLetter + parent + 'Static'); 
			
			if(td.length != 0){
				td[0].innerHTMLtent = tableLetter + '.' + (parseInt(parent)-1);
				td.attr("id",tableLetter+(parseInt(parent)-1)+'Static');
				
				try{
					var existingInp = document.getElementById('input_'+tableLetter+'_'+parent);
					//alert("a");
				      // if not IE, raise an error and go to catch.            
			          var element = document.createElement(
			        		  '<input name="input_'+tableLetter+'_'+(parseInt(parent)-1)+'" id="input_'+tableLetter+'_'+(parseInt(parent)-1)+'" class="gib_input">');
			          //alert("B");
			          var parentNode = existingInp.parentNode;
			          parentNode.insertBefore(element, existingInp);
			          parentNode.removeChild(existingInp);
				}
				catch(err){
					jQuery('#input_'+tableLetter+'_'+parent).attr("name", 'input_'+tableLetter+'_'+(parseInt(parent)-1));
					jQuery('#input_'+tableLetter+'_'+parent).attr("id", 'input_'+tableLetter+'_'+(parseInt(parent)-1));
					jQuery('#input_'+tableLetter+'_'+parent).attr("class", "gib_input");
				}
				

				var ekleBtn = jQuery('#ekle_'+tableLetter+'_'+parent);
//				ekleBtn[0].setAttribute("onclick", "boEkle('"+tableLetter+"','"+(parseInt(parent)-1)+"')");//"boEkle('"+tableLetter+"','"+(i-1)+"')"
//				ekleBtn[0].onclick = function (){
//					boEkle(tableLetter,(parseInt(parent)-1));
//				};
				ekleBtn[0].onclick = newBoEkleFunc(tableLetter, (parseInt(parent)-1));
				ekleBtn.attr("id", 'ekle_'+tableLetter+'_'+((parseInt(parent)-1)));

				jQuery('#'+tableLetter+parent+'Inp').attr("id", tableLetter+((parseInt(parent)-1))+'Inp');
				
			}
		
			tr.attr("id", tableLetter + '_' + parent + '_' + (i-1));

		}

	}

	
	
}



function newBoEkleFunc(tableLetter, parentValue){
	return function(){ 
		boEkle(tableLetter, parentValue);
	};
}

function newRemoveFunc(tableLetter,parent,iVal){
	return function(){ 
		removeRow(tableLetter,parent,iVal);
	};
}

function reOrderRows(tableLetter, parent, count){

	//var allRows = jQuery('#table_'+tableLetter+'_tbody').children();
	var loopCount = getBoCount(tableLetter, parent);
	for(var i=count;i<=loopCount;i++){
		var tr = jQuery('#'+tableLetter + '_' + parent + '_' + i);

		if(tr.length != 0){

			var td = jQuery('#'+tableLetter + '_' + parent + '_' + i+ ' > #'+tableLetter + parent + 'Static'); 
			
			if(td.length != 0){
				td[0].innerHTML = tableLetter + '.' + (parseInt(parent)-1);
				td.attr("id",tableLetter+(parseInt(parent)-1)+'Static');
				
				try{
					var existingInp = document.getElementById('input_'+tableLetter+'_'+parent);
					//alert("a");
				      // if not IE, raise an error and go to catch.            
			          var element = document.createElement(
			        		  '<input class="gib_input" name="input_'+tableLetter+'_'+(parseInt(parent)-1)+'" id="input_'+tableLetter+'_'+(parseInt(parent)-1)+'">');
			          var parentNode = existingInp.parentNode;
			          parentNode.insertBefore(element, existingInp);
			          parentNode.removeChild(existingInp);
				}
				catch(err){
					jQuery('#input_'+tableLetter+'_'+parent).attr("name", 'input_'+tableLetter+'_'+(parseInt(parent)-1));
					jQuery('#input_'+tableLetter+'_'+parent).attr("id", 'input_'+tableLetter+'_'+(parseInt(parent)-1));
				}
				
				var ekleBtn = jQuery('#ekle_'+tableLetter+'_'+parent);
				//ekleBtn[0].setAttribute("onclick", "boEkle('"+tableLetter+"','"+(parseInt(parent)-1)+"')");//"boEkle('"+tableLetter+"','"+(i-1)+"')"
				
//				ekleBtn[0].onclick = function (){
//					boEkle(tableLetter,(parseInt(parent)-1));
//				};
				ekleBtn[0].onclick = newBoEkleFunc(tableLetter, (parseInt(parent)-1));
				ekleBtn.attr("id", 'ekle_'+tableLetter+'_'+((parseInt(parent)-1)));

				jQuery('#'+tableLetter+parent+'Inp').attr("id", tableLetter+((parseInt(parent)-1))+'Inp');
				
			}

			if(tr.hasClass(tableLetter + '_' + parent + '_last')){
				tr.removeClass(tableLetter + '_' + parent + '_last');
				tr.addClass(tableLetter + '_' + (parseInt(parent)-1) + '_last');
			}
		
			tr.attr("id", tableLetter + '_' + (parseInt(parent)-1) + '_' + i);

		}

	}

	if(count<=getBoCount(tableLetter, parent)){
		setBoCount(tableLetter, parent-1, getBoCount(tableLetter, parent));
		setBoCount(tableLetter, parent, 0);
	}
	
	
}

function reOrderIslem(tableLetter,parent){

	for(var i=(parseInt(parent)+1),m=0;m<1/*getBoCount(tableLetter, (parseInt(parent)+1))*/;i++,m++){
		var td = jQuery('#'+tableLetter+i+'Static');
		if(td.length != 0){
			td[0].innerHTML = tableLetter + '.'+(i-1);
			td.attr("id",tableLetter+(i-1)+'Static');

			jQuery('#'+tableLetter+i+'Inp').attr("id",tableLetter+(i-1)+'Inp');;
			try{
				var existingInp = document.getElementById('input_'+tableLetter+'_'+parent);
				//alert("a");
			      // if not IE, raise an error and go to catch.            
		          var element = document.createElement(
		        		  '<input name="input_'+tableLetter+'_'+(i-1)+'" id="input_'+tableLetter+'_'+(i-1)+'" class="gib_input">');
		          var parentNode = existingInp.parentNode;
		          parentNode.insertBefore(element, existingInp);
		          parentNode.removeChild(existingInp);
			}
			catch(err){
				jQuery('#input_'+tableLetter+'_'+i).attr("name", 'input_'+tableLetter+'_'+(i-1));
				jQuery('#input_'+tableLetter+'_'+i).attr("id", 'input_'+tableLetter+'_'+(i-1));
			}
			//var staticTd = jQuery('#'+tableLetter+'_'+parent+'_'+i+'_Static');
			//staticTd[0].innerHTML = tableLetter + '.' + parent + '.' +(i-1);

			var ekleBtn = jQuery('#ekle_'+tableLetter+'_'+i);
//			ekleBtn[0].setAttribute("onclick", "boEkle('"+tableLetter+"','"+(i-1)+"')");//"boEkle('"+tableLetter+"','"+(i-1)+"')"
//			
//			ekleBtn[0].onclick = function(){
//				boEkle(tableLetter,i-1);
//			};
			ekleBtn[0].onclick = newBoEkleFunc(tableLetter, i-1);
			ekleBtn.attr("id", 'ekle_'+tableLetter+'_'+(i-1));

			if(getBoCount(tableLetter, parseInt(parent)+1) != null){
			for(var i=1;i<=getBoCount(tableLetter, parseInt(parent)+1);i++){
				var td = jQuery('#'+tableLetter+'_'+(parseInt(parent)+1)+'_'+i+'_Static');
				if(td.length != 0){
					td[0].innerHTML = tableLetter + '.' + ((parseInt(parent)+1)-1) + '.' + i;
					td.attr("id",tableLetter+'_'+((parseInt(parent)+1)-1)+'_'+i+'_Static');

					// -----------
					try{
						var existingInp = document.getElementById('input_'+tableLetter+'_'+parent);
						//alert("z");
					      // if not IE, raise an error and go to catch.            
				          var element = document.createElement(
				        		  '<input class="gib_input" name="input_'+tableLetter+'_'+((parseInt(parent)+1)-1)+'" id="input_'+tableLetter+'_'+((parseInt(parent)+1)-1)+'" >');
				          var parentNode = existingInp.parentNode;
				          parentNode.insertBefore(element, existingInp);
				          parentNode.removeChild(existingInp);
					}
					catch(err){
						jQuery('#input_'+tableLetter+'_'+(parseInt(parent)+1)+'_'+i).attr("name", 'input_'+tableLetter+'_'+((parseInt(parent)+1)-1)+'_'+i);
						jQuery('#input_'+tableLetter+'_'+(parseInt(parent)+1)+'_'+i).attr("id", 'input_'+tableLetter+'_'+((parseInt(parent)+1)-1)+'_'+i);
					}
					var silBtn = jQuery('#sil_'+tableLetter+'_'+(parseInt(parent)+1)+'_'+i);
					//silBtn[0].setAttribute("onclick", "removeRow('"+tableLetter+"','"+((parseInt(parent)+1)-1)+"','"+i+"')");
					
//					silBtn[0].onclick = function(){
//						removeRow(tableLetter,((parseInt(parent)+1)-1),i);
//					};
					
					silBtn[0].onclick = newRemoveFunc(tableLetter,((parseInt(parent)+1)-1),i);
					
					silBtn.attr("id", 'sil_'+tableLetter+'_'+((parseInt(parent)+1)-1)+'_'+i);

					// -----------
				}
			}
			}
			
		}
	}
	
	
}

function reOrderBoTd(tableLetter,parent,count){

	for(var i=count;i<=getBoCount(tableLetter, parent)+1;i++){
		var td = jQuery('#'+tableLetter+'_'+parent+'_'+i+'_Static');
		if(td.length != 0){
			td[0].innerHTML = tableLetter + '.' + parent + '.' + (i-1);
			td.attr("id",tableLetter+'_'+parent+'_'+(i-1)+'_Static');
			try{
				//alert("id bu hacı: " + 'input_'+tableLetter+'_'+parent);
				var existingInp = document.getElementById('input_'+tableLetter+'_'+parent+'_'+(i-1));
				//alert("n");
			      // if not IE, raise an error and go to catch.            
		          var element = document.createElement(
		        		  '<input class="gib_input" name="input_'+tableLetter+'_'+parent+'_'+(i-1)+'" id="input_'+tableLetter+'_'+parent+'_'+(i-1)+'" >');
		          //alert("m");
		          var parentNode = existingInp.parentNode;
		          parentNode.insertBefore(element, existingInp);
		          parentNode.removeChild(existingInp);
			}
			catch(err){
			jQuery('#input_'+tableLetter+'_'+parent+'_'+i).attr("name", 'input_'+tableLetter+'_'+parent+'_'+(i-1));
			jQuery('#input_'+tableLetter+'_'+parent+'_'+i).attr("id", 'input_'+tableLetter+'_'+parent+'_'+(i-1));
			}
			var silBtn = jQuery('#sil_'+tableLetter+'_'+parent+'_'+i);
			
//			silBtn[0].onclick = function(){
//				alert("i-1: " + (i-1));
//				alert("iVal: " + iVal);
//				removeRow(tableLetter,parent,iVal);
//			};
			
//			silBtn[0].onclick = function(){
//				alert("iVal: " + iVal);
//				removeRow(tableLetter,parent,iVal);
//			};
			
			silBtn[0].onclick = newRemoveFunc(tableLetter,parent,i-1);
			
			//silBtn[0].setAttribute("onclick", "removeRow('"+tableLetter+"','"+parent+"','"+(i-1)+"')");
			
			silBtn.attr("id", 'sil_'+tableLetter+'_'+parent+'_'+(i-1));
		}
	}
	
}

function islemEkle(tableLetter, readOnly){
	if (readOnly == null)
		readOnly = "";
	
	addToBoToplamCount(tableLetter, 1);
	addToIslemCount(tableLetter, 1);

	//if(boCount[getIslemCount(tableLetter)]==null || boCount[getIslemCount(tableLetter)] == 0)
		//boCount[getIslemCount(tableLetter)] = '1';
	
	jQuery('<tr id="'+tableLetter+'_'+getIslemCount(tableLetter)+'_1" class="'+tableLetter+'_'+getIslemCount(tableLetter)+'_last"><td id="'+tableLetter+''+getIslemCount(tableLetter)+'Static">'+tableLetter+'.'+getIslemCount(tableLetter)+'<input id="ekle_'+tableLetter+'_'+getIslemCount(tableLetter)+'" value=">" type="button" onclick="boEkle(\''+tableLetter+'\', '+getIslemCount(tableLetter)+')" /></td><td id="'+tableLetter+''+getIslemCount(tableLetter)+'Inp"><textarea rows="5" cols="30" class="gib_input" id="input_'+tableLetter+'_'+getIslemCount(tableLetter)+'" name="input_'+tableLetter+'_'+getIslemCount(tableLetter)+'" '+readOnly+'></textarea><textarea rows="2" cols="30" class="gib_input" id="input_dipnot_'+tableLetter+'_'+getIslemCount(tableLetter)+'" name="input_dipnot_'+tableLetter+'_'+getIslemCount(tableLetter)+'" '+readOnly+'></textarea></td><td id="'+tableLetter+'_'+getIslemCount(tableLetter)+'_1_Static">'+tableLetter+'.'+getIslemCount(tableLetter)+'.1<br><input id="sil_'+tableLetter+'_'+getIslemCount(tableLetter)+'_1'+'" value="Sil" type="button" onclick="removeRow(\''+tableLetter+'\',\''+getIslemCount(tableLetter)+'\',\'1\')" /></td><td><textarea rows="5" cols="40" class="gib_input" id="input_'+tableLetter+'_'+getIslemCount(tableLetter)+'_1" name="input_'+tableLetter+'_'+getIslemCount(tableLetter)+'_1" '+readOnly+'></textarea></td><td><textarea rows="5" cols="10" class="gib_input" id="input_dipnot_'+tableLetter+'_'+getIslemCount(tableLetter)+'_1" name="input_dipnot_'+tableLetter+'_'+getIslemCount(tableLetter)+'_1" '+readOnly+' ></textarea></td></tr>').appendTo('#table_'+tableLetter+'_tbody');

	//jQuery('#'+tableLetter+'Static').attr("rowspan",getBoToplamCount(tableLetter));
	//jQuery('#'+tableLetter+'Inp').attr("rowspan",getBoToplamCount(tableLetter));
	
	var ele = document.getElementById(tableLetter+'Static');	
	//ele.setAttribute("rowspan", getBoToplamCount(tableLetter));
	ele.rowSpan=getBoToplamCount(tableLetter);
	
	ele = document.getElementById(tableLetter+'Inp');	
	//ele.setAttribute("rowspan", getBoToplamCount(tableLetter));
	ele.rowSpan=getBoToplamCount(tableLetter);
	
	
}

//function removeGibTable(tableLetter){
//	if(tableLetter == tableLetters[tableCount-1])
//		jQuery('#table_'+tableLetter+'_Div').remove();
//	else
//		alert("Sadece son tabloyu kaldırabilirsiniz!");
//}
