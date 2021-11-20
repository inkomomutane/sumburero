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
                            <div class="profile-widget-item-value"></div>
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

@push('js')
    <script src="{{ asset('backend/js/app.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
@endpush
