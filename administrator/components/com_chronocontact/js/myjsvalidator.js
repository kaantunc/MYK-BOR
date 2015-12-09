function validate(formId,sayfaNo){
	
	// formname e göre al
	var inputTypesToCheck= new Array("input", "textarea", "select");
	var formElement = document.getElementById(formId);
	
	for(var sayfaIndex = 1;sayfaIndex<=sayfaNo || sayfaNo == null;sayfaIndex++){
		if(sayfaNo!=null){
			formElement = document.getElementById("sayfa"+sayfaIndex);
		}
		else
			sayfaIndex = 0;

		for(var n=0; n<inputTypesToCheck.length;n++){
	
			var inputs = formElement.getElementsByTagName(inputTypesToCheck[n]);
				
			for(var i=0;i<inputs.length;i++){
				//alert("aaa");
				var input = inputs[i];
				var classes = input.className;
	
				if(classes == "" || classes == null)
					continue;
	
				if(classes.search("required") != -1){
					if(!notEmpty(input, "Lütfen gerekli alanları doldurunuz.",sayfaIndex)){
						return false;
					}
				}
				
				if(classes.search("numeric") != -1){
					if(!isNumeric(input, "Lütfen sadece sayı giriniz.",sayfaIndex))
						return false;
				}
				if(classes.search("alpha") != -1){
					if(!isAlphabet(input, "Lütfen sadece sayı giriniz.",sayfaIndex))
						return false;
				}
				if(classes.search("alphanum") != -1){
					if(!isAlphanumeric(input, "Lütfen sadece rakam ve harf giriniz.",sayfaIndex))
						return false;
				}
				if(classes.search("e-mail") != -1){
					if(!emailValidator(input, "Lütfen geçerli bir e-posta adresi giriniz.",sayfaIndex))
						return false;
				}
				if(classes.search("date") != -1){
					if(!dateValidator(input, "Lütfen geçerli bir tarih giriniz(Format: GG.AA.YYYY).",sayfaIndex))
						return false;
				}
				if(classes.search("year") != -1){
					if(!yearValidator(input, "Lütfen geçerli bir yıl giriniz(Örnek : 2010).",sayfaIndex))
						return false;
				}
				if(classes.search("monthYear") != -1){
					if(!monthYearValidator(input, "Lütfen geçerli ay ve yıl giriniz(Örnek : 01.2010).",sayfaIndex))
						return false;
				}
				if(classes.search("comboReq") != -1){
					if(!comboSelection(input, "Lütfen bir değer seçiniz.",sayfaIndex))
						return false;
				}
				if(classes.search("listReq") != -1){
					if(!listSelection(input, "Lütfen bir değer seçiniz.",sayfaIndex))
						return false;
				}
				if(classes.search("url") != -1){
					if(!urlValidator(input, "Lütfen geçerli bir internet adresi giriniz.",sayfaIndex))
						return false;
				}
				if(classes.search("uploadReqTaslak") != -1){
					if(!uploadSelection(input, "Lütfen kaydetmeden önce taslağın şimdiki durumunu PDF olarak kaydediniz ve gerekli alana yükleyiniz.",sayfaIndex))
						return false;
				}
				if(classes.search("uploadReq") != -1){
					if(!uploadSelection(input, "Lütfen zorunlu alanlara dosya yükleyiniz.",sayfaIndex))
						return false;
				}
				
				//if(classes.search("") != -1){
				//	if(!(input, "Lütfen ."))
				//		return false;
				//}
	
			}
			
		}
		if(sayfaNo == null)
			break;
	
	}
	
	return true;
}

function notEmpty(elem, helperMsg, sayfaIndex){
	var val = trim (elem.value);
	if(val.length == 0){
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function isNumeric(elem, helperMsg, sayfaIndex){
	var numericExpression = /^[0-9]+$/;
	if(trim(elem.value).match(numericExpression) || isEmpty(elem)){
		return true;
	}else{
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg, sayfaIndex){
	var alphaExp = /^[a-zA-Z]+$/;
	if(trim(elem.value).match(alphaExp) || isEmpty(elem)){
		return true;
	}else{
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg, sayfaIndex){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(trim(elem.value).match(alphaExp) || isEmpty(elem)){
		return true;
	}else{
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}
}

function comboSelection(elem, helperMsg, sayfaIndex){
	//alert("elem.value: " + elem.value);
	if(trim(elem.value) == "Seçiniz" || elem.value == ""){
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function listSelection(elem, helperMsg, sayfaIndex){
	if(trim(elem.value) == ""){
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg, sayfaIndex){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(trim(elem.value).match(emailExp) || isEmpty(elem)){
		return true;
	}else{
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}
}

function urlValidator(elem, helperMsg ,sayfaIndex){
	var urlExp = /^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i;
	if(trim(elem.value).match(urlExp) || isEmpty(elem)){
		return true;
	}else{
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}
}

// /^(19|20)[0-9][0-9][- \/.](0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])$/

// /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)[0-9][0-9]$/

function dateValidator(elem, helperMsg, sayfaIndex){
	var dateExp = /^(0[1-9]|[12][0-9]|3[01]).(0[1-9]|1[012]).(19|20)\d\d$/;
	if(trim(elem.value).match(dateExp) || isEmpty(elem)){
		return true;
	}else{
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}
}

function yearValidator(elem, helperMsg, sayfaIndex){
	var dateExp = /^(19|20)\d\d$/;
	if(trim(elem.value).match(dateExp) || isEmpty(elem)){
		return true;
	}else{
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}
}

function monthYearValidator(elem, helperMsg, sayfaIndex){
	var dateExp = /^(0[1-9]|1[012]).(19|20)\d\d$/;
	if(trim(elem.value).match(dateExp) || isEmpty(elem)){
		return true;
	}else{
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}
}

function uploadSelection(elem, helperMsg, sayfaIndex){
	//alert("elem.value: " + elem.value);
	if(elem.value == ""){
		alert(helperMsg);
		if(sayfaIndex!=0)
			gotoPage(sayfaIndex);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function isEmpty (elem){
	return (elem.value.length == 0);
}

function trim (str){
    return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}
