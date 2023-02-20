<div  wire:ignore.self class="modal modal-danger fade" tabindex="-1" id="delete-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}" wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-edit"></i> ¿Estas seguro de eliminar la Sede?</h5>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" wire:click="destroy()">Si, borrar</button>
                <button type="button" class="btn btn-default pull-right" wire:click="cancel()">{{ __('voyager::generic.cancel') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->