<?php


	echo "Hello world!";
	$host="10.72.6.127";
	$dbname="dca93be0a714e4a88acefe3c501c6e2c1";
	$port="5432";
	$username="uca93be0a714e4a88acefe3c501c6e2c1";
	$password="15ba6eeb709e4ff7b70bbde1fc1e6010";
	
	try
	{		
		include("libraries/adodb/adodb-exceptions.inc.php");
		include("libraries/adodb/adodb.inc.php"); 
		
		
		// Set error reporting level to max
		error_reporting(E_ALL);
		
		$db= &ADONewConnection('postgres');
		$db->PConnect("$host", "$username", "$password", "$dbname");
		
		echo "<BR>...... Connected!";		
		
		$sql = 'SELECT * FROM "public"."test";';

		$rs = &$db->Execute($sql);
		if (!$rs) {
			throw new Exception('Query did not execute');
		}
		else {
		  while (!$rs->EOF) {
			echo "inside while...";
			print $rs->fields[0]; 
			$rs->MoveNext();  //  Moves to the next row
		  }  
		} 
		

	} catch(exception $e)
	{
		echo 'Caught Exceptoin..';
		die($e->getMessage());
	}
?>