<table>
    <thead>
    <tr>

        <th>nombre</th>
        <th>apellido</th>
        <th>cedula</th>
        <th>email</th>
        <th>HabeasData Si No</th>
        <th>celular</th>
        <th>ganador</th>
        <th>country_id</th>
        <th>department_id</th>
        <th>Fecha y hora de creacion</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($clientes as $cliente)
        <tr>

            <td style="width: 200px">{{ $cliente->nombre }}</td>
            <td style="width: 200px">{{ $cliente->apellido }}</td>
            <td style="width: 200px">{{ $cliente->cedula }}</td>
            <td style="width: 200px">{{ $cliente->email }}</td>
            <td style="width: 200px">{{ $cliente->HabeasData }}</td>
            <td style="width: 200px">{{ $cliente->celular }}</td>
            <td style="width: 200px">
                @if($cliente->ganador == 1)
                    Sí
                @else
                    No
                @endif
            </td>
            <td style="width: 200px">
                @if($cliente->country)
                    {{ $cliente->country->name }}
                @else
                {{ $cliente->country_id }}
                @endif
            </td>
            <td style="width: 200px">
                @if($cliente->department)
                    {{ $cliente->department->name }}
                @else
                {{ $cliente->department_id }}

                @endif
            </td>
            <td style="width: 200px">{{ $cliente->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
