@extends('layouts.backend.dashboard')

@section('sessions')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('error') }}</strong>
            </div>
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>

            </div>
        </div>
    @endif
@endsection

@section('content')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush
@push('cssLibs')
    <link rel="stylesheet" href="{{ asset('backend/prism/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

@endpush
@push('jsLibs')
    <script src="{{ asset('backend/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/prism/prism.js') }}"></script>
    <script src="{{ asset('backend/cropper/cropper.js') }}"></script>
    <script src="{{ asset('backend/chart/chart.min.js') }}"></script>
    <script src="{{ asset('backend/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
@endpush

@push('js')
@endpush

@section('modals')
@endsection

