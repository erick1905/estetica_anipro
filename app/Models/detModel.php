<?php

namespace App\Models;

use CodeIgniter\Model;

class detModel extends Model
{
    protected $table = 'promocion';
    protected $primaryKey = '';
    protected $useAutoIncrement = true;
    protected $returnType        = 'object'; #EL TIPO DE RETORNO QUE TIENE
    protected $useTimestamps     = false; # NO RELLENA POR DEFECTO LOS NULOS
    protected $useSoftDeletes   = false;
    protected $allowedFields = [
        'id_venta ', 'id_servicio ', 'cantidad', 'importe', 'porcentaje'
    ];
}
