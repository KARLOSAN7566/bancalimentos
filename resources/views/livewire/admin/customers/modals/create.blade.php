<div  wire:ignore.self class="modal modal-info fade" tabindex="-1" id="create-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}" wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-plus"></i> Nuevo Cliente</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label ><strong>Nombres: </strong></label>
                        <input type="text" class="form-control" wire:model="first_name">
                        @error('first_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Apellidos: </strong></label>
                        <input type="text" class="form-control" wire:model="last_name">
                        @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>


                    <div class="col-lg-12">
                        {{-- <label ><strong>Tipo de Identificación: </strong></label> --}}
                        {{-- <input type="text" class="form-control" wire:model="identification_type"> --}}

                        <select  selected="selected" name="select" value="">
                            <option value="">Tipo de Identificación</option>
                            <input type="text" class="form-control" wire:model="identification_type">
                            
                        @error('identification_type') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Numero de Identificación: </strong></label>
                        <input type="text" class="form-control" wire:model="identification_number">
                        @error('identification_number') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Genero: </strong></label>
                        <input type="text" class="form-control" wire:model="gender">
                        @error('gender') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Dirección: </strong></label>
                        <input type="text" class="form-control" wire:model="address">
                        @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Ciudad: </strong></label>
                        <input type="text" class="form-control" wire:model="city_id">
                        @error('city_id') <span class="text-danger error">{{ $message }}</span>@enderror
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

                    <div class="col-lg-12">
                        <label ><strong>Usuario: </strong></label>
                        <input type="text" class="form-control" wire:model="user_id">
                        @error('user_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" wire:click="store()">Guardar</button>
                <button type="button" class="btn btn-default pull-right" wire:click="cancel()">{{ __('voyager::generic.cancel') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->