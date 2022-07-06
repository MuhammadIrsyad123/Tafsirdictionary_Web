@extends('layouts.home-dash')
@section('title', 'Contoh Tafsir')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Contoh Contoh</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Contoh Tafsir</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Contoh Tafsiran</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                {!! Form::open(['action' => 'App\Http\Controllers\ContohController@store', 'method' => 'POST']) !!}

                <div class="form-group">
                    {!! Form::label('nama', 'Nama Surah') !!}
                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('kandungan', 'Kandugan Surah') !!}
                    {!! Form::textarea('kandungan', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('sahih', 'Contoh Sahih') !!}
                    {!! Form::textarea('sahih', null, ['class' => 'form-control row-4']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('taksahih', 'Contoh Tak Sahih') !!}
                    {!! Form::textarea('taksahih', null, ['class' => 'form-control row-4']) !!}
                </div>
                <div class="form-group">
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href={{route('contoh.get')}} class="btn btn-secondary">Kembali</a>
                        {!! Form::submit('Tambah Contoh', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div> 

                {!! Form::close() !!}

            </div>
            {{-- <div class="form-group">

                    <label for="inputName">Nama Tafsir</label>
                    <input type="text" id="inputName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Definisi</label>
                    <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputClientCompany">Sejarah</label>
                    <textarea id="inputClientCompany" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Cara Tafsiran</label>
                    <textarea id="inputProjectLeader" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Contoh Kitab</label>
                    <textarea id="inputProjectLeader" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputStatus">Kesahihan</label>
                    <select id="inputStatus" class="form-control custom-select">
                        <option selected="" disabled="">Pilih Satu</option>
                        <option>Sahih</option>
                        <option>Tak Sahih</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href={{ route('ilmu.get') }} class="btn btn-secondary">Kembali</a>
                <input type="submit" value="Tambah Metode Tafsiran" class="btn btn-success float-right">
            </div>
        </div> --}}
    </section>
    <!-- /.content -->

@endsection
