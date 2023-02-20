<div  wire:ignore.self class="modal modal-info fade" tabindex="-1" id="edit-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}" wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-edit"></i> Editar Producto</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label ><strong>Descripción: </strong></label>
                        <input type="text" class="form-control" wire:model="description">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Detalles: </strong></label>
                        <input type="text" class="form-control" wire:model="details">
                        @error('details') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Presentación: </strong></label>
                        <input type="text" class="form-control" wire:model="presentation">
                        @error('presentation') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-lg-12">
                        <label ><strong>Peso en gramos: </strong></label>
                        <input type="text" class="form-control" wire:model="weight_gr">
                        @error('weight_gr') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-md-12">
                        <label ><strong>Imagenes: </strong></label>
                        <div class="form-group">
                            <input type="file" class="form-control" wire:model="images" multiple>
                            @error('image.*') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
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