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
                                            <div
                                                @if ($type == 1) class="text-center button-active"
                                            @else
                                            class="text-center button-inactive" @endif>
                                                <h5 style="padding-top:5px"><i class="fa fa-user"></i>&nbsp;Persona
                                                    Natural</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="javascript:void(0);" class="link-button" wire:click='updateType(2)'>
                                            <div
                                                @if ($type == 2) class="text-center button-active"
                                            @else
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
                                            <label><strong>Buscar aliado {{ $type=='1' ? '(Cédula de ciudadania)':'(NIT)' }}:</strong></label>
                                            <input type="text" class="form-control" wire:model='searchPartnerField'>
                                            @error('searchPartnerField')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3" style='padding-top:22px'>
                                            <button class="btn btn-primary" wire:click='searchPartner'><i
                                                    class="fa fa-search" ></i>&nbsp;Buscar</button>
                                            <button class="btn btn-success"><i
                                                    class="fa fa-plus-square"></i>&nbsp;Nuevo</button>
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
                                            
                                                @if ($partner!=[])
                                                <div class="col-lg-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Número de identificación</th>
                                                            <th>Nombres</th>
                                                            <th>Apellidos</th>
                                                            <th>Fecha de nacimiento</th>
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
                                                </table>
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
