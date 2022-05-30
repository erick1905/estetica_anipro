<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiciosModel extends Model
{
    protected $table = 'catalogo_servicio';
    protected $primaryKey = 'id_servicio';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'nombre_del_servicio', 'costo_Venta', 'precio_unitario'
    ];
    public function getAllservicios()
    {
        $db = db_connect(); // * Conectarse ala BD

        $query = $db->query('SELECT * FROM catalogo_servicio'); // * Ejecuta la consulta

        return $query; // * Regresa al modelo el objeto $data[]
    }
    public function borrarservicio($id_servicio)
    {
        $db = db_connect();
        $borrar = $db->query('DELETE FROM catalogo_servicio Where id_servicio=' . $id_servicio . '');
    }
    public function getServicios()
    {
        $db = db_connect();
        $articulos = $db->query("SELECT * FROM catalogo_servicio")->getResult();
        return $articulos;
    }

    public function venta($data)
    {
        //para obtener el id empelado que esta logeado
        // $id_empleado = session('empleado')->id_empleado;

        $total = $data['total'];
        $id_articulo = $data['id_articulo'];
        $articulo = $data['articulo'];
        $importe = $data['importe'];
        $cantidad = $data['cantidad'];
        $porcentaje = $data['porcentaje'];


        $this->db->transStrict(false);
        $this->db->transStart();

        $this->db->query("INSERT INTO venta (fecha, monto_total)
                VALUES (CURRENT_TIMESTAMP, {$total});");

        $this->db->query("SET @ID_VENTA = LAST_INSERT_ID();");
        for ($x = 0; $x < count($articulo); $x++) {
            $this->db->query("INSERT INTO det_servicio_venta (id_venta,id_servicio,cantidad,importe,porcentaje)
                VALUES (@ID_VENTA, {$id_articulo[$x]}, {$cantidad[$x]}, {$importe[$x]}, {$porcentaje[$x]} );");
        }
        $this->db->transComplete();
    }
}
