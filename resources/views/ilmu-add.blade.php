@extends('layouts.home-dash')
@section('title', 'Ilmu Tafsir')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Metode Tafsir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Metode Tafsir</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Metode Tafsir</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                {!! Form::open(['action' => 'App\Http\Controllers\IlmuController@store', 'method' => 'POST']) !!}

                <div class="form-group">
                    {!! Form::label('nama', 'Nama Tafsir') !!}
                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('definisi', 'Definisi') !!}
                    {!! Form::textarea('definisi', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('sejarah', 'Sejarah') !!}
                    {!! Form::textarea('sejarah', null, ['class' => 'form-control row-4']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('caratafsiran', 'Cara Tafsiran') !!}
                    {!! Form::textarea('caratafsiran', null, ['class' => 'form-control row-4']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('contohkitab', 'Contoh Kitab') !!}
                    {!! Form::textarea('contohkitab', null, ['class' => 'form-control row-4']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('kesahihan', 'Kesahihan') !!}
                    {!! Form::text('kesahihan', null, ['class' => 'form-control row-4']) !!}
                </div>

                <div class="form-group">
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href={{ route('ilmu.get') }} class="btn btn-secondary">Kembali</a>
                        {!! Form::submit('Tambah Metode', ['class' => 'btn btn-primary']) !!}
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
