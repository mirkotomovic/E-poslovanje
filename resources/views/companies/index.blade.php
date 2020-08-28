@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center mb-2">List of companies</h2>
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
                    @foreach ($companies as $company)
                    <tr>
                        <th scope="row">{{ $company->name }}</th>
                        <td class="text-center">
                            {!! Form::open(['action' => ['CompanyController@destroy', 'company' => $company], 'method'=>'POST']) !!}
                                @method('DELETE')
                                @csrf
                                {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}
                            {!! Form::close() !!}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('companies.edit', ['company' => $company]) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
