<?php

namespace App\Controllers;

use App\Models\CitasModel;
use App\Models\PromocionModel;
use App\Models\ReportesModel;
use App\Models\VentaModel;

class ReportesController extends BaseController
{
    public function indexreporte()
    {
        return view('pages/reportesventa');
    }
    public function citasdia()
    {
        $CitasModel = new CitasModel();
        $data['citasdia'] = $CitasModel
            ->join('cliente', 'cliente.idcliente =cita.idcliente')
            ->where('cita.fecha = curdate()')
            ->paginate(25);

        //$data['pager'] = $CitasModel->pager;

        return view('pages/citasdia', $data);
    }
    public function promosactivas()
    {
        $PromocionModel = new PromocionModel();
        $data['promosactivas'] = $PromocionModel
            ->join('catalogo_servicio', 'catalogo_servicio.id_servicio=promocion.id_servicio')
            ->where('promocion.fecha_fin>= curdate()')

            ->paginate(25);
        return view('pages/promosactivas', $data);
    }
    public function totalventasdia()
    {
        $VentaModel = new VentaModel();
        $data['ventasdia'] = $VentaModel
            ->select('venta.monto_total,catalogo_servicio.nombre_del_servicio')
            //->select('sum(monto_total)')
            ->join('det_servicio_venta', 'det_servicio_venta.id_venta=venta.id_venta')
            ->join('catalogo_servicio', 'catalogo_servicio.id_servicio=det_servicio_venta.id_servicio')
            //->select('sum(monto_total)')
            ->where('venta.fecha>= curdate()')
            ->paginate(25);
        $data['total'] = $VentaModel
            ->selectSum('monto_total')
            ->where('venta.fecha>= curdate()')
            ->first();

        return  view('pages/totalventasdia', $data);
    }
    public function ventasmes()
    {
        $VentaModel = new VentaModel();
        $data['ventasmes'] = $VentaModel
            ->select('venta.monto_total,catalogo_servicio.nombre_del_servicio')
            //->select('sum(monto_total)')
            ->join('det_servicio_venta', 'det_servicio_venta.id_venta=venta.id_venta')
            ->join('catalogo_servicio', 'catalogo_servicio.id_servicio=det_servicio_venta.id_servicio')
            ->where('venta.fecha>= DATE_ADD(CURRENT_DATE(), INTERVAL -30 DAY)')
            ->paginate(25);
        $data['total'] = $VentaModel
            ->selectSum('monto_total')
            ->where('venta.fecha>= DATE_ADD(CURRENT_DATE(), INTERVAL -30 DAY) ')
            ->first();


        $data['popular'] = $VentaModel
            ->select('det_servicio_venta.cantidad,catalogo_servicio.nombre_del_servicio')
            //->selectSum('monto_total')
            ->join('det_servicio_venta', 'det_servicio_venta.id_venta=venta.id_venta')
            ->join('catalogo_servicio', 'catalogo_servicio.id_servicio=det_servicio_venta.id_servicio')
            ->where('venta.fecha>= DATE_ADD(CURRENT_DATE(), INTERVAL -30 DAY) ')
            ->orderby('det_servicio_venta.cantidad desc')
            ->first();

        return  view('pages/totalventasmes', $data);
    }

    public function promopopular()
    {
        $VentaModel = new VentaModel();
        $data['popular'] = $VentaModel
            ->select('det_servicio_venta.porcentaje')
            //->selectSum('monto_total')
            ->join('det_servicio_venta', 'det_servicio_venta.id_venta=venta.id_venta')
            ->where('venta.fecha>= DATE_ADD(CURRENT_DATE(), INTERVAL -30 DAY) ')
            ->orderby('det_servicio_venta.porcentaje desc')
            ->first();
        return view('pages/promopopu', $data);
    }
}
