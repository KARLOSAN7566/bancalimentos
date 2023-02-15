<div>
    @include('livewire.admin.customers.modals.create')
    @include('livewire.admin.customers.modals.edit')
@include('livewire.admin.customers.modals.delete')


    @section('page_title', 'Clientes | Bancalimentos' )
    @section('page_header')
    
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-location"></i> Clintes
        </h1>
        <button class="btn btn-success btn-add-new" data-toggle="modal" data-target="#create-modal">
            <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
        </button>
    </div>
    @stop

    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <label ><strong>Buscar Cliente: </strong></label>
                        <input type="text" class="form-control" placeholder="Nombre del Cliente" wire:model="searchName">
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
                                        <th>Tipo Identificación</th>
                                        <th>Numero Identificación</th>
                                        <th>Genero</th>
                                        <th>Dirección</th>
                                        <th>Ciudad</th>
                                        <th>Teléfono</th>
                                        <th>WhatsApp</th>
                                        <th>Correo Electrónico</th>
                                        <th>Usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ $customer->identification_type }}</td>
                                        <td>{{ $customer->identification_number }}</td>
                                        <td>{{ $customer->gender }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->city_id }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->whatsapp }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>
                                            <button class="btn btn-primary" wire:click='edit({{ $customer->id }})' data-toggle="modal" data-target="#edit-modal"> 
                                                <i class="voyager-edit"></i>
                                                Editar
                                            </button>
                                            <button class="btn btn-danger" wire:click='delete({{ $customer->id }})' data-toggle="modal" data-target="#delete-modal"> 
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
