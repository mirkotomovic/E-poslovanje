@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add journey</div>
                <div class="card-body bg-ligh">
                    {!! Form::open(['action' => 'JourneyController@store', 'method'=>'POST']) !!}
                    <div class="form-group">
                        {{ Form::label('path_id', 'Path:', ['class' => 'col-form-label']) }}
                        <div class="col-10">
                            {{Form::select('path_id', $pathNames, "", ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('company_id', 'Company:', ['class' => 'col-form-label']) }}
                        <div class="col-10">
                            {{Form::select('company_id', $companyNames, "", ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('date', 'Date:', ['class' => 'col-form-label']) }}
                        <div class="col-10">
                            {{Form::date('date', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('time', 'Depart time:', ['class' => 'col-form-label']) }}
                        <div class="col-10">
                            {{Form::time('time', '12:00:00', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tickets_available', 'Tickets:', ['class' => 'col-form-label']) }}
                        <div class="col-10">
                            {{Form::number('tickets_available', "", ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            @csrf
                            {{Form::submit('Add journey', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
