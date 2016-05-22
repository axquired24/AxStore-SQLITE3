<?php
//connect.php
	class MyDB extends SQLite3 {
		var $DBname;

		function __construct($dbName){
			$this->open($dbName);
		}
	}

	$db = new MyDB('ax_172.sl3');
	if(!$db) {
		echo $db->lastErrotMsg();		
	}

?>