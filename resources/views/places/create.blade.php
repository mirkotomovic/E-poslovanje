@extends('layouts.app')

@section('content')
    <body>
        <h1 class="text-center"> Add a new place </h1>
        <br>
        <div class="mx-auto w-25">
            {!! Form::open(['action' => 'PlaceController@store', 'method'=>'POST']) !!}
            <div class="form-group">
                {{ Form::label('name', 'Place name') }}
                {{ Form::text('name', '') }}
            </div>
            @csrf
            {{ Form::submit('Add place', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </body>
@endsection
