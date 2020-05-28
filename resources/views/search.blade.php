<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        {!! Form::open(['action' => 'SearchController@search', 'method'=>'GET']) !!}
        <div class="form-group">
            {{Form::label('from', 'From')}}
            {{Form::text('from', '', ['class'=>'form-control', 'placeholder'=>'Beograd'])}}
        </div>

        <div class="form-group">
            {{Form::label('to', 'To')}}
            {{Form::text('to', '', ['class'=>'form-control', 'placeholder'=>'Kragujevac'])}}
        </div>

        {{Form::submit('Search', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

    </body>
    @if (isset($journeys) && count($journeys) > 0)
        @foreach ($journeys as $journey)
            <hr>
            <b>{{$journey->path->name}}</b><br>
            <i>{{$journey->depart_time}}</i>
        @endforeach
    @endif
</html>
