<div>
    <style>
        .link-button {
            text-decoration: none !important;
        }

        .link-button:hover {
            text-decoration: none !important;
        }

        .link-button:active {
            text-decoration: none !important;
        }

        link-button:hover {
            color: inherit;
        }

        .sm-b {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }

        .button-active {
            background-color: #FB641A;
            color: #fff;
            padding: 6px;
            border-radius: 30px;
            border-color: #FB641A
        }

        .button-inactive {
            background-color: #ffa375;
            color: #fff;
            padding: 6px;
            border-radius: 30px;
            border-color: #FB641A;
        }
    </style>

    <div wire:loading wire:target="updateType">
        @include('loader.loader')
    </div>
    <div wire:loading wire:target="searchPartner">
        @include('loader.loader')
    </div>
    <div class="page-content browse container-fluid">
        <div class="row no-margin-bottom">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <div class="row no-margin-bottom">
                            <div class="col-lg-12">
                                <h4 style="padding-left:20px">Gestión de cuentas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row no-margin-bottom">
                            <div class="col-lg-12">
                                <div class="row no-margin-bottom">
                                    <div class="col-lg-6">
                                        <a href="javascript:void(0);" class="link-button" wire:click='updateType(1)'>
                                            <div @if ($type==1) class="text-center button-active" @else
                                                class="text-center button-inactive" @endif>
                                                <h5 style="padding-top:5px"><i class="fa fa-user"></i>&nbsp;Persona
                                                    Natural</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="javascript:void(0);" class="link-button" wire:click='updateType(2)'>
                                            <div @if ($type==2) class="text-center button-active" @else
                                                class="text-center button-inactive" @endif>
                                                <h5 style="padding-top:5px"><i class="voyager-company"></i>&nbsp;Persona
                                                    Juridica</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-bordered" style="padding:10px;margin-bottom:0px">
                                    <div class="row no-margin-bottom">
                                        <div class="col-lg-9">
                                            <label><strong>Buscar aliado
                                                    {{ $type == '1' ? '(Cédula de ciudadania)' : '(NIT)' }}:</strong></label>
                                            <input type="text" class="form-control" wire:model='searchPartnerField'>
                                            @error('searchPartnerField')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3" style='padding-top:22px'>
                                            <button class="btn btn-primary" wire:click='searchPartner'><i
                                                    class="fa fa-search"></i>&nbsp;Buscar</button>
                                                    @livewire('admin.partners.add-partner-component')
                                            {{-- <button class="btn btn-success"><i
                                                    class="fa fa-plus-square"></i>&nbsp;Nuevo</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin-bottom">
                            <div class="col-lg-12">
                                <div class="panel panel-bordered" style="padding:10px;margin-bottom:0px">
                                    <div class="panel-heading">
                                        <div class="row no-margin-bottom">
                                            <div class="col-lg-12">
                                                <h5>Información de aliado</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row no-margin-bottom">

                                            @if ($partner != [])
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th width='25%'>Número de identificación</th>
                                                            <th width='25%'>Nombres</th>
                                                            <th width='25%'>Apellidos</th>
                                                            <th width='25%'>Fecha de nacimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $partner->identification }}</td>
                                                            <td>{{ $partner->firstname }}</td>
                                                            <td>{{ $partner->lastname }}</td>
                                                            <td>{{ $partner->birthday }}</td>
                                                        </tr>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th width='25%'>Genero</th>
                                                            <th width='25%'>Estrato</th>
                                                            <th width='25%'>Sector</th>
                                                            <th width='25%'>Personas nucleo familiar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                @switch($partner->genere)
                                                                @case('m')
                                                                Masculino
                                                                @break

                                                                @case('f')
                                                                Femenino
                                                                @break

                                                                @case('o')
                                                                Otro
                                                                @break
                                                                @endswitch
                                                            </td>
                                                            <td>{{ $partner->class }}</td>
                                                            <td>{{ $partner->sector }}</td>
                                                            <td>{{ $partner->family }}</td>
                                                        </tr>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th width='25%'>Grupo poblacional</th>
                                                            <th width='25%'>Sede</th>
                                                            <th width='25%'>Fecha de creación</th>
                                                            <th width='25%'>Creado por</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>@foreach ($populationGroups as $item)
                                                                @if ($item->id==$partner->group)
                                                                {{ $item->name }}
                                                                @break
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td>@foreach ($sites as $item)
                                                                @if ($item->id==$partner->site_id)
                                                                {{ $item->description }}
                                                                @break
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{ date('Y-m-d H:i:s',strtotime($item->created_at)) }}
                                                            </td>
                                                            <td>{{ \App\Models\User::find($partner->created_user_id)->name }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th width='25%'>Actividades económicas</th>
                                                            <th width='25%'>Teléfono</th>
                                                            <th width='25%'>Dirección</th>
                                                            <th width='25%'>Notas</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    @foreach ($activities as $item)
                                                                    <li>
                                                                        @foreach ($ciiu as $code)
                                                                        @if ($code->id==$item->activity_id)
                                                                        {{ $code->name }}
                                                                        @endif
                                                                        @endforeach
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    @foreach ($phones as $item)
                                                                    <li>{{ $item->phone }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    @foreach ($addresses as $item)
                                                                    <li>{{ $item->address }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    @foreach ($notes as $item)
                                                                    <li>{{ $item->note }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-12 text-right">
                                                <button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i>&nbsp;Editar</button>
                                            </div>
                                            @else
                                            <div class="col-lg-12 text-center">
                                                <h5>Aliado no seleccionado</h5>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row no-margin-bottom">
                            <div class="col-lg-12">
                                <div class="panel panel-bordered" style="padding:10px">
                                    <div class="panel-heading">
                                        <div class="row no-margin-bottom">
                                            <div class="col-lg-12">
                                                <h5>Cuentas existentes</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        @if ($partner != [])
                                            @if ($accounts != [])
                                                @foreach ($accounts as $account)
                                                <div class="col-lg-6">
                                                <div class="panel panel-bordered" style="margin-bottom:0px;border-color:#FB641A;border-radius:5px">
                                                    <div class="panel-heading" style="background-color:#FB641A;color:#fff;padding:5px">
                                                        <h5> Cuenta #{{ $account->number }}</h5>
                                                    </div>
                                                    <div class="panel-body" style="padding:10px">
                                                        <div class="row no-margin-bottom">
                                                            <div class="col-lg-12">
                                                                <ul>
                                                                    <li><strong>No. Cuenta:</strong>{{ $account->number }}</li>
                                                                    <li><strong>Estado: </strong><span class="label label-success">Cuenta Activa</span></li>
                                                                    <li><strong>Balance de puntos: </strong>{{ $account->balance_points }}</li>
                                                                    <li><strong>Puntos consignados: </strong>{{ $account->sum_consigned }}</li>
                                                                    <li><strong>Puntos retirados: </strong>{{ $account->sum_withdrawal }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer" style="padding:5px">
                                                        <div class="row no-margin-bottom">
                                                            <div class="col-lg-12" style="margin:0px">
                                                                <button class="btn btn-danger sm-b pull-right" style="margin-right:5px"><i class="fa fa-window-close"></i>&nbsp;Inhabilitar</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                @endforeach
                                            @endif
                                        @endif
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