@extends('layouts.app')

@section('template_title')
    {{ $coch->name ?? 'Show Coch' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Coche</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('coches.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Carroceria Id:</strong>
                            {{ $coch->carroceria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $coch->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $coch->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Caballos:</strong>
                            {{ $coch->caballos }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
