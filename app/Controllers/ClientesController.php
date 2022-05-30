<?php

namespace App\Controllers;


use App\Models\ClienteModel;

class ClientesController extends BaseController
{
    public function readClientes()
    {
        // * Instanciar modelo de la API
        $clienteModel = new ClienteModel();

        // * manda a llamar la funcion getAllEmpleados(), esta funcion nos regresa el resultado de la consulta y lo guarda en la varaible $empleado
        $cliente['clientes'] = $clienteModel->getAllClientes();

        // * regresar al cliente una respues en formato JSON
        //echo "entre";
        return view("pages/clientes", $cliente);
    }
    //--------------------------------------------------------------------------------------------
    public function crearcliente()
    {
        return view('pages/crearcliente');
    }
    //---------------------------------------------------------------------------------------------
    public function registrarcliente()
    {
        // instancia de los modelos que usaremos
        $ClienteModel = new ClienteModel(); // modelo empleado para registrar el nuevo empleado

        // creamos un array de los datos recibidos desde el formulario
        // con el formato 'nombreCampoBD' => $this->request->getPost('nombreDelCampoEnElFormulario')
        $data = [
            'cl_nombre' => $this->request->getPost('cl_nombre'),
            'cl_telefono' => $this->request->getPost('cl_telefono'),
        ];
        if ($ClienteModel->insert($data)) {
            session()->setFlashdata("success", 'agregado');
        } else {
            session()->setFlashdata("error", "no se agrego");
        }

        //$id_empleado = $empleadoModel->insert($data); // insertamos el nuevo registro en la bd


        //session()->setFlashdata('success', 'El usuario fue registrado.'); // creamos un mensaje temporal para que el usuario sepa que no ocurrió ningún error

        return redirect()->to(base_url('/clientes')); // retornamos a la url principal de empleados
    }
    public function editarcliente($idcliente)
    {
        $ClienteModel = new ClienteModel(); // instancia del modelo empleado para buscar al empleado por $id_empleado que recibimos como parámetro por la url
        //$data['empleado'] = $empleadoModel->getAllEmpleados($id_empleado)


        $data['cliente'] =  $ClienteModel->find($idcliente); // información del empleado a modificar

        return view('pages/editarcliente', $data);
    }

    public function actualizarcliente($idcliente)
    {
        $ClienteModel = new ClienteModel();
        //$empleadoModel->editar($id_empleado);
        $data = [
            'cl_nombre' => $this->request->getPost('cl_nombre'),
            'cl_telefono' => $this->request->getPost('cl_telefono')

        ];
        $ClienteModel->set($data);
        $ClienteModel->where('idcliente', $idcliente);
        if ($ClienteModel->update()) {
            session()->setFlashdata("success", 'Actualización exitosa');
        } else {
            session()->setFlashdata("error", "No se pudo Actualizar");
        }
        return redirect()->to(base_url('/clientes'));
    }
    public function borrarcliente($idcliente)
    {

        $clienteModel = new clienteModel();
        $clienteModel->borrarcliente($idcliente);
        return redirect()->to(base_url('/clientes'));
    }
}
