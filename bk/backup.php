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
    
    function newQuery($db,$data = "")
    {
        $command = setCommand($db,"query.sh",$data);
        $query = shell_exec($command);
        
        $datos = explode("\n", $query);
        
        if(!$datos)
            return false;
            
        $atributos = explode("	", $datos[0]);
        $result = setArray($datos, $atributos);
        return $result;
    }
    
    function setArray( $datos, $atributos) {
        
        unset($datos[sizeof($datos)-1]);
        unset($datos[0]);
        
        for ($i = 1 ; $i <= sizeof($datos) ; $i++){
            $valores = explode("	", $datos[$i]);
            $datos[$i] =  array();
            $k = 0;
            foreach ($valores as $valor) {
                
                if($valor=="NULL")
                    $valor = "";
                    
                    $datos[$i][$atributos[$k]] = $valor;
                    $k++;
            }
        }
        
        return $datos;
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

echo "\n\n>PROCESOS 1> AUTOBONO DIARIO\n";
    include(setDir()."/bk/autobono.php");
echo "\n\nCargando Datos\n"; 
    $autobono = new autobono($db);
echo "\n>OK\nProcesando Datos\n";   
    $afiliados = $autobono->calcular();
echo "\n>OK\nRealizando Acciones\n";
    foreach ($afiliados as $afiliado => $bonos){
        echo "\n -> ".$afiliado." \n\n";
        foreach ($bonos as $bono => $value){
            echo "o-> ".$bono." : $value  \n";
        }
    }
    
    