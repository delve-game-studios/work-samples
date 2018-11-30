@extends('admin.app')

@section('title', 'Activ - Admin Panel')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        @include('admin.breadcrumb-partial')

        <div class="container-fluid" tabindex="999">
            <div class="animated fadeIn">

                @if (session('success'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card bg-white w-100">
                    <div class="card-body container-fluid py-3">
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    @parent
    <script src="{{ asset('assets/admin/js/alloy-editor/config.js?t=H8DA') }}"></script>
    <script src="{{ asset('assets/admin/js/alloy-editor/lang/en.js?t=H8DA') }}"></script>
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/admin/js/alloy-editor/assets/alloy-editor-ocean-min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/js/alloy-editor/skins/moono/editor.css?t=H8DA') }}">
@endsection
