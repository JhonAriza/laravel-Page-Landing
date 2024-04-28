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


    </div>
    <form action="{{ url('/cliente') }}" class="needs-validation" novalidate  method="POST">
        @csrf

       <div class="container">

        <div class="col-6">
            @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>

            </div>
            @endif
            <h6> ¡Participa y Gana! Concurso de Automóvil</h1>
                <h3>¿Quieres ganar un emocionante premio? ¡Esta es tu oportunidad!</h3>
        </div>

        <div class="row">
            <div class="col-md-6 formulario">
                <div class="col-12">
                    <label for="nombre">nombre</label>
                    <input type="text" class="form-control"   name="nombre" id="nombre"
                        value="{{ isset($item->nombre)?$item->nombre:'' }}">
                    <div class="valid-feedback">Cargando..</div>
                    <div class="invalid-feedback">Falta llenar el campo nombre</div>
                </div>

                <div class="col-12">
                    <label for="apellido">apellido</label>
                    <input type="text" class="form-control" required name="apellido" id="apellido"
                        value="{{ isset($item->apellido)?$item->apellido:'' }}">
                    <div class="valid-feedback">Cargando..</div>
                    <div class="invalid-feedback">Falta llenar el campo apellido</div>
                </div>

                <div class="col-12">
                    <label for="cedula">cedula</label>
                    <input type="text" class="form-control" required name="cedula" id="cedula"  data-numeric
                        value="{{ isset($item->cedula)?$item->cedula:'' }}">
                    <div class="valid-feedback">Cargando..</div>
                    <div class="invalid-feedback">Falta llenar el campo documento</div>
                </div>

                <div class="col-12">
                    <label for="email">email</label>
                    <input type="email" class="form-control" required name="email" id="email"
                        value="{{ isset($item->email)?$item->email:'' }}">
                    <div class="valid-feedback">Cargando..</div>
                    <div class="invalid-feedback">Falta llenar el campo email  & debe contener el símbolo "@".</div>
                </div>
                <div class="col-12">
                    <label for="celular">celular</label>
                    <input type="text" class="form-control" required name="celular" id="celular" data-numeric
                        value="{{ isset($item->celular)?$item->celular:'' }}">
                    <div class="valid-feedback">Cargando..</div>
                    <div class="invalid-feedback">Falta llenar el campo celular</div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class='mb4'>
                            <select class="form-control" name="country_id" id="country_id" required>
                                <option value="">Seleccionar País</option>
                                @foreach ($countrys as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="valid-feedback">Cargando..</div>
                        <div class="invalid-feedback">Falta seleccionar país </div>
                    </div>
                </div>


                <br>

                <div class="col-12">
                    <!-- SE CREA SELECT PARA LA LLAVE FORANEA de paises -->
                    <div class="row">
                        <div class="col-12">
                            <div class='mb4'>
                                <select class="form-control" name="department_id" id="department_id">
                                    <option value="">Seleccionar Departamento</option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="valid-feedback">Cargando..</div>
                            <div class="invalid-feedback">Falta seleccionar departmento </div>
                        </div>
                    </div>
                </div>
                <br>

                <br>
                <div class="col-12">
                    <label for="HabeasData">
                        <input type="checkbox" class="form-check-input" id="HabeasData" name="HabeasData" value="1"
                            required>
                        Autorizo el tratamiento de mis datos de acuerdo con la finalidad establecida
                    </label>
                    <div class="valid-feedback">¡Correcto!</div>
                    <div class="invalid-feedback">Por favor, acepta el tratamiento de tus datos según lo establecido.</div>
                </div>
                <br>
                <input type="submit" class="btn btn-warning" >

            </div>

            <div class="col-md-6">
                <div>
                    <img src="{{ asset('img/sonic.jpg') }}" alt="ganador">
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
                  country_id: countryId,
                  _token: csrfToken
              };


              var fetchOptions = {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': csrfToken

                  },
                  body: JSON.stringify(postData)
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



      var alerta = document.getElementById('mensajeAlerta');
      setTimeout(function() {
          alerta.classList.remove('show');
          alerta.classList.add('fade');
      }, 2000); // 5000 milisegundos = 5 segundos


      //validacion de formulaio bootstrap
      (function() {
      'use strict';
      var forms = document.querySelectorAll('.needs-validation');
      Array.prototype.slice.call(forms).forEach(function(form) {
          form.addEventListener('submit', function(event) {
              if (!form.checkValidity()) {
                  event.preventDefault();
                  event.stopPropagation();
              }

              // Validación personalizada para campos numéricos
              var numericFields = form.querySelectorAll('[data-numeric]');
              Array.prototype.slice.call(numericFields).forEach(function(field) {
                  if (!isNumeric(field.value)) {
                      field.classList.add('is-invalid');
                  }
              });

              form.classList.add('was-validated');
          }, false);
      });

      // Función para verificar si un valor es numérico
      function isNumeric(value) {
          return !isNaN(parseFloat(value)) && isFinite(value);
      }
  })();


  </script>

  <style>
      /* estilos  css*/
      .formulario {
          background-color: rgb(63, 81, 181);
          border-radius: 26px;
          padding: 21px 26px 20px;
      }
  </style>
