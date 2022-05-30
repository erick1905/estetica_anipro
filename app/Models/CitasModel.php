<?php

namespace App\Models;

use CodeIgniter\Model;

class CitasModel extends Model
{
    protected $table = 'cita';
    protected $primaryKey = 'id_cita';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'id_cita', 'fecha', 'hora', 'idcliente'
    ];
    public function getAllCitas()
    {
        $db = db_connect(); // * Conectarse ala BD

        $query = $db->query('SELECT * FROM cita'); // * Ejecuta la consulta

        return $query; // * Regresa al modelo el objeto $data[]
    }
    public function borrarcita($id_cita)
    {
        $db = db_connect();
        $borrar = $db->query('DELETE FROM cita Where id_cita=' . $id_cita . '');
    }
}
