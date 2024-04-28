<?php

namespace App\Console\Commands;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ClienteGanador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cliente-ganador';
   //para probar php artisan schedule:work   | php artisan policies:app:cliente-ganador
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'buscar el cliente ganador';


    public function handle()
    {
        // Buscar los últimos 5  ultimos clientes
        $ultimosClientes = Cliente::latest()->take(5)->get();

        // Seleccionar uno al azar de los últimos 5 clientes
        $clienteSeleccionado = $ultimosClientes->random();

        // Actualizar el campo "ganador" del cliente seleccionado a true
        Cliente::where('id', $clienteSeleccionado->id)->update(['ganador' => true]);

        $this->info('Se ha seleccionado un cliente al azar de los últimos 5 clientes en la base de datos y se ha marcado como ganador.');
    }

}


