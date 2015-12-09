/*
 * 
 * REQUIRED : ".required" 
 * URL		: ".url"
 * EMAIL	: ".e-mail"
 * NUMERIC	: ".numeric"
 * 
 */

var requiredErrorMessage = "*";
var urlErrorMessage = "Lütfen geçerli bir internet adresi giriniz";
var emailErrorMessage = "Lütfen geçerli bir e-posta adresi giriniz";
var numericErrorMessage = "Lütfen sadece sayı giriniz";

function validate (nRow){
	var result = true;
    
	//REQUIRED
    jQuery(".required", nRow).each(function(index){
    	var requiredMessageClassName = "requiredMessage";
    	var requiredErrorClassName = "requiredError";
    	var parent = jQuery(this).parent();
		var span = jQuery('.' + requiredMessageClassName, parent);
		var val = jQuery(this).val();
		
    	jQuery(this).removeClass(requiredErrorClassName); 	
    	span.remove(); 	
    	
		if(jQuery.trim(val) == '' )
		{	
			jQuery(this).focus();
			jQuery(this).addClass(requiredErrorClassName);
			parent.append ("<span class='"+requiredMessageClassName+"'>" + requiredErrorMessage + "</span>");
			
			result = false;
		}
		
	});
	
	//URL
    var urlExp = /^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i;
    jQuery(".url", nRow).each(function(index){ 
    	var urlMessageClassName = "urlMessage";
    	var urlErrorClassName = "urlError";
    	var parent = jQuery(this).parent();
		var span = jQuery('.' + urlMessageClassName , parent);
    	var val = jQuery(this).val();
    	
    	jQuery(this).removeClass(urlErrorClassName);
    	span.remove();
    	
		if( jQuery.trim(val) != '' && !(jQuery.trim(val).match(urlExp)) )
		{
			jQuery(this).focus();
			jQuery(this).addClass(urlErrorClassName);
			parent.append ("<span class='"+urlMessageClassName+"'>" + urlErrorMessage + "</span>");
		
			result = false;
		}
		
	});
    
	//EMAIL
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    jQuery(".e-mail", nRow).each(function(index){ 
    	var emailMessageClassName = "emailMessage";
    	var emailErrorClassName = "emailError";
    	var parent = jQuery(this).parent();
		var span = jQuery('.' + emailMessageClassName, parent);
    	var val = jQuery(this).val();
    	
    	jQuery(this).removeClass(emailErrorClassName);
    	span.remove();
    	
		if( jQuery.trim(val) != '' && !(jQuery.trim(val).match(emailExp)) )
		{
			jQuery(this).focus();
			jQuery(this).addClass(emailErrorClassName);
			parent.append ("<span class='"+emailMessageClassName+"'>" + emailErrorMessage + "</span>");
			
			result = false;
		}
		
	});
    
	//NUMERIC
    var numericExpression = /^[0-9]+$/;
    jQuery(".numeric", nRow).each(function(index){ 
    	var numericMessageClassName = "numericMessage";
    	var numericErrorClassName = "numericError";
    	var parent = jQuery(this).parent();
		var span = jQuery('.' + numericMessageClassName, parent);
    	var val = jQuery(this).val();
    	
    	jQuery(this).removeClass(numericErrorClassName);
    	span.remove();
    	
		if( jQuery.trim(val) != '' && !(jQuery.trim(val).match(numericExpression)) )
		{
			jQuery(this).focus();
			jQuery(this).addClass(numericErrorClassName);
			parent.append ("<span class='"+numericMessageClassName+"'>" + numericErrorMessage + "</span>");
			
			result = false;
		}
		
	});
    
    return result;
}