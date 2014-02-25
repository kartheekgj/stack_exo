<?php 


	error_reporting(E_ERROR);
	ini_set('display_errors',1);
	ini_set('max_execution_time',300);

	require_once("function.inc.bms");

	$cmd = (!empty($_POST['cmd']) ? $_POST['cmd'] : '');

	switch(strtoupper($cmd)){
		
		/*Getting Tags Data*/
		case 'tagsdata'		: fnGetTagsData();
								break;
		/*Getting user Data*/
		case 'userinfo'		: fnGetUserData();
								break;
								
								
								
		function fnCurl($method, $url, $params = "", $contentType = "JSON") {
			switch(strtoupper($contentType)) {
				case "TEXT"		:	$arrCon = Array("Content-Type: text/plain");
									break;
				case "JSON"		:	$arrCon = Array("Content-Type: application/json");
									break;
				default			:	$arrCon = "";
			}
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url.((strtoupper($method) == "GET") ? $params : ""));
			curl_setopt($ch, CURLOPT_HTTPHEADER, $arrCon);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_HTTPGET,1);
			if(strtoupper($method) == "POST") {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
				curl_setopt($ch, CURLOPT_POST, 1);
			}
			curl_setopt($ch,CURLOPT_TIMEOUT,30);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			return $result;
		}
		
		
		function fnGetTagsData(){
			
		
		
		
		}
		
		function fnGetTagsData(){
			
		
		
		
		
		}						
