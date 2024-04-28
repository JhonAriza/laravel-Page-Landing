@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>create</title>
</head>
<body>

    <div class="container-fluid bg-info text-light py-3">
        <header class="text-center">
            <h1 class="display-1 " style="font-weight: bold;">Automóvil rayo</h1>
        </header>
        <h6 class="text-dark text-center"><strong>Desarrollado por Jhon ariza</strong></h6>
    </div>


    <form action="{{ url('/cliente') }}" class="needs-validation" novalidate method="POST">
        @csrf

        <div class="container">

            <div class="col-6">
                @if(Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('mensaje') }}</strong>

                </div>
                @endif

            </div>


            <div class="row lon">
                <div class="col-md-6 py-8 formulario ">
                    <h3 class="text-light text-center">Formulario De Registro</h3>
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                        <h6>@error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror </h6>
                    </div>

                    <div class="form-group">
                        <label for="nombre">apellido</label>
                        <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}">
                        <h6> @error('apellido')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror</h6>
                    </div>

                    <div class="form-group">
                        <label for="cedula">cedula</label>
                        <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}">
                        <h6> @error('cedula')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror</h6>
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        <h6>@error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror</h6>
                    </div>

                    <div class="form-group">
                        <label for="celular">celular</label>
                        <input type="celular" name="celular" class="form-control" value="{{ old('celular') }}">
                        <h6> @error('celular')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror</h6>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="country_id" id="country_id">
                            <option value="">Seleccionar País</option>
                            @foreach ($countrys as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <h6> @error('country_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror</h6>
                    </div>

                    <div class="col-12">
                        <select class="form-control" name="department_id" id="department_id">
                            <option value="">Seleccionar Departamento</option>
                            @foreach ($departments as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <h6> @error('department_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror</h6>
                    </div>






                    <br>
                    <div class="col-12">
                        <label for="HabeasData">
                            <input type="checkbox" class="form-check-input" id="HabeasData" name="HabeasData" value="1" required>
                            Autorizo el tratamiento de mis datos de acuerdo con la finalidad establecida
                        </label>
                        <h6> @error('HabeasData')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror</h6>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-warning">

                </div>

                <div class="col-md-6">
                    <h6> ¡Participa y Gana! Concurso de Automóvil</h1>
                        <h1>¿Quieres ganar un emocionante premio? ¡Esta es tu oportunidad!</h1>
                        <div>

                            <img src="{{ asset('img/sonic.jpg') }}" alt="ganador">
                            <img class="car" src="{{ asset('img/car.jpg') }}" alt="ganador">

                        </div>
                        <a class="btn btn-success" href="{{ route('exportClientes') }}">Descargar</a>
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover">
                                <h4>GANADORES</h4>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>apellido</th>
                                        <th>cedula</th>
                                        <th>email</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($clientesGanadores->isNotEmpty())
                                    <tr>
                                        <td>{{ $clientesGanadores->last()->nombre }}</td>
                                        <td>{{ $clientesGanadores->last()->apellido }}</td>
                                        <td>{{ $clientesGanadores->last()->cedula }}</td>
                                        <td>{{ $clientesGanadores->last()->email }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="4">No hay ganadores</td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>
                </div>
            </div>
        </div>
    </form>

</body>
</html>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        function redirectToDepartment() {
            var countryId = document.getElementById('country_id').value;
            var csrfToken = '{{ csrf_token() }}';


            var postData = {
                country_id: countryId
                , _token: csrfToken
            };


            var fetchOptions = {
                method: 'POST'
                , headers: {
                    'Content-Type': 'application/json'
                    , 'X-CSRF-TOKEN': csrfToken

                }
                , body: JSON.stringify(postData)
            };

            fetch('clienteDepartament', fetchOptions)
                .then(response => response.json())
                .then(data => departmentSelect(data));
        }

        function departmentSelect(departments) {
            let departmentSelect = document.getElementById('department_id');
            clearSelect(departmentSelect);
            departments.forEach(function(department) {
                let optionTag = document.createElement('option');
                optionTag.value = department.id;
                optionTag.innerHTML = department.name;
                departmentSelect.appendChild(optionTag);
            });
        }

        function clearSelect(select) {
            while (select.options.length > 1) {
                select.remove(1);
            }
        }


        redirectToDepartment();


        document.getElementById('country_id').addEventListener('change', redirectToDepartment);
    });

</script>

<style>
    /* estilos  css*/

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .formulario {
        background-color: rgb(99, 119, 233);
        border-radius: 26px;
        padding: 45px 50px 8px;
    }

    .row.lon {
        margin-top: 65px;
    }


    img.car {
        position: absolute;
        width: 200px;
        height: 154px;
        margin-top: -244px;
        margin-left: 201px;
    }

</style>
