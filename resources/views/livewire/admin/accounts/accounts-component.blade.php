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
                    <div class="panel-body" style="padding:10px">
                        <div class="row no-margin-bottom">
                            <div class="col-lg-12">
                                <div class="row no-margin-bottom">
                                    <div class="col-lg-6" style="margin-bottom:0px">
                                        <a href="javascript:void(0);" class="link-button" wire:click='updateType(1)'>
                                            <div @if ($type==1) class="text-center button-active" @else
                                                class="text-center button-inactive" @endif>
                                                <h5 style="padding-top:5px"><i class="fa fa-user"></i>&nbsp;Persona
                                                    Natural</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6" style="margin-bottom:0px">
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
                                <div class="panel panel-bordered"
                                    style="padding:10px;margin-bottom:0px;padding-top:0px">
                                    <div class="row no-margin-bottom">
                                        <div class="col-lg-10" style="margin-bottom:0px;">
                                            <label><strong>Buscar aliado
                                                    {{ $type == '1' ? '(Cédula de ciudadania)' : '(NIT)' }}:</strong></label>
                                            <input type="text" class="form-control" wire:model='searchPartnerField'
                                                wire:keydown.enter="searchPartner">
                                            @error('searchPartnerField')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-2"
                                            style='padding-top:22px;padding-left:0px;margin-bottom:0px'>
                                            <div class="row no-margin-bottom">
                                                <div class="col-lg-6 text-center"
                                                    style="padding-left:5px;padding-right:5px;margin-bottom:0px">
                                                    <button class="btn btn-primary" wire:click='searchPartner'><i
                                                            class="fa fa-search"></i>&nbsp;Buscar</button>
                                                </div>
                                                <div class="col-lg-6 text-center"
                                                    style="padding-left:5px;padding-right:5px;margin-bottom:0px">
                                                    @livewire('admin.partners.add-partner-component')
                                                </div>
                                            </div>
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
                                               
                                                <h5 style="margin-bottom:0px">Información de aliado&emsp;<button class="btn btn-warning sm-b"><i
                                                    class="fa fa-pencil-square-o"></i>&nbsp;Editar</button></h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body" style="padding-top:10px">
                                        <div class="row no-margin-bottom">
                                            @if ($partner != [])
                                            <div class="col-lg-12" style="padding:0px">
                                                <div class="row no-margin-bottom">
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Número de
                                                                identificación</li></small>
                                                        </label>
                                                        <p>&emsp;{{ $partner->identification }}</p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Nombres</li></small>
                                                        </label>
                                                        <p>&emsp;{{ $partner->firstname }}</p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Apellidos</li></small>
                                                        </label>
                                                        <p>&emsp;{{ $partner->lastname }}</p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Fecha de nacimiento</li></small>
                                                        </label>
                                                        <p>&emsp;{{ $partner->birthday }}</p>
                                                    </div>
                                                </div>
                                                <div class="row no-margin-bottom">
                                                    <div class="col-lg-3">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Genero</li></small>
                                                        </label>
                                                        <p>&emsp;
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
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Estrato</li></small>
                                                        </label>
                                                        <p>&emsp;{{ $partner->class }}</p>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Sector</li></small>
                                                        </label>
                                                        <p>&emsp;{{ $partner->sector }}</p>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Personas nucleo
                                                                familiar</li></small>
                                                        </label>
                                                        <p>&emsp;{{ $partner->family }}</p>
                                                    </div>
                                                </div>
                                                <div class="row no-margin-bottom">
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Grupo poblacional</li></small>
                                                        </label>
                                                        <p>&emsp;
                                                            @foreach ($populationGroups as $item)
                                                            @if ($item->id == $partner->group)
                                                            {{ $item->name }}
                                                            @break
                                                            @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Sede</li></small>
                                                        </label>
                                                        <p>&emsp;
                                                            @foreach ($sites as $item)
                                                            @if ($item->id == $partner->site_id)
                                                            {{ $item->description }}
                                                            @break
                                                            @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Fecha de creación</li></small>
                                                        </label>
                                                        <p>&emsp;{{ date('Y-m-d H:i:s', strtotime($item->created_at)) }}
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Creado por</li></small>
                                                        </label>
                                                        <p>&emsp;{{
                                                            \App\Models\User::find($partner->created_user_id)->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row no-margin-bottom">
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Actividades
                                                                económicas</li></small>
                                                        </label>
                                                        <p>&emsp;
                                                        <ul>
                                                            @foreach ($activities as $item)
                                                            <li>
                                                                @foreach ($ciiu as $code)
                                                                @if ($code->id == $item->activity_id)
                                                                {{ $code->name }}
                                                                @endif
                                                                @endforeach
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Teléfono</li></small>
                                                        </label>
                                                        <p>&emsp;
                                                        <ul>
                                                            @foreach ($phones as $item)
                                                            <li>{{ $item->phone }}</li>
                                                            @endforeach
                                                        </ul>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Dirección</li></small>
                                                        </label>
                                                        <p>&emsp;
                                                        <ul>
                                                            @foreach ($addresses as $item)
                                                            <li>{{ $item->address }}</li>
                                                            @endforeach
                                                        </ul>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-bottom:0px">
                                                        <label style="font-weight:bolder"><small>
                                                            <li>Notas</li></small>
                                                        </label>
                                                        <p>&emsp;
                                                        <ul>
                                                            @foreach ($notes as $item)
                                                            <li>{{ $item->note }}</li>
                                                            @endforeach
                                                        </ul>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-right">
                                                
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
                                            <div class="panel panel-bordered"
                                                style="margin-bottom:0px;border-color:#FB641A;border-radius:5px">
                                                <div class="panel-heading"
                                                    style="background-color:#FB641A;color:#fff;padding:5px">
                                                    <h5> Cuenta #{{ $account->number }}</h5>
                                                </div>
                                                <div class="panel-body" style="padding:10px">
                                                    <div class="row no-margin-bottom">
                                                        <div class="col-lg-12">
                                                            <ul>
                                                                <li><strong>No.
                                                                        Cuenta:</strong>{{ $account->number }}
                                                                </li>
                                                                <li><strong>Estado: </strong><span
                                                                        class="label label-success">Cuenta
                                                                        Activa</span></li>
                                                                <li><strong>Balance de puntos:
                                                                    </strong>{{ $account->balance_points }}
                                                                </li>
                                                                <li><strong>Puntos consignados:
                                                                    </strong>{{ $account->sum_consigned }}
                                                                </li>
                                                                <li><strong>Puntos retirados:
                                                                    </strong>{{ $account->sum_withdrawal }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer" style="padding:5px">
                                                    <div class="row no-margin-bottom">
                                                        <div class="col-lg-12" style="margin:0px">
                                                            <button class="btn btn-danger sm-b pull-right"
                                                                style="margin-right:5px"><i
                                                                    class="fa fa-window-close"></i>&nbsp;Inhabilitar</button>

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