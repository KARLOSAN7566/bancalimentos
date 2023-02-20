<div>
    @section('page_title', 'Socios | Bancalimentos' )
    @section('page_header')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-bar-chart"></i> Socios
        </h1>
        <button class="btn btn-success btn-add-new" data-toggle="modal" data-target="#create-modal">
            <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
        </button>
    </div>
    @stop

    <div class="page-content browse container-fluid">
        <div class="row no-margin-bottom">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>Buscar Socio: </strong></label>
                            <input type="text" class="form-control" placeholder="Nombre del socio" wire:model="searchName">
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-bordered">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>N° Identificacion</th>
                                                    <th>Fecha Cumpleaños</th>
                                                    <th>Genero</th>
                                                    <th>Clase</th>
                                                    <th>Sector</th>
                                                    <th>Teléfono</th>
                                                    <th>Grupo</th>
                                                    <th>Id Sede</th>
                                                    <th>Creado por:</th>
                                                    <th>Actualizado por:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($partners as $partner)
                                                <tr>
                                                    <td>{{ $partner->id }}</td>
                                                    <td>{{ $partner->firstname }}</td>
                                                    <td>{{ $partner->lastname }}</td>
                                                    <td>{{ $partner->identification }}</td>
                                                    <td>{{ $partner->birthday }}</td>
                                                    <td>{{ $partner->genere }}</td>
                                                    <td>{{ $partner->class }}</td>
                                                    <td>{{ $partner->sector }}</td>
                                                    <td>{{ $partner->phone }}</td>
                                                    <td>{{ $partner->group }}</td>
                                                    <td>{{ $partner->site_id }}</td>
                                                    <td>{{ $partner->created_user_id }}</td>
                                                    <td>{{ $partner->updated_user_id }}</td>
                                                    <td>
                                                        <button class="btn btn-primary" wire:click='edit({{ $partner->id }})' data-toggle="modal" data-target="#edit-modal">
                                                            <i class="voyager-edit"></i>
                                                            Editar
                                                        </button>
                                                        <button class="btn btn-danger" wire:click='delete({{ $partner->id }})' data-toggle="modal" data-target="#delete-modal">
                                                            <i class="voyager-trash"></i>
                                                            Eliminar
                                                        </button>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
