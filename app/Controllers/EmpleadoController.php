<?php

namespace App\Controllers;


use App\Models\EmpleadoModel;

/*class EmpleadoController extends BaseController
{

    //funcion para retornar undice de empleados 
    public function index()
    {

        $empleadoModel = new EmpleadoModel();

        $data['empleados'] = $empleadoModel->paginate(10);

        $data['pager'] = $empleadoModel->pager;

        return view('Pages/index', $data);
    }
}*/




// importamos los modelos que vamos a consultar

class EmpleadoController extends BaseController
{
    // vista de indice (tabla) de empleados
    public function index()
    {
        // conseguir todos los empleados vigentes de la bd
        // - creamos una instancia de la tabla de empleados
        $empleadoModel = new EmpleadoModel();

        // Recuperamos los empleados vigentes a traves del modelo
        // Como en el modelo establecimos 'fecha_egreso' como $deletedField
        // CodeIgniter sabe automaticamente que aquellos usuarios con una fecha de egreso registrada
        // son los que no estan vigentes
        // ** Armamos la consulta 
        $data['empleados'] = $empleadoModel->getAllEmpleados();
        // print_r($data['empleados']);
        // return;
        // si usamos la libreria paginate, debemos generar los links
        $data['pager'] = $empleadoModel->pager;
        // enviamos esta informacion a la vista
        // debemos crear una carpeta llama empleado dentro de app/Views
        // y dentro un archivo php llamado index.php
        return view('empleado/index', $data);
    }

    // vista de formulario para crear un nuevo empleado
    public function crear()
    {
        return view('empleado/crear');
    }


    // registrar un nuevo empleado
    public function registrar()
    {
        // instancia de los modelos que usaremos
        $empleadoModel = new EmpleadoModel(); // modelo empleado para registrar el nuevo empleado

        // creamos un array de los datos recibidos desde el formulario
        // con el formato 'nombreCampoBD' => $this->request->getPost('nombreDelCampoEnElFormulario')
        $data = [
            'emp_nombre' => $this->request->getPost('emp_nombre'),
            'fecha_ingreso' => $this->request->getPost('fecha_ingreso'),
            'fecha_egreso' => 'null',
            'estado'  => 1,
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contracena')

        ];
        if ($empleadoModel->insert($data)) {
            session()->setFlashdata("success", 'agregado');
        } else {
            session()->setFlashdata("eroor", "no se agrego");
        }

        //$id_empleado = $empleadoModel->insert($data); // insertamos el nuevo registro en la bd


        //session()->setFlashdata('success', 'El usuario fue registrado.'); // creamos un mensaje temporal para que el usuario sepa que no ocurrió ningún error

        return redirect()->to(base_url('empleados')); // retornamos a la url principal de empleados
    }


    // vista de formulario para editar un empleado
    public function actualizar($id_empleado)
    {
        $empleadoModel = new EmpleadoModel();
        //$empleadoModel->editar($id_empleado);
        $data = [
            'emp_nombre' => $this->request->getPost('emp_nombre'),
            'fecha_ingreso' => $this->request->getPost('fecha_ingreso'),
            'estado'  => 1,
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contrasena')

        ];
        $empleadoModel->set($data);
        $empleadoModel->where('id_empleado', $id_empleado);
        if ($empleadoModel->update()) {
            session()->setFlashdata("success", 'Actualización exitosa');
        } else {
            session()->setFlashdata("error", "No se pudo Actualizar");
        }
        return redirect()->to(base_url('empleados'));
    }

    // actualizar los datos de un registro
    public function editar($id_empleado)
    {
        $empleadoModel = new EmpleadoModel(); // instancia del modelo empleado para buscar al empleado por $id_empleado que recibimos como parámetro por la url
        //$data['empleado'] = $empleadoModel->getAllEmpleados($id_empleado);

        $data['empleado'] = $empleadoModel->find($id_empleado); // información del empleado a modificar

        return view('empleado/editar', $data);
    }

    // actualizar los datos de un registro


    // eliminar un registro por id 
    public function borrarempleado($id_empleado)
    {
        $empleadoModel = new EmpleadoModel();
        $empleadoModel->borrarempleado($id_empleado);
        return redirect()->to(base_url('/empleados'));
    }
}
