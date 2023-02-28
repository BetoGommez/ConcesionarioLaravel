@extends('layouts.app')

@section('template_title')
    Update Carroceria
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Carroceria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('carrocerias.update', $carroceria->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('carroceria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
