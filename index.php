<html>
	<head>
		<title>StackOverFlow in Graphs</title>
		<link href="./css/stack_css.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<ul id="ul_chkBox"> 
			<li>
				<label>Tags available for statistics</label>
			</li>	
			<li>
				<label>PHP</label>	
				<input type="checkbox" value="php" checked=checked  id="chk_php">
			</li>	
			<li>
				<label>JQUERY</label>	
				<input type="checkbox" value="jquery" id="chk_jquery">
			</li>	
			<li>
				<label>MYSQL</label>	
				<input type="checkbox" value="mysql" id="chk_jquery">
			</li>
			<li style=" font-size:small;">Note : Check the text boxes to get the data in the graph</li>	
			
		</ul>
		
		<div>
			<ul class="ul_buttons">
				<li>
					<label>Getting the stored Data from stackoverflow</label>
					<button id="but_old" onClick='fnGetData({rescnt: 100});'>Get Data</button>
					<button id="but_old_ldng" >loading Data</button>
				</li>
				
				<li>
					<label>Getting the new Data from stackoverflow</label>
					<button id="but_new" onClick='fnGetData({refresh : true,rescnt: 100});'>Get New Data Counts</button>
					<button id="but_new_ldng">loading Data</button>
				</li>
			</ul>
			
		</div>
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		
		
	</body>
</html>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="./js/stack_func_compress.js"></script>
<!-- Graph Starts -->
<script type="text/javascript" src="./js/graph_compress.js"></script>
