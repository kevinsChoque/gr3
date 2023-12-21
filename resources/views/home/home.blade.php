@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">--</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar" style="display: none;">
                <i class="fa fa-plus"></i> 
                Nuevo registro
            </button>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <h1 class="text-center text-uppercase font-weight-bold font-italic">Dashboard segun usuario</h1>
    </div>
</div>
<script>
    localStorage.setItem("sbd",0);
    localStorage.setItem("sba",2);
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
        
    });
</script>
@endsection