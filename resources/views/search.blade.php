@extends('layouts.app')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search</div>
                <div class="card-body bg-ligh">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {!! Form::open(['action' => 'SearchController@search', 'method'=>'GET']) !!}
                    <div class="form-group">
                        {{Form::label('placeFrom', 'From:', ['class' => 'col-form-label'])}}
                        <div class="col-10">
                            {{Form::select('placeFrom', $placeNames, "", ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('placeTo', 'To:', ['class' => 'col-form-label'])}}
                        <div class="col-10">
                            {{Form::select('placeTo', $placeNames, "", ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('date', 'Date:', ['class' => 'col-form-label'])}}
                        <div class="col-10">
                            {{Form::date('date', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            @csrf
                            {{Form::submit('Search', ['class'=>'btn btn-primary btn-lg'])}}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    @if (isset($journeys) && count($journeys) > 0)
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @foreach ($journeys as $journey)
                    <div class="card">
                        <div class="card-header">{{$journey->path->name}} <span class="float-right badge badge-primary text-white">{{$journey->depart_time}}</span></div>
                        <div class="card-body bg-ligh">
                            <a class="float-center btn btn-primary" role="button" href="{{ url("#")}}">Buy tickets</a>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
