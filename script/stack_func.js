var jq = jQuery.noConflict();
	
function fnGetData(params){
	var refresh	=	( params.refresh !=	undefined	&&	params.refresh		!=	"" ) ?	params.refresh		:	false;
	var rescnt	=	( params.rescnt !=	undefined	&&	params.rescnt		!=	"" ) ?	params.rescnt		:	100;
	var tags = '';
	var sort = '';
	var order = '';
	var url = "./getData.php"
	var data = '';
	var categories = new Array();
	
	
	jq("#ul_chkBox").find("input[type='checkbox']").each(function(){
		if(jq(this).is(":checked")){
			tags += jq(this).val()+";";
			categories.push(jq(this).val());
		}
	});
	
	if(tags == ''){
		alert("Please Check any one of the Checkboxes to get the data");
		return false;	
	}
	
	data = 'cmd=tagsdata&sort='+ sort +'&tags='+ tags +'&order='+ order +'&refresh=' + refresh+ '&rescnt' + rescnt;
	if(refresh){
		jq('#but_new').hide();
		jq('#but_new_ldng').show();
	}else{
		jq('#but_old').hide();
		jq('#but_old_ldng').show();
	}
	
	jq.ajax({
		url: url,
		type: "POST",
		data: data,
		dataType: "json",
		success: function(data){
					if(refresh){
						jq('#but_new_ldng').hide();	
						jq('#but_new').show();
					}else{
						jq('#but_old_ldng').hide();
						jq('#but_old').show();
					}
					fnDisplayChart(categories,data);						
				},
		error: function(jqXHR, textStatus){
					console.log( "Request failed: " + textStatus );
				}
	});	
}
