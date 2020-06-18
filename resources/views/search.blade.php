<!DOCTYPE html>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        {!! Form::open(['action' => 'SearchController@search', 'method'=>'GET']) !!}
        <div class="form-group">
            {{Form::label('placeFrom', 'Od')}}
            {{Form::select('placeFrom', $placeNames)}}
        </div>

        <div class="form-group">
            {{Form::label('placeTo', 'Do')}}
            {{Form::select('placeTo', $placeNames)}}
        </div>

        <div class="form-group">
            {{Form::label('date', 'Datum')}}
            {{Form::text('date', \Carbon\Carbon::now()->format('d-m-Y'), array('id' => 'datepicker'))}}
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

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy"});
  });
  </script>