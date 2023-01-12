function validate() {
	
	var valid=true;
	valid = checkEmpty($("#name"));
	valid = valid && checkEmail($("#email"));
	
    $("#btn-submit").attr("disabled",true);
	if(valid) {
		$("#btn-submit").attr("disabled",false);
	}	
}
function checkEmpty(obj) {
	var name = $(obj).attr("name");
	$(".name-validation").html("");	
	$(obj).css("border","");
	if($(obj).val() == "") 
	{
		$(obj).css("border","#FF0000 1px solid");
		$(".name-validation").html("Required");
		return false;
	}
	
	return true;	
}
function checkEmail(obj) {
	var result = true;
	
	var name = $(obj).attr("name");
	$(".name-validation").html("");	
	$(obj).css("border ","");
	
	result = checkEmpty(obj);
	
	if(!result)
	 {
		$(obj).css("border","#FF0000 1px solid");
		$(".name-validation").html("Required");
		return false;
	}
	//pour verifier si l'adresse mail saisi est correcte
	var email_regex = /^([a-zA-Z0-9_.+*-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,3})+$/;
	result = email_regex.test($(obj).val());
	
	if(!result)
	 {
		$(obj).css("border","#FF0000 1px solid");
		$(".email-validation").html("Invalid");
		return false;
	}
	
	return result;
}