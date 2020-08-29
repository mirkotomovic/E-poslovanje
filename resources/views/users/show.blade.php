@extends('layouts.base')

@section('container')

<div class="container pb-10">
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="img">
                            <img src="{{ asset('img/placeholder.jpg') }}" alt="" srcset=""
                                class="img-thumbnail mx-auto d-block">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $user->name }}
                                </h4>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2 pb-2">
                                        Email
                                        <span class="text-primary">{{ $user->email }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                        Type
                                        <span class="text-primary">{{ $user->role }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                        Created
                                        <span class="text-primary">{{ $user->created_at != null ? $user->created_at : "Unknown Date "  }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if(auth()->user()->role != "admin")
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-center mt-3 mb-2">
                        <h2>Tickets purchased</h2>
                    </div>
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)    
                            <tr class={{$ticket->id % 2 == 0 ? "table-striped table-dark" : "table-secondary"}}>
                                    <th class= "text-dark font-weight-bold" scope="row">{{$ticket->journey->path->name}}</th>
                                    <td class="text-dark font-weight-bold">{{$ticket->created_at}}</td>
                                    <td class="text-success font-weight-bold">Free</td>
                                </tr>                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
