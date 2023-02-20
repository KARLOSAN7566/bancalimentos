<div  wire:ignore.self class="modal modal-info fade" tabindex="-1" id="create-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}" wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-plus"></i> Nueva Sede</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label ><strong>Descripción: </strong></label>
                        <input type="text" class="form-control" wire:model="description">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Direccion: </strong></label>
                        <input type="text" class="form-control" wire:model="address">
                        @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Telefóno: </strong></label>
                        <input type="text" class="form-control" wire:model="phones">
                        @error('phones') <span class="text-danger error">{{ $message }}</span>@enderror
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