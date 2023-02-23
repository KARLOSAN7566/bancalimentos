<div>
    @include('livewire.admin.partners.modals.create')
    @include('livewire.admin.partners.modals.edit')
    @include('livewire.admin.partners.modals.delete')


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
                                                        <th>Nombres:</th>
                                                        <th>Apellidos:</th>
                                                        <th>Identificación:</th>
                                                        <th>Fecha de Nacimiento:</th>
                                                        <th>Género:</th>
                                                        <th>Estrato:</th>
                                                        <th>Sector:</th>
                                                        <th>Familiares a cargo:</th>
                                                        <th>Grupo:</th>
                                                        <th>Sede:</th>
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
                                                        <td>{{ $partner->class }}</td>
                                                        <td>{{ ucfirst($partner->sector) }}</td>
                                                        <td>{{ ucfirst($partner->family) }}</td>
                                                        <td>{{ App\PopulationGroup::find($partner->group)->name}}</td>
                                                        <td>{{ App\Site::find($partner->site_id)->description}}</td>
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

