
<?php
	include("connect.php");
	$del_id = $_GET[del];
	$sql_del = "DELETE FROM employee WHERE id_employee='$del_id'";
	$ret_del = $db->exec($sql_del);

    if(!$ret_del){
    	echo $db->lastErrorMsg();
    }
    else{
        echo "<script type='text/javascript'> alert('Record Deleted'); </script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php' />";
        echo "<meta http-equiv='refresh' content='1;url=default.php?page=artikel' />";
    }
?>