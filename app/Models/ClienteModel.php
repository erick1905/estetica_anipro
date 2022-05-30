<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'idcliente';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'cl_nombre', 'cl_telefono'
    ];
    public function getAllClientes()
    {
        $db = db_connect(); // * Conectarse ala BD

        $query = $db->query('SELECT * FROM cliente'); // * Ejecuta la consulta

        return $query; // * Regresa al modelo el objeto $data[]
    }
    public function borrarcliente($idcliente)
    {
        $db = db_connect();
        $borrar = $db->query('DELETE FROM cliente Where idcliente=' . $idcliente . '');
    }
}
