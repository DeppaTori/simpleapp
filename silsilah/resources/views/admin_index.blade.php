@extends('layouts.admin')

@section('title', 'Dashboard')

@section('sidebar')
@parent

<p>Selamat Datang.</p>
@endsection

@section('content')

<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">daftar keluarga</a> </div>
    <h1>Daftar Keluarga</h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Informasi Daftar Keluarga</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                <th>Nama</th>
                                <th>ID</th>
                                <th>Alias</th>
                                <th>Ibu</th>
                                <th>Ayah</th>
                                <th>Pekerjaan</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($family) > 0)
                                @foreach ($family as $f)
                                       <tr class="odd gradeX">
                                             
                                            <td>{{$f->nama}}</td>
                                            <td>{{$f->keluarga_id}}</td>
                                            <td>{{$f->alias}}</td>
                                            <td>{{$f->parent_nama}}</td>
                                            <td>{{$f->parentayah_nama}}</td>
                                            <td class="center">{{$f->pekerjaan}}</td>
                                            <td class="center"><a href="{{url('admin/edit/'.$f->keluarga_id)}}" class="btn btn-mini">Edit</a><a href="{{url('admin/delete/'.$f->keluarga_id)}}" class="btn btn-danger btn-mini">Delete</a></td>
                                        </tr>
                                @endforeach

                            @else

                            @endif
                        
                        
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
