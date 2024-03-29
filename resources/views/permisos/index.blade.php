@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Permisos
@endsection
@section('main-content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Permisos
                    @can('permisos.create')
                    <a href="{{ route('permisos.create') }}"
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripción</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permisos as $permiso)
                            <tr>
                                <td>{{ $permiso->name }}</td>
                                <td>{{ $permiso->slug }}</td>
                                <td>{{ $permiso->description }}</td>
                                @can('permisos.show')
                                <td width="10px">

                                </td>
                                @endcan
                                @can('permisos.edit')
                                <td width="10px">
                                    <a href="{{ route('permisos.edit', $permiso) }}"
                                    class="btn btn-sm btn-default">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('permisos.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['permisos.destroy', $permiso],
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $permisos->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
