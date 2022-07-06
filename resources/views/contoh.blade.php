@extends('layouts.home-dash')
@section('title', 'contoh Tafsir')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show my-3">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid-theme.min.css">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contoh Tafsiran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Contoh Tafsiran</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3 class="card-title">Contoh Tafsiran</h3>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-sm-right">
                                <a style="margin:2px;" href={{ route('contoh.add') }} class="btn btn-success btn-xs"
                                    role="button"> Tambah </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                    <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                        <table class="jsgrid-table">
                            <tr class="jsgrid-header-row">
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Nama Surah</th>
                                <th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable"
                                    style="width: 200px;">Kandungan Surah</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">Sahih</th>
                                <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                    style="width: 200px;">Tak Sahih</th>
                            </tr>


                        </table>
                    </div>
                    <div class="jsgrid-grid-body"">
                        <table class="jsgrid-table">
                            <tr class="jsgrid-alt-row">
                                @foreach ($contohs as $contoh)
                                    <td class="jsgrid-cell" style="width:100px;">{{ $contoh->data()['nama_surah'] }}</td>
                                    <td class="jsgrid-cell" style="width: 200px;">
                                        {{ $contoh->data()['kandungansurah'] }}</td>
                                    <td class="jsgrid-cell" style="width: 200px;">{{ $contoh->data()['sahih'] }}</td>
                                    <td class="jsgrid-cell" style="width: 200px;">{{ $contoh->data()['taksahih'] }}</td>



                                    </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>

                    <div class="jsgrid-load-shader" style="display: none; position: absolute; inset: 0px; z-index: 1000;">
                    </div>
                    <div class="jsgrid-load-panel"
                        style="display: none; position: absolute; top: 50%; left: 50%; z-index: 1000;">Please, wait...
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>

    <!-- /.content -->

    <script src="../../plugins/jsgrid/demos/db.js"></script>
    <script src="../../plugins/jsgrid/jsgrid.min.js"></script>
@endsection
