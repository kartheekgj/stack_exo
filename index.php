<html>
	<head>
		<title>StackOverFlow in Graphs</title>
	</head>
	<body>
		<button onClick='fnGetData();'>Get Data</button>
	</body>
</html>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
	var jq = jQuery.noConflict();
	
	function fnGetData(){
		var sort = '';
		var tags = 'php;';
		var order = '';
		//var url = 'https://api.stackexchange.com/2.2/questions?order=desc&sort=activity&tagged=php&site=stackoverflow'; // working
		var url = "./getData.php"
		var data = 'cmd=tagsdata&sort='+ sort +'&tags='+ tags +'&order='+ order;
		jq.ajax({
			url: url,
			type: "POST",
			data: data,
			dataType: "JSON",
			sucess: function(data){
						console.log(data);
					},
			error: function(jqXHR, textStatus){
						console.log( "Request failed: " + textStatus );
					}
		});	
	}

</script>
