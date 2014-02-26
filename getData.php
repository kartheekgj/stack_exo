<?php 
	error_reporting(E_ERROR);
	ini_set('display_errors',1);
	ini_set('max_execution_time',300);
	

	$cmd = (!empty($_POST['cmd']) ? $_POST['cmd'] : '');
	$url = 'http://api.stackexchange.com';
	$dataFiles = __DIR__.'/files/';
	switch(strtolower($cmd)){
		
		/*Getting Tags Data*/
		case 'tagsdata'		: fnGetTagsData();
								break;
								
	}							
		

	// Fucntions								
	function fnGetContents($url, $params = "") {
		
		$url .= $params;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);

		$response = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close ($ch);

		$result =  gzdecode($response);
		
		return $result;
	}
	
	
	function fnGetTagsData(){
		
		global $url;
		global $dataFiles;
		$sort		=	(!empty($_POST['sort']) 		? $_POST['sort']	: 'votes');
		$tags		=	(!empty($_POST['tags']) 		? $_POST['tags']	: '');
		$order		=	(!empty($_POST['order']) 		? $_POST['order']	: 'desc');
		$rescnt		=	(!empty($_POST['rescnt']) 		? $_POST['rescnt']	: 100);
		$refresh	=	(!empty($_POST['refresh']) 		? $_POST['refresh']	: "false");
		
		$arrTags = explode(';',$tags);
		// getting the data
		foreach($arrTags as $finTags){
			if(!empty(trim($finTags))){
				$params  = '/2.2/questions?pagesize='. $rescnt .'&order='. $order .'&sort='. $sort .'&tagged='. $finTags .'&site=stackoverflow';	
				
				if($refresh == "true"){
					$jsonData = fnGetContents($url, $params);
					@file_put_contents($dataFiles.$finTags.'.json',$jsonData);
				}else{
					if(!file_exists($dataFiles.$finTags.'.json')){
						$jsonData = fnGetContents($url, $params);
						@file_put_contents($dataFiles.$finTags.'.json',$jsonData);
					} else {
						$jsonData = file_get_contents($dataFiles.$finTags.'.json');
					}
				}
				$arrFinalTagsData[$finTags] = json_decode($jsonData,true);	
			}
		}
		// getting the counts array
		foreach($arrTags as $finTags){
			if(!empty(trim($finTags))){
				foreach($arrFinalTagsData[$finTags]['items'] as $data){
					$arrBounty[$finTags][]	= $data['bounty_amount'];
					$arrAnsCnt[$finTags][]	= $data['answer_count'];
					$arrScore[$finTags][]	= $data['score'];
				}	
			}
			
		}
		
		// summing up the counts to single array
		foreach($arrTags as $finTags){
			if(!empty(trim($finTags))){
				$arrFinData[$finTags] = array('bounty_amnt' => array_sum($arrBounty[$finTags])/100, 'answer_count' => array_sum($arrAnsCnt[$finTags])/100,'score' => array_sum($arrScore[$finTags])/100);
			}
		}
		echo json_encode($arrFinData);
	}	
