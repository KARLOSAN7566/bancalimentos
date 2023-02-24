<div>
    @include('livewire.admin.customers.modals.create')
    @include('livewire.admin.customers.modals.edit')
    @include('livewire.admin.customers.modals.delete')

    <style>
        .sm-b {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
    </style>


    @section('page_title', 'Clientes | Bancalimentos' )
    @section('page_header')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-person"></i> Clintes
        </h1>
        <button class="btn btn-success btn-add-new" data-toggle="modal" data-target="#create-modal">
            <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
        </button>
    </div>
    @stop

    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <label><strong>Buscar Cliente: </strong></label>
                <input type="text" class="form-control" placeholder="Nombre del Cliente" wire:model="searchName">
            </div>
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="thwidth"><small>Id</small></th>
                                        <th class="thwidth"><small>Nombres</small></th>
                                        <th class="thwidth"><small>Apellidos</small></th>
                                        <th class="thwidth"><small>Tipo Identificación</small></th>
                                        <th class="thwidth"><small>Numero Identificación</small></th>
                                        <th class="thwidth"><small>Genero</small></th>
                                        <th class="thwidth"><small>Dirección</small></th>
                                        <th class="thwidth"><small>País</small></th>
                                        <th class="thwidth"><small>Departamento</small></td>
                                        <th class="thwidth"><small>Ciudad</small></th>
                                        <th class="thwidth"><small>Teléfono</small></th>
                                        <th class="thwidth"><small>WhatsApp</small></th>
                                        <th class="thwidth"><small>Correo Electrónico</small></th>
                                        {{-- <th class="thwidth"><small>Usuario</small></th> --}}
                                        <th><small>Acciones</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>
                                            @switch($customer->identification_type)
                                            @case('cc')
                                            Cedula de Ciudadania
                                            @break
                                            @case('ti')
                                            Tarjeta de Identidad
                                            @break
                                            @endswitch
                                        </td>
                                        <td>{{ $customer->identification_number }}</td>
                                        <td>
                                            @switch($customer->gender)
                                            @case('m')
                                            Masculino
                                            @break
                                            @case('f')
                                            Femenino
                                            @break
                                            @endswitch
                                        </td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->country_name }}</td>
                                        <td>{{ $customer->state_name }}</td>
                                        <td>{{ $customer->city_name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->whatsapp }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>
                                        {{-- <td>{{ \App\Models\User::find($customer->created_user_id)->name}}
                                        </td> --}}
                                            <button class="btn btn-primary sm-b" wire:click='edit({{ $customer->id }})' data-toggle="modal" data-target="#edit-modal">
                                                <i class="voyager-edit"></i>
                                                Editar
                                            </button>
                                            <button class="btn btn-danger sm-b" wire:click='delete({{ $customer->id }})' data-toggle="modal" data-target="#delete-modal">
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
