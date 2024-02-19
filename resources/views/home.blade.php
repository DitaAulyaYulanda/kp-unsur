@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">SMKN 1 CIPANAS</h1>
@stop

@section('content')
    @if ($user->roles_id == 1)
        <section class="content" id="dw">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $user->count() }}</h3>
                                <p>Guru</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>
                    ​ <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $fasilitas->count() }}</h3>
                                <p>Fasilitas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $beritas->count() }}</h3>
                                <p>Berita</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $gurus->count() }}</h3>
                                <p>Profil Guru</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $profilsekolahs->count() }}</h3>
                                <p>Profil Sekolah</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $trackings->count() }}</h3>
                                <p>Tracking</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <!-- CHART.JS MEMINTA ELEMENT YANG MEMILIKI ID dw-chart -->
                    <canvas id="dw-chart"></canvas>
                </div>
            </div>
        </section>
    @else
        Anda Login Sebagai User
    @endif
    {{-- @stop --}}

    </div>
@endsection

@section('footer')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- LOAD FILE dashboard.js -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection

@section('js')
    <script>
        console.log('Hi!')
    </script>
@stop
