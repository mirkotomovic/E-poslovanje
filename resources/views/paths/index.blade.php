@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center mb-2">List of paths</h2>
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
                        <th scope="col" width=80%>Name</th>
                        <th scope="col" width=10%></th>
                        <th scope="col" width=10%></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paths as $path)
                    <tr>
                        <th scope="row">{{ $path->name }}</th>
                        <td class="text-center">
                            {!! Form::open(['action' => ['PathController@destroy', 'path' => $path], 'method'=>'POST']) !!}
                                @method('DELETE')
                                @csrf
                                {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}
                            {!! Form::close() !!}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('paths.edit', ['path' => $path]) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
