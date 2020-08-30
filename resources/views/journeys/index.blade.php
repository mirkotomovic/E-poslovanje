@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center mb-2">List of journeys</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width=40%>Path</th>
                        <th scope="col" width=20%>Depart time</th>
                        <th scope="col" width=30%>Depart time</th>
                        <th scope="col" width=10%></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journeys as $journey)
                    <tr>
                        <th scope="row">{{ $journey->path->name }}</th>
                        <th scope="row">{{ $journey->depart_time}}</th>
                        <th scope="row">{{ $journey->company->name}}</th>
                        <td class="text-center">
                            {!! Form::open(['action' => ['JourneyController@destroy', 'journey' => $journey], 'method'=>'POST']) !!}
                                @method('DELETE')
                                @csrf
                                {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
