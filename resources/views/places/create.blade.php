@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add place</div>
                <div class="card-body bg-ligh">
                    {!! Form::open(['action' => 'PlaceController@store', 'method'=>'POST']) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Place name:', ['class' => 'col-form-label']) }}
                        <div class="col-10">
                            {{ Form::text('name', '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            @csrf
                            {{Form::submit('Add place', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>
                    @csrf
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
