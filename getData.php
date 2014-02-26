<?php 
	error_reporting(E_ERROR);
	ini_set('display_errors',1);
	ini_set('max_execution_time',300);
	

	$cmd = (!empty($_POST['cmd']) ? $_POST['cmd'] : '');
	$url = 'http://api.stackexchange.com';

	switch(strtolower($cmd)){
		
		/*Getting Tags Data*/
		case 'tagsdata'		: fnGetTagsData();
								break;
								
	}							
		

		// Fucntions								
		function fnCurl($url, $params = "", $contentType = "JSON") {
			switch(strtoupper($contentType)) {
				case "TEXT"		:	$contentType = Array("Content-Type: text/plain");
									break;
				case "JSON"		:	$contentType = Array("Content-Type: application/json");
									break;
				default			:	$contentType = "";
			}
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $contentType);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch,CURLOPT_TIMEOUT,30);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			print_R($result);

			curl_close($ch);

			return $result;
		}
		
		
		function fnGetTagsData(){
			
			global $url;
			$sort	=	(!empty($_POST['sort']) 		? $_POST['sort']	: 'votes');
			$tags	=	(!empty($_POST['tags']) 		? $_POST['tags']	: '');
			$order	=	(!empty($_POST['order']) 		? $_POST['order']	: 'desc');
			
			$arrTags = explode(';',$tags);
			print_R($arrTags);
			foreach($arrTags as $tagsData){
				if(!empty($tagsData))
				echo $params  = '/2.2/questions?order='. $order .'&sort='. $sort .'&tagged='. $tagsData .'&site=stackoverflow';
				$arrFinalTagsData[$tagsData] = fnCurl($url, $params); 
			}
			
			//echo json_encode($arrFinalTagsData);
					
		}	