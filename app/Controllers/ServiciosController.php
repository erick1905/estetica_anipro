<?php

namespace App\Controllers;


use App\Models\ServiciosModel;

class ServiciosController extends BaseController
{
    public function readservicios()
    {
        // * Instanciar modelo de la API
        $ServiciosModel = new ServiciosModel();

        // * manda a llamar la funcion getAllEmpleados(), esta funcion nos regresa el resultado de la consulta y lo guarda en la varaible $empleado
        $cliente['servicios'] = $ServiciosModel->getAllservicios();

        // * regresar al cliente una respues en formato JSON
        //echo "entre";
        return view("pages/servicios", $cliente);
    }
    public function crearservicio()
    {
        return view('pages/crearservicio');
    }

    public function registrarservicio()
    {
        // instancia de los modelos que usaremos
        $ServiciosModel = new ServiciosModel(); // modelo empleado para registrar el nuevo empleado

        // creamos un array de los datos recibidos desde el formulario
        // con el formato 'nombreCampoBD' => $this->request->getPost('nombreDelCampoEnElFormulario')
        $data = [
            'nombre_del_servicio' => $this->request->getPost('nombre_del_servicio'),
            'costo_Venta' => $this->request->getPost('costo_Venta'),
            'precio_unitario' => $this->request->getPost('precio_unitario')
        ];
        if ($ServiciosModel->insert($data)) {
            session()->setFlashdata("success", 'agregado');
        } else {
            session()->setFlashdata("error", "no se agrego");
        }

        //$id_empleado = $empleadoModel->insert($data); // insertamos el nuevo registro en la bd


        //session()->setFlashdata('success', 'El usuario fue registrado.'); // creamos un mensaje temporal para que el usuario sepa que no ocurrió ningún error

        return redirect()->to(base_url('/servicios')); // retornamos a la url principal de empleados
    }
    public function editarservicio($id_servicio)
    {
        $ServiciosModel = new ServiciosModel(); // instancia del modelo empleado para buscar al empleado por $id_empleado que recibimos como parámetro por la url
        //$data['empleado'] = $empleadoModel->getAllEmpleados($id_empleado)


        $data['servicio'] =  $ServiciosModel->find($id_servicio); // información del empleado a modificar

        return view('pages/editarservicio', $data);
    }
    public function actualizarservicio($id_servicio)
    {
        $ServiciosModel = new ServiciosModel();
        //$empleadoModel->editar($id_empleado);
        $data = [
            'nombre_del_servicio' => $this->request->getPost('nombre_del_servicio'),
            'costo_Venta' => $this->request->getPost('costo_Venta'),
            'precio_unitario' => $this->request->getPost('precio_unitario')

        ];
        $ServiciosModel->set($data);
        $ServiciosModel->where('id_servicio', $id_servicio);
        if ($ServiciosModel->update()) {
            session()->setFlashdata("success", 'Actualización exitosa');
        } else {
            session()->setFlashdata("error", "No se pudo Actualizar");
        }
        return redirect()->to(base_url('/servicios'));
    }


    public function borrarservicio($id_servicio)
    {

        $ServiciosModel = new ServiciosModel();
        $ServiciosModel->borrarservicio($id_servicio);
        return redirect()->to(base_url('/servicios'));
    }
}
