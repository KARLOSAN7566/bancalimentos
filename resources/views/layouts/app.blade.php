@extends('voyager::master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .is-required:after {
        content: '*';
        margin-left: 3px;
        color: #e64151;
    }

    .select2-selection__rendered {
        line-height: 31px !important;
    }

    .select2-container .select2-selection--single {
        height: 35px !important;
    }

    .select2-selection--single {
  max-width: 100%;

}
.select2-results__option {
  width: 100%;
}

.select2-container--open .select2-dropdown {
  width: 100%;
}
</style>
@endsection

@section('content')
    {{ $slot }}
@stop
