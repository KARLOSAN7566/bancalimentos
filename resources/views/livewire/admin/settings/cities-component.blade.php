<div>
    @include('livewire.admin.settings.cities-modals.create')
    @include('livewire.admin.settings.cities-modals.edit')
    @include('livewire.admin.settings.cities-modals.delete')

    @section('page_title', 'Municipios | Bancalimentos' )
    @section('page_header')
    
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-location"></i> Municipios
        </h1>
        <button class="btn btn-success btn-add-new" data-toggle="modal" data-target="#create-modal">
            <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
        </button>
    </div>
    @stop

    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <label ><strong>Buscar Municipios: </strong></label>
                        <input type="text" class="form-control" placeholder="Nombre del Municipio" wire:model="searchName">
            </div>
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $city->id }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>
                                            <button class="btn btn-primary" wire:click='edit({{ $city->id }})' data-toggle="modal" data-target="#edit-modal"> 
                                                <i class="voyager-edit"></i>
                                                Editar
                                            </button>
                                            <button class="btn btn-danger" wire:click='delete({{ $city->id }})' data-toggle="modal" data-target="#delete-modal"> 
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
