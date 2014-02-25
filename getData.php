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
