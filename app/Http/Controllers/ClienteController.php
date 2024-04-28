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
