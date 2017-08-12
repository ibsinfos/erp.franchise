#!/usr/bin/php
<?php

echo "Leyendo datos...";
	
    function setDir($base="/var/www"){
   #function setDir($base="/home/content/57/11569157/html"){
        $project="/erp.franchise";
        return $base.$project;
    }
    
    function setCommand ($db,$file,$data = ""){
        $hostname = $db['default']['hostname'];
        $username = $db['default']['username'];
        $password = $db['default']['password'];
        $database = $db['default']['database'];
        return setDir()."/bk/".$file." ".$hostname." ".$username." ".$password." ".$database." \"$data\"";
    }

echo "\n>OK\nCargando base de datos...";

	$db_config=setDir()."/application/config/database.php";	
	$linea="";
	$file = fopen($db_config, "r");
	while(!feof($file)){
		$linea.=fgets($file)."\n";
	}
	fclose($file);
			
	$val="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');";
	$texto=str_replace($val, "<?php ", $linea);
		  
	$fp2 = fopen(setDir()."/bk/db_access.php", "w"); 
	fputs($fp2, $texto);
	fclose($fp2);
		
	include(setDir()."/bk/db_access.php");
echo "\n>OK\nCreando dump...";
$command = setCommand($db,"bk_daily.sh");
exec($command);
echo "\n>OK\n\n!Dump creado con exito!\n";
