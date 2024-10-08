@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Logisticos</h3>
            <a href="{{route('logistics.create')}}" type="button" class="btn btn-success">Crear</a>
        </div>
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">celular</th>
                            <th scope="col">descripción</th>
                            <th scope="col">id user</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logistics as $logistic)
                        <tr class="">
                        <td>{{ $logistic->id}}</td>
                        <td>{{ $logistic->celular}}</td>
                        <td>{{ $logistic->description}}</td>
                        <td>{{ $logistic->id_users}}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{route('logistics.show', $logistic->id)}}" type="button" class="btn btn-success">Detalles</a>
                            <a href="{{route('logistics.destroy', $logistic->id)}}" type="button" class="btn btn-primary">Eliminar</a>
                        </div>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

</div>
@endsection
