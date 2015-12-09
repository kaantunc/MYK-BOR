var counter = 0;

function startUpload(id, sira){
	var fileInp = document.getElementById(id + "_file_"+sira);
	
	if(fileInp.value == null || fileInp.value == ""){
		alert("Lütfen dosya seçiniz.");
		return false;
	}

	//alert(id +'_upload_process_'+sira);
	  document.getElementById(id +'_upload_process_'+sira).style.height='24px';
	  document.getElementById(id +'_upload_form_span_'+sira).style.height='0px';
      document.getElementById(id +'_upload_process_'+sira).style.visibility = 'visible';
      document.getElementById(id +'_upload_form_span_'+sira).style.visibility = 'hidden';
      return true;
}

function stopUpload(id, success, sira, fileName, destinationPath){
	  	
      var result = '';
      document.getElementById(id +'_upload_process_'+sira).style.height='0px';
      var normalFileName = fileName.substring(fileName.indexOf('_') + 1, fileName.length);
      var inputPath = '<input type="hidden" value="'+destinationPath+fileName+'" name="path_'+id+'_'+sira +'">' +
      				  '<input type="hidden" value="'+fileName+'" name="filename_'+id+'_'+sira +'">';
      if (success == 1){
         result = '<div class="up_success">'+normalFileName+' yüklendi!<\/div>';
         result += inputPath;
         result += '<div><input type="button" value="Degistir" onclick="removeUploaded(\''+id+'\',\''+sira+'\')" /></div>';
   	  document.getElementById(id +'_result_div_'+sira).innerHTML = result;

      }
      else {
         result = '<div class="up_error">'+normalFileName+'<\/div>';
         result += '<div><input type="button" value="Baska Dosya Yükle" onclick="removeUploaded(\''+id+'\',\''+sira+'\')" /></div>';
         document.getElementById(id +'_result_div_'+sira).innerHTML = result;
         //alert(normalFileName);
   	 // document.getElementById(id +'_upload_form_span_'+sira).style.height='24px';
        // document.getElementById(id +'_upload_form_span_'+sira).style.visibility = 'visible';
         //tekrarUp(id, sira);
   	  //document.getElementById(id +'_result_div_'+sira).innerHTML = result;

      }
      document.getElementById(id +'_upload_process_'+sira).style.visibility = 'hidden';
      var formHidden = document.getElementById('form_hidden_'+sira);
      //alert(result);
      //alert(id +'_form_div_'+sira);
      
      if(formHidden != null){
    	
  		var hiddenInp = document.createElement("input");
		//hiddenInp.setAttribute("id", "form_hidden_" + sira);
		hiddenInp.setAttribute("name", id +"_form_hidden[]");
		hiddenInp.setAttribute("type", id +"_hidden");
		formHidden.setAttribute("value", fileName);
		document.getElementById(id +'_form_div_'+sira).appendChild(hiddenInp);
    	  
      }
      
      //document.getElementById('upload_form_span_'+sira).innerHTML = result + '<label>File: <input name="file_'+sira+'" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="up_submitbtn" value="Upload" /><\/label>';
      //document.getElementById('upload_fordivan_'+sira).style.visibility = 'visible'; 

      return true;   
}

function removeUploaded(id, sira){
	// dosya adini silmesi için submit et
	document.getElementById(id +'_upload_form_span_'+sira).style.height='24px';
	document.getElementById(id +'_upload_process_'+sira).style.height='0px';
	document.getElementById(id +'_upload_form_span_'+sira).style.visibility = 'visible';
	//document.getElementById(id +'_form_div_'+sira).style.visibility = 'visible';
}
function removeUploaded2(id, sira){
	// dosya adini silmesi için submit et
	document.getElementById(id +'_upload_form_span_'+sira).style.height='24px';
	document.getElementById(id +'_upload_process_'+sira).style.height='0px';
	document.getElementById(id +'_upload_form_span_'+sira).style.visibility = 'visible';
	//document.getElementById(id +'_form_div_'+sira).style.visibility = 'visible';
}

