@extends('layouts.admin')

@section('title', 'Add Family')

@section('sidebar')
@parent
@endsection

@section('content')
<div id="content-header">
    <div id="breadcrumb"> <a href="{{url('admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">{{$label_h}}</a> </div>
    <h1>{{$label_h}}</h1>
    @if ($message)
    <div class="alert">
        <button class="close" data-dismiss="alert">×</button>
        <strong>Warning!</strong> {{ $message }} 
    </div>


    @endif
    @if (session('status'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">×</button>
        <strong>Success!</strong> {{ session('status') }} 
    </div>


    @endif
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Informasi Keluarga</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="{{$urlpost}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="keluarga_id" value="{{ $inputs["keluarga_id"] }}" />
                        <div class="control-group">
                            <label class="control-label">Nama Lengkap :</label>
                            <div class="controls">
                                <input type="text" name="nama" value="{{$inputs["nama"]}}" class="span11" placeholder="Nama Lengkap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Alias ( Panggilan ) :</label>
                            <div class="controls">
                                <input type="text" name="alias" value="{{$inputs["alias"]}}" class="span11" placeholder="Alias" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <div class="controls">
                                <label>
                                    <input type="radio" name="jenis_kelamin" value="L" {{$inputs["jenis_kelamin"]==="L" ? "checked" : "" }} />
                                    Laki - laki</label>
                                <label>
                                    <input type="radio" name="jenis_kelamin" value ="P" {{$inputs["jenis_kelamin"]==="P" ? "checked" : "" }} />
                                    Perempuan</label>
                              
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Ibu</label>
                            <div class="controls">
                                <select name="parent_id">
                                    <option value="0">KOSONG</option>
                                    @if (count($parents) > 0)
                                    @foreach ($parents as $p)
                                    <option value="{{$p->keluarga_id}}" {{$p->keluarga_id === $inputs["parent_id"] ? "selected" : "" }}>{{$p->nama}}</option>
                                    @endforeach

                                    @endif


                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Ayah</label>
                            <div class="controls">
                                <select name="parentayah_id">
                                    <option value="0">KOSONG</option>
                                    @if (count($parentayahs) > 0)
                                    @foreach ($parentayahs as $p)
                                    <option value="{{$p->keluarga_id}}" {{$p->keluarga_id === $inputs["parentayah_id"] ? "selected" : "" }}>{{$p->nama}}</option>
                                    @endforeach

                                    @endif


                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Pasangan ( Suami \ Istri ) </label>
                            <div class="controls">
                                <select name="pasangan">
                                    <option value="0">KOSONG</option>
                                    @if (count($pasangans) > 0)
                                    @foreach ($pasangans as $pas)
                                    <option value="{{$pas->keluarga_id}}" {{$pas->keluarga_id === $inputs["pasangan"] ? "selected" : "" }}>{{$pas->nama}}</option>
                                    @endforeach

                                    @endif


                                </select>
                            </div>
                        </div>
                    
                        <div class="control-group">
                            <label class="control-label">Pekerjaan:</label>
                            <div class="controls">
                                <input type="text" name="pekerjaan" value="{{$inputs["pekerjaan"]}}" class="span11" placeholder="Pekerjaan" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Nama Perusahaan</label>
                            <div class="controls">
                                <textarea name="nama_perusahaan"  class="span11" >{{$inputs["nama_perusahaan"]}}</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
