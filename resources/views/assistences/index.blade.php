@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
            <h3>Postulaciones</h3>
            @if ($user->id_roles == 1)
                <a href="{{route('assistences.create')}}" type="button" class="btn btn-success">Crear</a>
            @endif
        </div>
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <div class="table-responsive w-100">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ingreso</th>
                            <th scope="col">Status</th>
                            <th scope="col">Nombre evento</th>
                            <th scope="col">Nombre Logistico</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assistences as $assistence)
                        <tr>
                            <td>{{ $assistence->id}}</td>
                            <td>{{ $assistence->updated_at}}</td>
                            @if ($assistence->status == 1)
                                <td>EN PROCESO</td>
                            @endif
                            @if ($assistence->status == 2)
                                <td>CONFIRMADO</td>
                            @endif
                            @if ($assistence->status == 3)
                                <td>RECHAZADO</td>
                            @endif
                            <td>{{ $assistence->events->name}}</td>
                            <td>{{ $assistence->logistics->users->name}}</td>
                            @if ($user->id_roles == 2)
                            <td>
                                <form action="{{ route('assistences.update',  $assistence->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="btn-group">
                                    
                                        <select name="status" id="" class="btn btn-secondary ">
                                            <option value="1">En proceso</option>
                                            <option value="2">confirmado</option>
                                            <option value="3">rechazado</option>
                                        </select>
                                        <input type="submit" value="Editar" class="btn btn-success">
                                    </form>
                                    <form action="{{route('assistences.destroy', $assistence->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar" class="btn btn-primary disabled">
                                    </form>
                                </div>
                            </td>
                            @endif
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
