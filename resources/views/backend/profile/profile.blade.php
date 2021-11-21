@extends('layouts.backend.dashboard')
@section('content')

    <section class="section">
        <h2 class="section-title">Perfil</h2>
        <div class="row container py-2">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('/backend/images/avatar.png') }}"
                        class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Post's</div>
                            <div class="profile-widget-item-value">{{$user->posts->count()}}</div>
                        </div>

                    </div>
                </div>
                <div class="profile-widget-description pb-0">
                    <div class="profile-widget-name">{{ $user->name }} <div
                            class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>{{$user->roles->first()->name}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



@push('css')
    <link rel="stylesheet" href="{{ asset('backend/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush
@push('cssLibs')
    <link rel="stylesheet" href="{{ asset('backend/prism/prism.css') }}">
@endpush
@push('jsLibs')
    <script src="{{ asset('backend/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/prism/prism.js') }}"></script>
@endpush
