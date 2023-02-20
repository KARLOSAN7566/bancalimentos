<div>
    @include('livewire.admin.partners.modals.create')
    @include('livewire.admin.partners.modals.edit')
    @include('livewire.admin.partners.modals.delete')


    @section('page_title', 'Parners | Bancalimentos')
    @section('page_header')

        <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-people"></i> Partners
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
                        <div class="row no-margin-bottom">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('javascript')
    <script>
        window.initSelect2 = () => {
            jQuery("#activity").select2({
                theme: "bootstrap",
                dropdownParent: $('#create-modal .modal-body'),
            });
            jQuery("#activity").on('change', function(e) {
                var data = $('#activity').select2("val");
                @this.set('activity', data);
            });
        }
        
        initSelect2();

        window.livewire.on('select2', () => {
            initSelect2();
        });
    </script>
@endpush

