<div>
    @include('livewire.admin.settings.materials-modals.create')
    @include('livewire.admin.settings.materials-modals.edit')
    @include('livewire.admin.settings.materials-modals.delete')
    
    @section('page_title', 'Materiales | Bancalimentos' )
    @section('page_header')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-truck"></i> Materiales
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
                            <label><strong>Buscar Material: </strong></label>
                            <input type="text" class="form-control" placeholder="Nombre del material" wire:model="searchName">
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-bordered">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Descripcion</th>
                                                    <th>Puntos por Kilogramo</th>
                                                    <th>Creado por:</th>
                                                    <th>Actualizado por:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($materials as $material)
                                                <tr>
                                                    <td>{{ $material->id }}</td>
                                                    <td>{{ $material->description }}</td>
                                                    <td>{{ $material->point_for_kilogram }}</td>
                                                    <td>{{ $material->created_user_id }}</td>
                                                    <td>{{ $material->updated_user_id }}</td>
                                                    <td>
                                                        <button class="btn btn-primary" wire:click='edit({{ $material->id }})' data-toggle="modal" data-target="#edit-modal">
                                                            <i class="voyager-edit"></i>
                                                            Editar
                                                        </button>
                                                        <button class="btn btn-danger" wire:click='delete({{ $material->id }})' data-toggle="modal" data-target="#delete-modal">
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
