<?php

namespace App\Controllers;

use App\Models\ServiciosModel;
use App\Models\VentaModel;
use App\Models\PromocionModel;

class VentaController extends BaseController
{
    public function readVenta()
    {
        $promos = new PromocionModel();
        $ServiciosModel = new ServiciosModel();
        $data['articulos'] = $ServiciosModel->getServicios();
        $data['promo'] = $promos->getpromos();

        return view('pages/ventas', $data);
    }

    public function formulario()
    {
        $ServiciosModel = new ServiciosModel();
        $ServiciosModel->venta($this->request->getPost());
        return redirect()->to(base_url('/admin'));
    }
}
