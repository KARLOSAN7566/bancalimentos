<div  wire:ignore.self class="modal modal-info fade" tabindex="-1" id="edit-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}" wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-edit"></i> Editar Partner</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="is-required"><strong>Nombres: </strong></label>
                        <input type="text" class="form-control" wire:model="firstname" placeholder="Nombres">
                        @error('firstname')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Apellidos: </strong></label>
                        <input type="text" class="form-control" wire:model="lastname" placeholder="Apellidos">
                        @error('lastname')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Número de identificación: </strong></label>
                        <input type="text" class="form-control" wire:model="identification"
                            placeholder="Número de identificación">
                        @error('identification')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Fecha de nacimiento: </strong></label>
                        <input type="date" class="form-control" wire:model="birthday">
                        @error('birthday')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Género:</strong></label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input wire:model="genere" value="m" type="radio">
                                Masculino</label>
                            <label class="radio-inline">
                                <input wire:model="genere" value="f" type="radio">
                                Femenino</label>
                            <label class="radio-inline">
                                <input wire:model="genere" value="o" type="radio">
                                Otro</label>
                        </div>
                        @error('genere')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Estrato: </strong></label>
                        <select class="form-control" wire:model="class">
                            <option value="">Seleccionar</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        @error('class')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Sector: </strong></label>
                        <select class="form-control" wire:model="sector">
                            <option value="">Seleccionar</option>
                            <option value="urbano">Urbano</option>
                            <option value="rural">Rural</option>
                        </select>
                        @error('class')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Num. Personas nucleo familiar: </strong></label>
                        <input type="text" class="form-control" wire:model="family">
                        @error('family')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Grupo poblacional: </strong></label>
                        <select class="form-control" wire:model="group">
                            <option value="">Seleccionar</option>
                            @foreach ($populationGroups as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('group')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Sede: </strong></label>
                        <select class="form-control" wire:model="site_id">
                            <option value="">Seleccionar</option>
                            @foreach ($sites as $item)
                                <option value="{{ $item->id }}">{{ $item->description }}</option>
                            @endforeach
                        </select>
                        @error('siteId')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="is-required"><strong>Tipo Cuenta:</strong></label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input wire:model="type" value="natural" type="radio">
                                Natural</label>
                            <label class="radio-inline">
                                <input wire:model="type" value="juridica" type="radio">
                                Jurídica</label>
                        </div>
                        @error('genere')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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