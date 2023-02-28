@extends('layouts.app')

@section('template_title')
    Coch
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Coche') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('coches.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Carroceria</th>
										<th>Nombre</th>
										<th>Precio</th>
										<th>Caballos</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coches as $coch)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $coch->carroceria->nombre }}</td>
											<td>{{ $coch->nombre }}</td>
											<td>{{ $coch->precio }}</td>
											<td>{{ $coch->caballos }}</td>

                                            <td>
                                                <form action="{{ route('coches.destroy',$coch->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('coches.show',$coch->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('coches.edit',$coch->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $coches->links() !!}
            </div>
        </div>
    </div>
@endsection
