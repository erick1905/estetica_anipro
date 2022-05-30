<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'id_venta';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'id_cita', 'fecha', 'hora', 'idcliente'
    ];
    public function getAllventas()
    {
        $db = db_connect(); // * Conectarse ala BD

        $query = $db->query('SELECT * FROM venta'); // * Ejecuta la consulta

        return $query; // * Regresa al modelo el objeto $data[]
    }
    public function borrarventa($id_venta)
    {
        $db = db_connect();
        $borrar = $db->query('DELETE FROM venta Where id_venta=' . $id_venta . '');
    }
}
