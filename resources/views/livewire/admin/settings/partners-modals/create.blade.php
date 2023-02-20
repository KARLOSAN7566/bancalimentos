<div  wire:ignore.self class="modal modal-info fade" tabindex="-1" id="create-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}" wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-plus"></i> Nuevo Socio</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label ><strong>Nombres: </strong></label>
                        <input type="text" class="form-control" wire:model="firstname">
                        @error('firstname') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Apellidos: </strong></label>
                        <input type="text" class="form-control" wire:model="lastname">
                        @error('lastname') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Numero de Identificacion: </strong></label>
                        <input type="text" class="form-control" wire:model="identification">
                        @error('identification') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Fecha de Cumpleaños: </strong></label>
                        <input type="date" class="form-control" wire:model="birthday">
                        @error('birthday') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Género: </strong></label>
                        <input type="text" class="form-control" wire:model="genere">
                        @error('genere') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Clase: </strong></label>
                        <input type="text" class="form-control" wire:model="class">
                        @error('class') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Sector: </strong></label>
                        <input type="text" class="form-control" wire:model="sector">
                        @error('sector') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Teléfono: </strong></label>
                        <input type="text" class="form-control" wire:model="phone">
                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Grupo: </strong></label>
                        <input type="text" class="form-control" wire:model="birthday">
                        @error('birthday') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Creado por: </strong></label>
                        <input type="text" class="form-control" wire:model="created_user_id">
                        @error('created_user_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Actualizado por: </strong></label>
                        <input type="text" class="form-control" wire:model="updated_user_id">
                        @error('updated_user_id') <span class="text-danger error">{{ $message }}</span>@enderror
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