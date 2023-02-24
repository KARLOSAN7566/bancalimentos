<div>
    @include('livewire.admin.partners.modals.create')
    @include('livewire.admin.partners.modals.edit')
    @include('livewire.admin.partners.modals.delete')

    <style>
        .sm-b {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
    </style>

    @section('page_title', 'Partners | Bancalimentos')
    @section('page_header')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-bar-chart"></i> Partners
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
                                <label><strong>Buscar Socios: </strong></label>
                                <input type="text" class="form-control" placeholder="Nombre del socio"
                                    wire:model="searchName">
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
                                                        <th class="thwidth"><small>Identificación</small></th>
                                                        <th class="thwidth"><small>Fecha de Nacimiento</small></th>
                                                        <th class="thwidth"><small>Género</small></th>
                                                        <th class="thwidth"><small>Telefónos</small></th>
                                                        <th class="thwidth"><small>Direcciones</small></th>
                                                        <th class="thwidth"><small>Actívidades</small></th>
                                                        <th class="thwidth"><small>Nota</small></th>
                                                        <th class="thwidth"><small>Estrato</small></th>
                                                        <th class="thwidth"><small>Sector</small></th>
                                                        <th class="thwidth"><small>Familiares a cargo</small></th>
                                                        <th class="thwidth"><small>Grupo</small></th>
                                                        <th class="thwidth"><small>Sede</small></th>
                                                        <th class="thwidth"><small>Tipo Cuenta</small></th>
                                                        <th class="thwidth"><small>Creado por</small></th>
                                                        <th class="thwidth"><small>Modificado por</small></th>
                                                        <th><small>Acciones</small></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($partners as $partner)
                                                    <tr>
                                                        <td>{{ $partner->id }}</td>
                                                        <td>{{ ucfirst($partner->firstname) }}</td>
                                                        <td>{{ ucfirst($partner->lastname) }}</td>
                                                        <td>{{ $partner->identification }}</td>
                                                        <td>{{ $partner->birthday }}</td>
                                                        <td>
                                                            @switch($partner->genere)
                                                            @case('m')
                                                            Masculino
                                                            @break
                                                            @case('f')
                                                            Femenino
                                                            @break
                                                            @endswitch
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($phonesPartners as $phone)
                                                                @if ($phone->partner_id==$partner->id)
                                                                <li>{{ $phone->phone }}</li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($addressesPartners as $address)
                                                                @if ($address->partner_id==$partner->id)
                                                                <li>{{ $address->address }}</li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($activitiesPartners as $activity)
                                                                @if ($activity->partner_id==$partner->id)
                                                                <li>{{ $activity->activity_id }}</li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($notesPartners as $note)
                                                                @if ($note->partner_id==$partner->id)
                                                                <li>{{ $note->note }}</li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>{{ $partner->class }}</td>
                                                        <td>{{ ucfirst($partner->sector) }}</td>
                                                        <td>{{ ucfirst($partner->family) }}</td>
                                                        <td>{{ App\PopulationGroup::find($partner->group)->name}}</td>
                                                        <td>{{ App\Site::find($partner->site_id)->description}}</td>
                                                        <td>
                                                            @switch($partner->type)
                                                            @case('natural')
                                                            Natural
                                                            @break
                                                            @case('juridica')
                                                            Jurídica
                                                            @break
                                                            @endswitch
                                                        <td>{{ \App\Models\User::find($partner->created_user_id)->name}}
                                                        </td>
                                                        <td>{{ \App\Models\User::find($partner->updated_user_id)->name}}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary sm-b"
                                                                wire:click='edit({{ $partner->id }})'
                                                                data-toggle="modal" data-target="#edit-modal">
                                                                <i class="voyager-edit"></i>
                                                                Editar
                                                            </button>
                                                            <button class="btn btn-danger sm-b"
                                                                wire:click='delete({{ $partner->id }})'
                                                                data-toggle="modal" data-target="#delete-modal">
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
@push('javascript')
<script>
    window.initSelect2 = () => {
            jQuery("#activity").select2({
                theme: "bootstrap",
                dropdownParent: $('#create-modal .modal-body'),
            });
            jQuery("#activity").on('change', function(e) {
                var data = $('#activity').select2("val");
                @this.set('activity', data);
            });
        }
        
        initSelect2();

        window.livewire.on('select2', () => {
            initSelect2();
        });
</script>
@endpush