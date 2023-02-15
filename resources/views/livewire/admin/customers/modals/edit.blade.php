<div  wire:ignore.self class="modal modal-info fade" tabindex="-1" id="edit-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}" wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-edit"></i> Editar Cliente</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label ><strong>Nombres: </strong></label>
                        <input type="text" class="form-control" wire:model="firstName">
                        @error('firstName') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Apellidos: </strong></label>
                        <input type="text" class="form-control" wire:model="lastName">
                        @error('lastName') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Tipo de Identificación: </strong></label> 
                        <select class="form-control" wire:model="identificationType">
                            <option value="">Seleccionar</option>
                            <option value="cc">Cedula de Ciudadania</option>
                            <option value="ti">Tarjeta de Identidad</option>
                        </select>   
                        @error('identificationType') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Numero de Identificación: </strong></label>
                        <input type="text" class="form-control" wire:model="identificationNumber">
                        @error('identificationNumber') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Genero: </strong></label><br>
                        <input type="radio" wire:model="gender"  value="m">
                        <label for="html">Masculino</label>
                        <input type="radio" wire:model="gender" value="f">
                        <label for="html">Femenino</label>
                        @error('gender') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Dirección: </strong></label>
                        <input type="text" class="form-control" wire:model="address">
                        @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Pais: </strong></label>
                        <select class="form-control" wire:model="countryId">
                            <option value="">Seleccionar</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('countryId') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Departamento: </strong></label>
                        <select class="form-control" wire:model="stateId">
                            <option value="">Seleccionar</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        @error('stateId') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Municipio: </strong></label>
                        <select class="form-control" wire:model="cityId">
                            <option value="">Seleccionar</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('cityId') <span class="text-danger error">{{ $message }}</span>@enderror  
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Teléfono: </strong></label>
                        <input type="text" class="form-control" wire:model="phone">
                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>WhatsApp: </strong></label>
                        <input type="text" class="form-control" wire:model="whatsapp">
                        @error('whatsapp') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Correo Electrónico: </strong></label>
                        <input type="text" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" wire:click="update()">Guardar</button>
                <button type="button" class="btn btn-default pull-right" wire:click="cancel()">{{ __('voyager::generic.cancel') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->