<div  wire:ignore.self class="modal modal-info fade" tabindex="-1" id="create-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}" wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-plus"></i> Nuevo Material</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label ><strong>Descripción: </strong></label>
                        <input type="text" class="form-control" wire:model="description">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Puntos por Kilogramo: </strong></label>
                        <input type="text" class="form-control" wire:model="point_for_kilogram">
                        @error('point_for_kilogram') <span class="text-danger error">{{ $message }}</span>@enderror
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