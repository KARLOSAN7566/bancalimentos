<div wire:ignore.self class="modal modal-info fade" tabindex="-1" data-backdrop="static" data-keyboard="false"
    id="create-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div wire:loading wire:target="addPhone">
                @include('loader.loader')
            </div>
            <div wire:loading wire:target="removePhone">
                @include('loader.loader')
            </div>

            <div wire:loading wire:target="addAddress">
                @include('loader.loader')
            </div>
            <div wire:loading wire:target="removeAddress">
                @include('loader.loader')
            </div>

            <div wire:loading wire:target="addActivity">
                @include('loader.loader')
            </div>
            <div wire:loading wire:target="removeActivity">
                @include('loader.loader')
            </div>
            <div class="modal-header">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}"
                    wire:click="cancel()"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">
                    <i class="voyager-plus"></i>
                    Nuevo partner
                </h5>
            </div>
            <div class="modal-body">
                <div class="row no-margin-bottom">
                    <div class="col-lg-12">
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
                            <label class="is-required"><strong>Teléfono: </strong></label>
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model='phone'>
                                <a href="#" class="input-group-addon"
                                    style="color:#fff;background-color:#2ECC71;border:0px" wire:click='addPhone'>
                                    <i class="voyager-plus"></i>
                                </a>
                            </div>
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @if (count($phones) > 0)
                        <div class="panel panel-bordered">
                            <div class="panel-body" style="margin:5px; padding:5px">
                                <ul style="padding-left:20px">
                                    @foreach ($phones as $item)
                                    <li>{{ $item }} &nbsp; <a href="#" wire:click='removePhone({{ $item }})'><i
                                                class="voyager-trash"></a></i></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif


                        <div class="form-group">
                            <label class="is-required"><strong>Dirección de residencia: </strong></label>
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model='address'>
                                <a href="#" class="input-group-addon"
                                    style="color:#fff;background-color:#2ECC71;border:0px" wire:click='addAddress'>
                                    <i class="voyager-plus"></i>
                                </a>
                            </div>
                            @error('address')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @if (count($addresses) > 0)
                        <div class="panel panel-bordered">
                            <div class="panel-body" style="margin:5px; padding:5px">
                                <ul style="padding-left:20px">
                                    @foreach ($addresses as $item)
                                    <li>{{ $item }} &nbsp; <a href="#" wire:click='removeAddress({{ $item }})'><i
                                                class="voyager-trash"></a></i></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif


                        <div class="form-group">
                            <label class="is-required"><strong>Actividad económica: </strong></label>
                            <div class="row no-margin-bottom">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <select class="form-control" wire:model="activity" id="activity">
                                            <option value="">Seleccionar</option>
                                            @foreach ($economicActivities as $item)
                                            <option value="{{ $item->id }}">{{ $item->code . ' - ' . $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <a href="#" class="input-group-addon"
                                            style="color:#fff;background-color:#2ECC71;border:0px" wire:click='addActivity'>
                                            <i class="voyager-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @error('activity')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @if (count($activities) > 0)
                        <div class="panel panel-bordered">
                            <div class="panel-body" style="margin:5px; padding:5px">
                                <ul style="padding-left:20px">
                                    @foreach ($activities as $activity)
                                    @foreach ($economicActivities as $item)
                                    @if ($item->id == $activity)
                                    <li data-toggle="tooltip" title="{{ $item->code . ' - ' . $item->name }}">
                                        {{ Str::limit($item->code . ' - ' . $item->name, 70) }} &nbsp; <a href="#"
                                            wire:click='removeActivity({{ $item->id }})'><i
                                                class="voyager-trash"></a></i>
                                    </li>
                                    @break;
                                    @endif
                                    @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif


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
                        <div class="form-group">
                            <label class="is-required"><strong>Notas: </strong></label>
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model='note'>
                                <a href="#" class="input-group-addon"
                                    style="color:#fff;background-color:#2ECC71;border:0px" wire:click='addNote'>
                                    <i class="voyager-plus"></i>
                                </a>
                            </div>
                            @error('note')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @if (count($phones) > 0)
                        <div class="panel panel-bordered">
                            <div class="panel-body" style="margin:5px; padding:5px">
                                <ul style="padding-left:20px">
                                    @foreach ($phones as $item)
                                    <li>{{ $item }} &nbsp; <a href="#" wire:click='removePhone({{ $item }})'><i
                                                class="voyager-trash"></a></i></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary pull-right" wire:click="store()">Guardar</button>
                <button type="button" class="btn btn-default pull-right"
                    wire:click="cancel()">{{ __('voyager::generic.cancel') }}</button>
            </div>
        </div>
    </div>
</div>