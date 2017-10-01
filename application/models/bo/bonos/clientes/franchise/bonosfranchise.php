<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class bonosfranchise extends CI_Model
{

    private $fechaInicio = '';

    private $fechaFin = '';

    function __construct()
    {
        parent::__construct();
        $this->load->model('/bo/bonos/afiliado');
    }

    function setFechaInicio($value = '')
    {
        if (! $value)
            $value = date('Y-m-d');
        
        $this->fechaInicio = $value;
    }

    function setFechaFin($value = '')
    {
        if (! $value)
            $value = date('Y-m-d');
        
        $this->fechaFin = $value." 23:59:59";
    }

    function isActived($id_usuario, $id_bono = 0, $red = 1, $fecha = '')
    {
        $this->setFechaInicio($fecha);
        $this->setFechaFin($fecha);
        
        $isActived = $this->isActivedAfiliado($id_usuario, $red);
        $isPaid = $this->isPaid($id_usuario,$id_bono);
        
        if($isPaid||!$isActived){
            return false;
        }
        
        return true;
        
    }

    function isActivedAfiliado($id_usuario, $red = 1)
    {    
        
        if($id_usuario==2)
            return true;
        
        $inversion = $this->isActivedbyInversion($id_usuario);
        
        $patas = $this->isActivedbyPatas($id_usuario);
        
        $Pasa = ($inversion&&$patas) ? true : false;
        
        return $Pasa;
     }

     function membresiaTitulo($id_usuario, $red = 1)
    {      
        $isActived = $this->isActivedAfiliado($id_usuario, $red);
        
        if(!$isActived){
            return NULL;
        }
        
        $membresia = $this->getLastMembresia($id_usuario);  
        
        if(!$membresia)
            return NULL;
        
        $membresia = $membresia->item;
        
        return $membresia;
        
    }   
    
    function estadistica($id_usuario, $red = 1)
    {
        
        $estadistica = array();       
        
        $isActived = $this->isActivedAfiliado($id_usuario, $red);
        
        if(!$isActived){
            return false;
        }
        
        $membresia = $this->getLastMembresia($id_usuario);
        
        if(!$membresia)
            return false;                
        
        $paquete = array(
            "nombre" => $membresia->item,
            "costo" => $membresia->costo
        );
            
        $estadistica["membresia"] = $paquete;   
        
        $acumulado = $this->getGananciaBono($id_usuario,0,$membresia->fecha,$this->fechaFin);
        
        if(!$acumulado)
            return false; 
        
        $per = 100/$membresia->costo;   
            
        $ganancia = round($acumulado*$per);
        
        $compensacion = array(
                "valor" => $ganancia,
                "rango" => $ganancia/2
        );        
        
        $estadistica["compensacion"] = $compensacion;   
        
        $per = $ganancia-50; 
        
        if($per<0)
            $per = 0;
        
        $falta = 50 - $per;
        
        $duplicado = array(
                "valor" => $falta*2,
                "rango" => $per*2
        );
        
        $estadistica["duplicado"] = $duplicado;  
        
        return $estadistica;
            
    }   
    
    private function getDatoMembresia($id)
    {
        $query = "SELECT 
                        *
                    FROM
                        items 
                        WHERE id = $id";
        
        $q = $this->db->query($query);
        $q = $q->result();
        
        if (!$q)
            return false;
            
        $valid = $q[0]->item;
            
        return $valid;
    }
    
    private function isActivedbyPatas($id_usuario){
        
        $patas = $this->getPatas($id_usuario);

        if(!$patas)
            return false;
        
        foreach ($patas as $afiliado){
            $membresia = $this->getLastMembresia($afiliado->id_afiliado);
            if(!$membresia)
                return false;
        }
        
        return true;
        
    }
   
    private function getPatas($id_usuario)
    {
        $query = "SELECT 
                    	   id_afiliado
                        FROM
                    		afiliar
                    	WHERE
                    		debajo_de = $id_usuario
                            AND directo = $id_usuario";
        
        $q = $this->db->query($query);
        $q = $q->result();
        
        if (!$q||(sizeof($q)<2))
            return false;
            
        $valid = $q;
            
        return $valid;
    }

    
    private function isActivedbyInversion($id_usuario)
    {        
        
         $membresia = $this->getLastMembresia($id_usuario);    
         
         if(!$membresia)
             return false;
         
         $acumulado = $this->getGananciaBono($id_usuario,0,$membresia->fecha,$this->fechaFin);
         
         if(!$acumulado)
             return false;    
         
         $Pasa = $acumulado<($membresia->costo*2) ? true : false;
         
         return $Pasa;
    }

    
    private function getLastMembresia($id_usuario){
        
        $fecha = $this->getLastCompra($id_usuario,5);
        
        if(!$fecha->fecha)
            return false;
        
        $membresia = $this->getLastCompra($id_usuario,5,0,$fecha->fecha);
        
        return $membresia;        
            
    }
    
    private function getLastCompra($id_usuario,$tipo = 0,$mercancia = 0,$fecha = false){
        
        $where = "";$select="max(v.fecha) fecha";
        
        if ($tipo > 0) {
            $where .= " AND i.id_tipo_mercancia in ($tipo)";
        }
        
        if ($mercancia > 0) {
            $where .= " AND i.id in ($mercancia)";
        }
        
        if($fecha){
            $select = "v.id_venta,c.id_mercancia mercancia,m.costo,v.fecha,i.item";
            $where.= " AND v.fecha = '$fecha' ORDER BY v.id_venta desc";            
        }
        
        $query = "SELECT 
                        	$select
                        FROM
                        	venta v,
                            cross_venta_mercancia c,
                            items i,
                            mercancia m
                        WHERE 
                        	c.id_venta = v.id_venta
                            AND m.id = i.id   
                            AND i.id = c.id_mercancia                                                    
                        	AND v.id_user = $id_usuario
                            AND v.id_estatus = 'ACT' 
                            AND v.id_metodo_pago = 'BANCO'
                            $where";
        
        $q = $this->db->query($query);
        $q = $q->result();
        
        if (!$q)
            return false;
        
        $valid = $q[0];
        
        return $valid;
        
    }

    private function getGananciaBono($id_usuario,$id_bono = 0,$fechaInicio = '',$fechaFin = ''){
     
        if(!$fechaInicio){
            $fechaInicio = $this->getPeriodoFecha("DIA", "INI", '');
        }
        
        if(!$fechaFin){
            $fechaFin = $this->getPeriodoFecha("DIA", "FIN", '');
        }
        
        $where = "";
        if($id_bono>0){
            $where.=" AND c.id_bono in ($id_bono)";
        }
        
        $query = "SELECT 
                    	sum(c.valor) monto
                    FROM
                    	comision_bono c,
                        comision_bono_historial h
                    WHERE
                    	c.id_usuario = $id_usuario
                    	AND c.id_bono_historial = h.id
                    	AND h.fecha between '$fechaInicio' and '$fechaFin' $where";
            
        $q = $this->db->query($query);
        $q = $q->result();
        
        if (!$q)
            return false;
        
        $valid = $q[0]->monto;
        
        return $valid;
        
    }
    
    private function isPaid($id_usuario,$id_bono){
        
        $query = "SELECT
						*
					FROM
						comision_bono c,
						comision_bono_historial h
					WHERE
						c.id_bono_historial = h.id
						AND c.id_bono = h.id_bono
						AND h.id_bono = $id_bono
						AND c.id_usuario = $id_usuario
						AND h.fecha BETWEEN '$this->fechaInicio' AND '$this->fechaFin'
						AND c.valor > 0";
        
        $q = $this->db->query($query);
        $q =$q->result();
        
        if(!$q)
            return false;
            
            $valid = (sizeof($q)>0) ? true : false;
            
            return $valid;
            
    }
    
    private function isValidDate($id_usuario,$id_bono,$dia = false){
        
        $bono = $this->getBono($id_bono);
        
        $mes_inicio = $bono[0]->mes_desde_afiliacion;
        $mes_fin = $bono[0]->mes_desde_activacion;
        
        if($mes_inicio<=0){
            return true;
        }
        
        $select = "DATE_FORMAT(created, '%Y-%m') < DATE_FORMAT(DATE_SUB(NOW(), INTERVAL $mes_inicio MONTH),'%Y-%m')";
        
        if($dia){
            $select = "created < DATE_SUB(NOW(), INTERVAL $mes_inicio MONTH)";
        }
        
        $query = "SELECT
					    $select 'valid'
					FROM
					    users
					WHERE
					    id = ".$id_usuario;
					    
					    $q = $this->db->query($query);
					    $q = $q->result();
					    
					    if(!$q)
					        return false;
					        
					        $valid = ($q[0]->valid==1) ? true : false;
					        
					        return $valid;
					        
    }
    
    private function isScheduled($id_usuario,$id_bono,$fecha = ""){
        
        $bono = $this->getBono($id_bono);
        
        $mes_inicio = $bono[0]->mes_desde_afiliacion;
        $mes_fin = $bono[0]->mes_desde_activacion;
        $where = "";
        
        if(strlen($fecha)>2){
            $fecha = "'".$fecha."'";
        }else{
            $fecha = "NOW()";
        }
        
        if($mes_inicio>0){
            $where .= " AND DATE_FORMAT($fecha, '%Y-%m') >= DATE_FORMAT(DATE_ADD(created, INTERVAL $mes_inicio MONTH),'%Y-%m')";
        }
        
        if($mes_fin>0){
            $mes_fin+=$mes_inicio;
            $where .= " AND DATE_FORMAT($fecha, '%Y-%m') < DATE_FORMAT(DATE_ADD(created, INTERVAL $mes_fin MONTH),'%Y-%m')";
        }
        
        $query = "SELECT
					    1 'valid'
					FROM
					    users
					WHERE
					    id = ".$id_usuario.$where;
        
        $q = $this->db->query($query);
        $q = $q->result();
        
        if(!$q)
            return false;
            
            $valid = ($q[0]->valid==1) ? true : false;
            
            return $valid;
            
    }
    
    
    function getValorBonoBy($id_bono, $parametro)
    {
        switch ($id_bono) {
            
            case 1:
                
                return $this->getValorBonoBinario($parametro);
                
                break;
            
            case 2:
                
                return $this->getValorBonoBitcoin($parametro);
                
                break;
            
            default:
                return 0;
                break;
        }
    }

    private function getValorBonoBinario($parametro)
    {
        
        $valores = $this->getBonoValorNiveles(1);
        
        $bono = $this->getBono(1);
        $periodo = isset($bono[0]->frecuencia) ? $bono[0]->frecuencia : "UNI";
        
        $fechaInicio=$this->getPeriodoFecha($periodo, "INI", $parametro["fecha"]);
        $fechaFin=$this->getPeriodoFecha($periodo, "FIN", $parametro["fecha"]); 
        
        $dayofweek = date('w', strtotime($fechaInicio));
        $isWkd = $dayofweek == 6 || $dayofweek == 0;
        $isMnd = $dayofweek == 1; #|| $dayofweek == 7;
       
        if($isMnd)
            $fechaInicio = date("Y-m-d", strtotime('last Saturday', strtotime($parametro["fecha"])));
               
        if($isWkd)
            return 0;    
            
        $id_usuario = $parametro["id_usuario"];
        
        $valor = $this->getValorPataDebil($id_usuario,$fechaInicio,$fechaFin);
        
        $monto = $this->getMontoBinario($id_usuario,$valores,$valor);
        
        return $monto;
        
    }
    
    private function getMontoBinario($id_usuario,$valores,$valor)
    {
        $membresia = $this->getLastMembresia($id_usuario);        
        
        if (!$membresia)
            return 0;
        
        $mercancia = $membresia->mercancia;
        
        if($mercancia>1)
            $mercancia-=1;
        
        $per = $valores[$mercancia]->valor / 100;
        $monto = $valor * $per;
        
        return $monto;
    }

   
    private function getValorPataDebil($id_usuario,$fechaInicio,$fechaFin)
    {
        $patas = $this->getPatas($id_usuario);
        
        if (!$patas)
            return 0;
        
        $usuario= new $this->afiliado();
         
        $valor = 0; 
        foreach ($patas as $afiliado) {
            
            $valpata=$usuario->getComprasPersonalesIntervaloDeTiempo($afiliado->id_afiliado,1,$fechaInicio,$fechaFin,5,"0","COSTO");
            $valpata+=$usuario->getVentasTodaLaRed($afiliado->id_afiliado,1,"RED","EQU",0,$fechaInicio,$fechaFin,5,"0","COSTO");
            
            if($valor>$valpata||$valor = 0)
                $valor = $valpata; 
                
        }
        return $valor;
    }


    private function getValorBonoBitcoin($parametro)
    {
        
        $valores = $this->getBonoValorNiveles(2);
        
        $bono = $this->getBono(2);
        $periodo = isset($bono[0]->frecuencia) ? $bono[0]->frecuencia : "UNI";
        
        $this->setFechaInicio($parametro["fecha"]);
        $this->setFechaFin($parametro["fecha"]); 
        
        $id_usuario = $parametro["id_usuario"];
        
        $monto = $this->getMontoBitcoin($id_usuario,$valores[1]);
        
        return $monto;
        
    }
   
    private function getMontoBitcoin($id_usuario,$valores)
    {
        $membresia = $this->getLastMembresia($id_usuario);
        
        if (!$membresia)
            return 0;
        
        $per = $valores->valor / 100;
        $monto = $membresia->costo * $per;
        return $monto;
    }


    private function getBonoValorNiveles($id)
    {
        $q = $this->db->query("SELECT * FROM cat_bono_valor_nivel WHERE id_bono = $id ORDER BY nivel asc");
        $q = $q->result();
        return $q;
    }

    private function getBono($id)
    {
        $q = $this->db->query("SELECT * FROM bono WHERE id = $id");
        $q = $q->result();
        return $q;
    }

    private function getDirectosBy($id, $nivel, $where = "", $red = 1)
    {
        $query = "SELECT
							a.id_afiliado id,
							a.directo
						FROM
							afiliar a,
							users u
						WHERE
							u.id = a.id_afiliado
							AND a.id_red = $red
							AND a.directo = $id
							$where";
        
        $q = $this->db->query($query);
        
        $datos = $q->result();
        
        if (! $q) {
            return;
        }
        
        $nivel --;
        foreach ($datos as $dato) {
            
            if ($nivel <= 0) {
                
                $this->setAfiliados($dato->id);
            } else {
                $this->getDirectosBy($dato->id, $nivel, $where, $red);
            }
        }
    }

    private function getAfiliadosBy($id, $nivel, $tipo, $where, $padre = 2, $red = 1)
    {
        $is = array(
            "DIRECTOS" => "a.directo",
            "RED" => "a.debajo_de"
        );
        
        $query = "SELECT
							a.id_afiliado id,
							a.directo
						FROM
							afiliar a,
							users u
						WHERE
							u.id = a.id_afiliado
							AND a.id_red = $red
							AND a.debajo_de = $id
							$where";
        
        $q = $this->db->query($query);
        
        $datos = $q->result();
        
        if (! $q) {
            return;
        }
        
        $nivel --;
        foreach ($datos as $dato) {
            
            if ($nivel <= 0) {
                
                if ($tipo != "DIRECTOS" || $padre == $dato->directo) {
                    $this->setAfiliados($dato->id);
                }
            } else {
                $this->getAfiliadosBy($dato->id, $nivel, $tipo, $where, $padre, $red);
            }
        }
    }

    private function getEmpresa($attrib = 0)
    {
        $q = $this->db->query("SELECT * FROM empresa_multinivel GROUP BY id_tributaria");
        $q = $q->result();
        
        if (! $q) {
            return 0;
        }
        
        if ($attrib === 0) {
            return $q;
        }
        
        return $q[0]->$attrib;
    }

    private function getPeriodoFecha($frecuencia, $tipo, $fecha = '')
    {
        if (!$fecha)
            $fecha = date('Y-m-d');
        
        $periodoFecha = array(
            "SEM" => "Semana",
            "QUI" => "Quincena",
            "MES" => "Mes",
            "ANO" => "Ano"
        );
        
        $tipoFecha = array(
            "INI" => "Inicio",
            "FIN" => "Fin"
        );
        
        if ($frecuencia == "UNI") {
            return ($tipo == "INI") ? $this->getInicioFecha() : date('Y-m-d');
        }
        
        if ($frecuencia == "DIA") {
            return ($tipo == "INI") ? $fecha : $fecha." 23:59:59";
        }
        
        if (! isset($periodoFecha[$frecuencia]) || ! isset($tipoFecha[$tipo])) {
            return $fecha;
        }
        
        $functionFecha = "get" . $tipoFecha[$tipo] . $periodoFecha[$frecuencia];
        
        return $this->$functionFecha($fecha);
    }

    private function getInicioFecha()
    {
        $query = "SELECT
                        date_format(MIN(created),'%Y-%m-%d') fecha
                    FROM
                        users";
        
        $q = $this->db->query($query);
        $q = $q->result();
        
        $year = new DateTime();
        $year->setDate($year->format('Y'), 1, 1);
        
        if (! $q)
            date_format($year, 'Y-m-d');
        
        return $q[0]->fecha;
    }

    private function getFinSemana($date)
    {
        $offset = strtotime($date);
        
        if (date('w', $offset) == 0) {
            return $date;
        } else {
            return date("Y-m-d", strtotime('next Sunday', strtotime($date)));
        }
    }

    private function getInicioSemana($date)
    {
        $offset = strtotime($date);
        
        if (date('w', $offset) == 1) {
            return $date;
        } else {
            return date("Y-m-d", strtotime('last Monday', strtotime($date)));
        }
    }

    private function getInicioQuincena($date)
    {
        $dateAux = new DateTime();
        
        if (date('d', strtotime($date)) <= 15) {
            $dateAux->setDate(date('Y', strtotime($date)), date('m', strtotime($date)), 1);
            return date_format($dateAux, 'Y-m-d');
        } else {
            $dateAux->setDate(date('Y', strtotime($date)), date('m', strtotime($date)), 16);
            return date_format($dateAux, 'Y-m-d');
        }
    }

    private function getFinQuincena($date)
    {
        $dateAux = new DateTime();
        
        if (date('d', strtotime($date)) <= 15) {
            $dateAux->setDate(date('Y', strtotime($date)), date('m', strtotime($date)), 15);
            return date_format($dateAux, 'Y-m-d');
        } else {
            return date('Y-m-t', strtotime($date));
        }
    }

    private function getInicioMes($date)
    {
        $dateAux = new DateTime();
        $dateAux->setDate(date('Y', strtotime($date)), date('m', strtotime($date)), 1);
        return date_format($dateAux, 'Y-m-d');
    }

    private function getFinMes($date)
    {
        return date('Y-m-t', strtotime($date));
    }

    private function getInicioAno($date)
    {
        $year = new DateTime($date);
        $year->setDate($year->format('Y'), 1, 1);
        return date_format($year, 'Y-m-d');
    }

    private function getFinAno($date)
    {
        $year = new DateTime($date);
        $year->setDate($year->format('Y'), 12, 31);
        return date_format($year, 'Y-m-d');
    }

    function reporte_activos($fechaInicio = "", $fechaFin = "", $id = 2, $status = true)
    {
        
        
    }
    
    /** <? TEST ?>
     *	last time : 2017-08-11
     *	recent author : qcmarcel
     */
    
    private function test() {#<($parametro){
    
    
    }
    
}
