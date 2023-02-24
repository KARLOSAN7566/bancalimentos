<div>
    @include('livewire.admin.settings.countries-modals.create')
    @include('livewire.admin.settings.countries-modals.edit')
    @include('livewire.admin.settings.countries-modals.delete')

    <style>
        .sm-b {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
    </style>
    
    @section('page_title', 'Paises | Bancalimentos' )
    @section('page_header')
    
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-location"></i> Paises
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
                        <div class="row no-margin-bottom">
                            <div class="col-md-12">
                                <label ><strong>Buscar Pais: </strong></label>
                                        <input type="text" class="form-control" placeholder="Nombre del Pais" wire:model="searchName">
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-bordered">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="dataTable" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="thwidth"><small>Id</small></th>
                                                        <th class="thwidth"><small>Nombre</small></th>
                                                        <th class="thwidth"><small>Acciones</small></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($countries as $country)
                                                    <tr>
                                                        <td>{{ $country->id }}</td>
                                                        <td>{{ $country->name }}</td>
                                                        <td>
                                                            <button class="btn btn-primary sm-b" wire:click='edit({{ $country->id }})' data-toggle="modal" data-target="#edit-modal"> 
                                                                <i class="voyager-edit"></i>
                                                                Editar
                                                            </button>
                                                            <button class="btn btn-danger sm-b" wire:click='delete({{ $country->id }})' data-toggle="modal" data-target="#delete-modal"> 
                                                                <i class="voyager-trash"></i>
                                                                Eliminar
                                                            </button>
                                                            <a href="{{ route('countries.states', ['country'=>$country->id]) }}">
                                                            <button class="btn btn-warning sm-b">Departamentos</button>
                                                            </a>
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