function uploadAnother(id){

	counter++;

	var upload_div = document.getElementById("upload_div_"+id);
	var form_div = document.createElement("div");
	
	//form_div.setAttribute("class", "form_div");
	form_div.setAttribute("id", id + "_form_div_"+counter);
	
	var form = document.createElement("form");
	form.setAttribute("action", "?option=com_file_upload&id="+id+"&sira="+counter);//"?option=com_file_upload"
	form.setAttribute("id", id + "_upload_form_" + counter);
	form.setAttribute("method", "post");
	form.setAttribute("enctype", "multipart/form-data");
	form.setAttribute("target", id + "_upload_target_"+counter);
	//alert('startUpload(\''+ id + '\', \'' + counter + '\')');
	form.setAttribute("onsubmit", 'return startUpload(\''+ id + '\', \'' + counter + '\')');
	
	var idInput = document.createElement("input");
	idInput.setAttribute("value", id);
	idInput.setAttribute("type", "hidden");
	idInput.setAttribute("name", "id");
	
	form.appendChild(idInput);
	
	var counterInput = document.createElement("input");
	counterInput.setAttribute("value", counter);
	counterInput.setAttribute("type", "hidden");
	counterInput.setAttribute("name", "file_count");
	
	form.appendChild(counterInput);

	var processP = document.createElement("div");
	processP.setAttribute("id", id + "_upload_process_"+counter);
	processP.appendChild(document.createTextNode("Yükleniyor..."));
	//processP.setAttribute("style", "visibility:hidden;height:0;");
	processP.style.visibility = "hidden";
	processP.style.height = "0px";	

	var loaderImg = document.createElement("img");
	loaderImg.setAttribute("src", "administrator/components/com_chronocontact/images/loader.gif");
	processP.appendChild(loaderImg);

	form.appendChild(processP);

	var uploadFormP = document.createElement("div");
	uploadFormP.setAttribute("id", id + "_upload_form_span_" + counter);
	
	var submit = document.createElement("input");
	submit.setAttribute("type", "file");
	submit.setAttribute("name", id + "_file_"+counter);
	submit.setAttribute("id", id + "_file_"+counter);
	submit.setAttribute("size", "30");

	uploadFormP.appendChild(submit);
	

	var fileUp = document.createElement("input");
	fileUp.setAttribute("type", "submit");
	fileUp.setAttribute("name", id + "_submitBtn_"+counter);
	//fileUp.setAttribute("class", "up_submitbtn");
	fileUp.className = "up_submitbtn";
	fileUp.setAttribute("value", "Yükle");

	uploadFormP.appendChild(fileUp);


	var iframe = document.createElement('<iframe name="'+ id + "_upload_target_"+counter + '">');
	iframe.setAttribute("id", id + "_upload_target_"+counter);
	//iframe.setAttribute("name", id + "_upload_target_"+counter);
	iframe.setAttribute("src", "#");
	//iframe.setAttribute("style", "width:0;height:0;border:0px solid #fff;");
	iframe.style.width = "0px";
	iframe.style.height = "0px";
	iframe.style.border = "0px solid #fff";

	form.appendChild(iframe);

	var silButton = document.createElement("input");
	silButton.setAttribute("type", "button");
	silButton.setAttribute("name", id + "_silBtn_"+counter);
	//silButton.setAttribute("class", "up_silbtn");
	silButton.className = "up_silbtn";
	silButton.setAttribute("value", "X");
	silButton.setAttribute("onclick", "fileInpSil('"+id+"','"+counter+"')");
	uploadFormP.appendChild(silButton);
	
	
	form.appendChild(uploadFormP);
	form_div.appendChild(form);
	upload_div.appendChild(form_div);
	
}

function fileInpSil(id, sira){
	var silinecekForm = document.getElementById(id + "_form_div_" + sira);
	var formParent = silinecekForm.parentNode;
	formParent.removeChild(silinecekForm);
	
}
