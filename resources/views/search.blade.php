@extends('layouts.app')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif
            @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @endif
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
                        <div class="card-header"><span class="text-primary font-weight-bold">{{$journey->path->name}}</span><span class="float-right badge badge-primary text-white">{{$journey->depart_time}}</span></div>
                        <div class="card-body bg-ligh">
                            <span class="font-weight-bold">Company: </span><h5 class="d-inline"><span class="badge badge-danger font-weight-bold">{{$journey->company->name}}</span></h5>
                            <div class="pt-3 pb-3 font-weight-bold">Number of seats available: <h5 class="d-inline"><span class="badge badge-danger">{{$journey->tickets_available}}</span></h5></div>
                            {!! Form::open(['action' => 'TicketController@store', 'method' => 'POST']) !!}
                            <div class="form-group">
                                {!! Form::label('ticketNumber', 'Number of tickets you want to buy:', ['class' => 'col-form-label']) !!}
                                {!! Form::selectRange('ticketNumber', 1, 5) !!}
                                @if (auth()->user()->role != 'admin')
                                    {!! Form::submit("Buy", ["class" => 'btn btn-primary btn-lg float-right']) !!}    
                                    <input type="hidden" value="{{$journey->id}}" name="journeyId">
                                    <input type="hidden" value="{{$journey->company->id}}" name="companyId">
                                @endif    
                            </div>
                            {!! Form::close() !!}
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
