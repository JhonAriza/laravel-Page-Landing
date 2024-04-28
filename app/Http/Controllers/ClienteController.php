<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Exports\ClienteExport;
use App\Models\Country;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller
{
    public $departments = null;

    public function index(Request $request)
    {

        $datos['clientes'] = cliente::all();

        return view('cliente.index', $datos);
    }

    public function create(Request $request)
    {
        $clientesGanadores = Cliente::where('ganador', 1)->get();

        $countrys = Country::all();
        $departments = [];
        return view('cliente.create', compact('countrys', 'clientesGanadores', 'departments'));
    }

    public function Consultardepartamentos(Request $request)
    {

        return  $departments = Department::where('country_id', $request->input('country_id'))->get();
    }




    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'cedula' => 'required|numeric',
            'email' => 'required|email',
            'HabeasData' => 'required',
            'celular' => 'required|numeric',
            'country_id'=>'required',
            'department_id'=>'required',
        ];

        $mensaje = [
            'nombre.required' => 'El nombre es requerido',
            'apellido.required' => 'El apellido es requerido',
            'cedula.required' => 'La cédula es requerida',
            'cedula.numeric' => 'La cédula debe ser un valor numérico',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida',
            'HabeasData.required' => 'El campo Habeas Data es requerido',
            'celular.required' => 'El número de celular es requerido',
            'celular.numeric' => 'El número de celular debe ser un valor numérico',
            'country_id.required' => 'El pais es requerido',
            'department_id.required'=>'El Departamento es requerido',

        ];

        $this->validate($request,$campos,$mensaje);
        $datosCliente = request()->except(['_token']);
      //  Cliente::create($request->all());
         Cliente::create($datosCliente);
        return redirect('cliente/create')->with('mensaje', 'registrado !! registrado en el concurso con exito');
    }


    public function exportClientes(Request $request)
    {
        return Excel::download(new ClienteExport, 'clientes.xlsx');
    }
}
