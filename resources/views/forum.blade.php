@extends('layouts.home-dash')
@section('title', 'Ilmu Tafsir')

@section('content')

    <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid-theme.min.css">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Forum Pertanyaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Forum Pertanyaan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Forum Pertanyaan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                    <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                        <table class="jsgrid-table">
                            <tr class="jsgrid-header-row">
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Nama</th>
                                <th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable"
                                    style="width: 200px;">Kandungan Soalan</th>
                                <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">Jawapan</th>
                                <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                    style="width: 70px;">Jawab Pertanyaan</th>
                            </tr>
                            

                        </table>
                    </div>
                    <div class="jsgrid-grid-body"">
                        <table class="jsgrid-table">
                                <tr class="jsgrid-alt-row">
                                    @foreach($ilmus as $ilmu)
                            
                                <td class="jsgrid-cell" style="width:100px;">{{ $ilmu->data()['username'] }}</td>
                                <td class="jsgrid-cell" style="width: 200px;">{{ $ilmu->data()['kandungansoalan'] }}</td>
                                <td class="jsgrid-cell" style="width: 200px;">{{ $ilmu->data()['jawapan'] }}</td>
                                {{-- <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm rounded-0" type="button" data-toggle="modal"
                                                    data-target="#update{{ $ilmu->id() }}" data-toggle="tooltip"
                                                    data-placement="left" title="Edit">&#9998;</button>
                                                <button class="btn btn-sm rounded-0 ml-2" type="button" data-toggle="modal"
                                                    data-target="#delete{{ $ilmu->id() }}" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">🗑️</button>
                                            </div>
                                        </td> --}}


                            <td class="jsgrid-cell jsgrid-align-center" style="width: 70px;">
                              <button class="btn btn-sm rounded-0" type="button" data-toggle="modal"
                              data-target="#update{{ $ilmu->id() }}" data-toggle="tooltip"
                              data-placement="left" title="Edit">&#9998;</button>
                                    

                            </td>
                            </tr>


                            {{-- Jawab --}}

                            <div class="modal fade bd-example-modal-lg" id="update{{ $ilmu->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Jawab Pertanyaan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                    
                                    <div class="modal-body pl-4">
                    
                                      {!! Form::model($ilmu->data(), ['method'=>'POST', 'action'=> ['App\Http\Controllers\ForumController@update', $ilmu->id()]]) !!}
                                    
                                      <div class="form-group">
                                        {!! Form::label('kandungansoalan', 'Soalan') !!}
                                      {!! Form::textarea('kandungansoalan', null, ['class' => 'form-control' , 'readonly']) !!}
                                    </div>
                    
                                    <div class="form-group">
                                        {!! Form::label('jawapan', 'Jawapan') !!}
                                        {!! Form::textarea('jawapan', null, ['class' => 'form-control'])!!}
                                    </div>
                    
                                    </div>
                    
                                    <div class="modal-footer">
                                      {{-- <button type="button" class="btn btn-success">Save changes</button> --}}
                                      {!! Form::submit('Save changes', ['class'=>'btn btn-success']) !!}
                                      {!! Form::close() !!}
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                           
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
