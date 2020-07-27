<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">

    <title>
        {{ config('app.name') }} - @yield('title')
    </title>

    <!-- Favicon -->
    <link href="{{ asset(Storage::url('logo.png')) }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        @include('layouts.components.sidebar')
    </nav>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">@yield('title')</a>
                <!-- Form -->
                @yield('form-search')

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    @auth
                        @can('admin_kontraktor')
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ni ni-bell-55"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0" style="overflow: auto; max-height: 400px;">
                                    <!-- Dropdown header -->
                                    @php
                                        $belumExpired = App\Umum::whereBetween('tanggal_selesai', [date('Y-m-d'),date('Y-m-d', strtotime('+3 day'))])->get();
                                        $expired = App\Umum::whereDate('tanggal_selesai','<', now())->get();
                                    @endphp
                                    <div class="px-3 py-3">
                                        <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{ count($expired) + count($belumExpired) }}</strong> notifications.</h6>
                                    </div>
                                    <!-- List group -->
                                    @foreach ($expired as $item)
                                        @php
                                            if (count($item->ijinKerjaPanas) == 1) {
                                                $url = route('ijin-kerja-panas.show', $item->ijinKerjaPanas[0]->id);
                                            } elseif (count($item->ijinKerjaGalian) == 1) {
                                                $url = route('ijin-kerja-galian.show', $item->ijinKerjaGalian[0]->id);
                                            } elseif (count($item->ijinKerjaListrik) == 1) {
                                                $url = route('ijin-kerja-listrik.show', $item->ijinKerjaListrik[0]->id);
                                            } elseif (count($item->ijinKerjaRadioGrafi) == 1) {
                                                $url = route('ijin-kerja-radiografi.show', $item->ijinKerjaRadioGrafi[0]->id);
                                            } elseif (count($item->ijinKerjaDiKetinggian) == 1) {
                                                $url = route('ijin-kerja-di-ketinggian.show', $item->ijinKerjaDiKetinggian[0]->id);
                                            } elseif (count($item->ijinKerjaRuangTerbatas) == 1) {
                                                $url = route('ijin-kerja-ruang-terbatas.show', $item->ijinKerjaRuangTerbatas[0]->id);
                                            }
                                        @endphp
                                        <div class="list-group list-group-flush">
                                            <a href="{{ $url }}" class="list-group-item list-group-item-action">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <!-- Avatar -->
                                                        <i class="fas fa-exclamation-triangle text-danger"></i>
                                                    </div>
                                                    <div class="col ml--2">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <h4 class="mb-0 text-sm">
                                                                    @php
                                                                        if (count($item->ijinKerjaPanas) == 1) {
                                                                            echo $item->ijinKerjaPanas[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaGalian) == 1) {
                                                                            echo $item->ijinKerjaGalian[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaListrik) == 1) {
                                                                            echo $item->ijinKerjaListrik[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaRadioGrafi) == 1) {
                                                                            echo $item->ijinKerjaRadioGrafi[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaDiKetinggian) == 1) {
                                                                            echo $item->ijinKerjaDiKetinggian[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaRuangTerbatas) == 1) {
                                                                            echo $item->ijinKerjaRuangTerbatas[0]->jsa->nama_perusahaan;
                                                                        }
                                                                    @endphp
                                                                </h4>
                                                            </div>
                                                            <div class="text-right text-muted">
                                                                <small>{{ date('d/m/Y', strtotime($item->tanggal_selesai)) }}</small>
                                                            </div>
                                                        </div>
                                                        <p class="text-sm mb-0">
                                                            {{ $item->nomor }}, Telah habis ijin kerja selama {{ \Carbon\Carbon::parse($item->tanggal_selesai)->diffInDays(now()) }} hari
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    @foreach ($belumExpired as $item)
                                        @php
                                            if (count($item->ijinKerjaPanas) == 1) {
                                                $url = route('ijin-kerja-panas.show', $item->ijinKerjaPanas[0]->id);
                                            } elseif (count($item->ijinKerjaGalian) == 1) {
                                                $url = route('ijin-kerja-galian.show', $item->ijinKerjaGalian[0]->id);
                                            } elseif (count($item->ijinKerjaListrik) == 1) {
                                                $url = route('ijin-kerja-listrik.show', $item->ijinKerjaListrik[0]->id);
                                            } elseif (count($item->ijinKerjaRadioGrafi) == 1) {
                                                $url = route('ijin-kerja-radiografi.show', $item->ijinKerjaRadioGrafi[0]->id);
                                            } elseif (count($item->ijinKerjaDiKetinggian) == 1) {
                                                $url = route('ijin-kerja-di-ketinggian.show', $item->ijinKerjaDiKetinggian[0]->id);
                                            } elseif (count($item->ijinKerjaRuangTerbatas) == 1) {
                                                $url = route('ijin-kerja-ruang-terbatas.show', $item->ijinKerjaRuangTerbatas[0]->id);
                                            }
                                        @endphp
                                        <div class="list-group list-group-flush">
                                            <a href="{{ $url }}" class="list-group-item list-group-item-action">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <!-- Avatar -->
                                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                                    </div>
                                                    <div class="col ml--2">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <h4 class="mb-0 text-sm">
                                                                    @php
                                                                        if (count($item->ijinKerjaPanas) == 1) {
                                                                            echo $item->ijinKerjaPanas[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaGalian) == 1) {
                                                                            echo $item->ijinKerjaGalian[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaListrik) == 1) {
                                                                            echo $item->ijinKerjaListrik[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaRadioGrafi) == 1) {
                                                                            echo $item->ijinKerjaRadioGrafi[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaDiKetinggian) == 1) {
                                                                            echo $item->ijinKerjaDiKetinggian[0]->jsa->nama_perusahaan;
                                                                        } elseif (count($item->ijinKerjaRuangTerbatas) == 1) {
                                                                            echo $item->ijinKerjaRuangTerbatas[0]->jsa->nama_perusahaan;
                                                                        }
                                                                    @endphp
                                                                </h4>
                                                            </div>
                                                            <div class="text-right text-muted">
                                                                <small>{{ date('d/m/Y', strtotime($item->tanggal_selesai)) }}</small>
                                                            </div>
                                                        </div>
                                                        <p class="text-sm mb-0">
                                                            {{ $item->nomor }}, Masa ijin kerja akan habis dalam {{ \Carbon\Carbon::parse($item->tanggal_selesai)->diffInDays(now()) }} hari
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    <!-- View all -->
                                    {{-- <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a> --}}
                                </div>
                            </li>
                        @endcan
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="{{ asset(Storage::url(auth()->user()->foto_profil)) }}" src="{{ asset(Storage::url(auth()->user()->foto_profil)) }}">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->nama }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                <a href="{{ route('profil') }}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Profil Saya</span>
                                </a>
                                <a href="{{ route('pengaturan') }}" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Pengaturan</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('keluar') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('form-keluar').submit();">
                                    <i class="ni ni-user-run"></i>
                                    <span>Keluar</span>
                                </a>

                                <form id="form-keluar" action="{{ route('keluar') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Header -->
        @yield('content-header')

        <!-- Page content -->
        <div class="container-fluid mt--7">
            @yield('content')

            <!-- Footer -->
            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; {{ date('Y') }} <a href="{{ config('app.url') }}" class="font-weight-bold ml-1" target="_blank">{{ config('app.name')}}</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--   Core   -->
    <script src="{{ asset('/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!--   Optional JS   -->

    <!--   Argon JS   -->
    <script src="{{ asset('/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
        $(document).ready(function () {
            document.addEventListener("keydown", function(event) {
                if (event.keyCode == 27) {
                    $('.alert-dismissible').remove();
                    $(".modal").modal('hide');
                }
            });

            $(document).on("change", "input", function () {
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').remove();
                $('.alert-dismissible').remove();
            });

            $(document).on("change", "textarea", function () {
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').remove();
                $('.alert-dismissible').remove();
            });

        });
    </script>
    @stack('scripts')
</body>

</html>
