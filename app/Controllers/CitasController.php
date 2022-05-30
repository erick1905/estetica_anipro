<?php

namespace App\Controllers;


use App\Models\CitasModel;

class CitasController extends BaseController
{
    public function readCitas()
    {
        // * Instanciar modelo de la API
        $CitasModel = new CitasModel();

        // * manda a llamar la funcion getAllEmpleados(), esta funcion nos regresa el resultado de la consulta y lo guarda en la varaible $empleado
        $cliente['cita'] = $CitasModel->getAllCitas();

        // * regresar al cliente una respues en formato JSON
        //echo "entre";
        return view("pages/citas", $cliente);
    }
    public function crearcita()
    {
        return view('pages/crearcita');
    }
    public function registrarcita()
    {
        // instancia de los modelos que usaremos
        $CitasModel = new CitasModel(); // modelo empleado para registrar el nuevo empleado

        // creamos un array de los datos recibidos desde el formulario
        // con el formato 'nombreCampoBD' => $this->request->getPost('nombreDelCampoEnElFormulario')
        $data = [
            'fecha' => $this->request->getPost('fecha'),
            'hora' => $this->request->getPost('hora'),
            'idcliente' => $this->request->getPost('idcliente')
        ];
        if ($CitasModel->insert($data)) {
            session()->setFlashdata("success", 'agregado');
        } else {
            session()->setFlashdata("error", "no se agrego");
        }

        //$id_empleado = $empleadoModel->insert($data); // insertamos el nuevo registro en la bd


        //session()->setFlashdata('success', 'El usuario fue registrado.'); // creamos un mensaje temporal para que el usuario sepa que no ocurrió ningún error

        return redirect()->to(base_url('/citas')); // retornamos a la url principal de empleados
    }
    public function editarcita($id_cita)
    {
        $CitasModel = new CitasModel(); // instancia del modelo empleado para buscar al empleado por $id_empleado que recibimos como parámetro por la url
        //$data['empleado'] = $empleadoModel->getAllEmpleados($id_empleado)


        $data['cita'] =  $CitasModel->find($id_cita); // información del empleado a modificar

        return view('pages/editarcita', $data);
    }

    public function actualizarcita($id_cita)
    {
        //nodo inicial
        $CitasModel = new CitasModel();
        //$empleadoModel->editar($id_empleado);
        $data = [
            'fecha' => $this->request->getPost('fecha'),
            'hora' => $this->request->getPost('hora'),
            'idcliente' => $this->request->getPost('idcliente')

        ];
        $CitasModel->set($data);
        $CitasModel->where('id_cita', $id_cita);
        //if nodo1
        if ($CitasModel->update()) {
            session()->setFlashdata("success", 'Actualización exitosa');
            //nodo2
        } else {
            //nodo3
            session()->setFlashdata("error", "No se pudo Actualizar");
        }
        //nodo final
        return redirect()->to(base_url('/citas'));
    }

    public function borrarcita($id_cita)
    {

        $CitasModel = new CitasModel();
        $CitasModel->borrarcita($id_cita);
        return redirect()->to(base_url('/citas'));
    }
}
