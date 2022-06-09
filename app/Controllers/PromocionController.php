<?php

namespace App\Controllers;

use App\Models\ServiciosModel;

use App\Models\PromocionModel;

class PromocionController extends BaseController
{
    public function readpromos()
    {
        // * Instanciar modelo de la API
        $PromocionModel = new PromocionModel();

        // * manda a llamar la funcion getAllEmpleados(), esta funcion nos regresa el resultado de la consulta y lo guarda en la varaible $empleado
        $Promocion['Promocion'] = $PromocionModel->getAllPromos();

        // * regresar al cliente una respues en formato JSON
        //echo "entre";
        return view("pages/promocion", $Promocion);
    }
    public function crearpromocion()
    {
        $ServiciosModel = new ServiciosModel();
        $data['articulos'] = $ServiciosModel->getServicios();
        return view('pages/crearpromocion', $data);
    }

    public function registrarpromo()
    {
        $PromocionModel = new PromocionModel(); // modelo empleado para registrar el nuevo empleado
        $data = [
            'id_promocion' => $this->request->getPost('id_promocion'),
            'id_servicio' => $this->request->getPost('id_servicio'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin' => $this->request->getPost('fecha_fin'),
            'porcentaje' => $this->request->getPost('porcentaje')
        ];

        if ($PromocionModel->insert($data)) {
            session()->setFlashdata("success", 'agregado');
        } else {
            session()->setFlashdata("error", "no se agrego");
        }
        return redirect()->to(base_url('/promocion')); // retornamos a la url principal de empleados
    }

    public function editarpromo($id_promocion)
    {
        $PromocionModel = new PromocionModel(); // instancia del modelo empleado para buscar al empleado por $id_empleado que recibimos como parámetro por la url
        //$data['empleado'] = $empleadoModel->getAllEmpleados($id_empleado)


        $data['promocion'] =  $PromocionModel->find($id_promocion); // información del empleado a modificar

        return view('pages/editarpromo', $data);
    }

    public function actualizarpromo($id_promocion)
    {
        $PromocionModel = new PromocionModel();
        //$empleadoModel->editar($id_empleado);
        $data = [
            'id_promocion' => $this->request->getPost('id_promocion'),
            'id_servicio' => $this->request->getPost('id_servicio'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin' => $this->request->getPost('fecha_fin'),
            'porcentaje' => $this->request->getPost('porcentaje')

        ];
        $PromocionModel->set($data);
        $PromocionModel->where('id_promocion', $id_promocion);
        if ($PromocionModel->update()) {
            session()->setFlashdata("success", 'Actualización exitosa');
        } else {
            session()->setFlashdata("error", "No se pudo Actualizar");
        }
        return redirect()->to(base_url('/promocion'));
    }

    public function borrarpromo($id_promocion)
    {

        $PromocionModel = new PromocionModel();
        $PromocionModel->borrarpromo($id_promocion);
        return redirect()->to(base_url('/promocion'));
    }
}
