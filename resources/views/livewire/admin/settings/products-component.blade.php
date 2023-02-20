<div>
    @include('livewire.admin.settings.products-modals.create')
    @include('livewire.admin.settings.products-modals.edit')
    @include('livewire.admin.settings.products-modals.delete')

    @section('page_title', 'Productos | Bancalimentos' )
    @section('page_header')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-treasure"></i> Productos
        </h1>
        <button class="btn btn-success btn-add-new" data-toggle="modal" data-target="#create-modal">
            <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
        </button>
    </div>
    @stop

    <div class="page-content browse container-fluid">
        <div class="row no-margin-bottom">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>Buscar Producto: </strong></label>
                            <input type="text" class="form-control" placeholder="Nombre del producto" wire:model="searchName">
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-bordered">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Descripcion</th>
                                                    <th>Detalles</th>
                                                    <th>Presentación</th>
                                                    <th>Peso en gramos</th>
                                                    <th>Creado por:</th>
                                                    <th>Actualizado por:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->description }}</td>
                                                    <td>{{ $product->details }}</td>
                                                    <td>{{ $product->presentation }}</td>
                                                    <td>{{ $product->weight_gr }}</td>
                                                    <td>{{ \App\Models\User::find($product->created_user_id)->name}}</td>
                                                    <td>{{ \App\Models\User::find($product->updated_user_id)->name}}</td>
                                                    <td>
                                                        <button class="btn btn-primary" wire:click='edit({{ $product->id }})' data-toggle="modal" data-target="#edit-modal">
                                                            <i class="voyager-edit"></i>
                                                            Editar
                                                        </button>

                                                        <button class="btn btn-danger" wire:click='delete({{ $product->id }})' data-toggle="modal" data-target="#delete-modal">
                                                            <i class="voyager-trash"></i>
                                                            Eliminar
                                                        </button>

                                                        <a
                                                        href="{{ route('products_id', ['products_images' => $productId, 'product' => $productId->id]) }}">
                                                        <button class="btn btn-warning">Imagenes</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

</div>
