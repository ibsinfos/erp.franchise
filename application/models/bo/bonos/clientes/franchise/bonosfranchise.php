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
        
        $this->fechaFin = $value;
    }

    function isActived($id_usuario, $id_bono = 0, $red = 1, $fecha = '')
    {
        $this->isActivedAfiliado($id_usuario, $red);
    }

    function isActivedAfiliado($id_usuario, $red = 1)
    {
                
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
            
            case 1:
                
                return $this->getValorBonoBitcoin($parametro);
                
                break;
            
            default:
                return 0;
                break;
        }
    }

    private function getValorBonoBinario($parametro)
    {}

    private function getValorBonoBitcoin($parametro)
    {}

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
        if (! $fecha)
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
