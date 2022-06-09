<?php

namespace App\Models;

use CodeIgniter\Model;

class PromocionModel extends Model
{
    protected $table = 'promocion';
    protected $primaryKey = 'id_promocion';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'id_servicio', 'fecha_inicio', 'fecha_fin', 'porcentaje'
    ];
    public function getAllPromos()
    {
        $db = db_connect(); // * Conectarse ala BD

        $query = $db->query('SELECT * FROM promocion'); // * Ejecuta la consulta

        return $query; // * Regresa al modelo el objeto $data[]
    }
    public function borrarpromo($id_promocion)
    {
        $db = db_connect();
        $borrar = $db->query('DELETE FROM promocion Where id_promocion=' . $id_promocion . '');
    }

    public function getpromos()
    {
        $db = db_connect();
        $promo = $db->query("SELECT p.porcentaje, c.nombre_del_servicio,p.id_promocion,p.id_servicio,p.fecha_inicio,p.fecha_fin
                            FROM promocion p
                            inner join catalogo_servicio c on c.id_servicio=p.id_servicio
                            where fecha_inicio < (SELECT now()) 
                            and fecha_fin > (SELECT now());")->getResult();
        return $promo;
    }
}
