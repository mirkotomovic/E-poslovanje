@extends('layouts.base')

@section('container')
    <div class="jumbotron color-primary">
        <h1 class="display-3 text-center">{{config('app.name','Bus Ticketing')}}</h1>
        <p class="lead text-center">Secure your travel expenses from the comfort of your home</p>
        <hr class="my-4">
        <p class="text-center">@lang('messages.main-text')</p>
    </div>    
@endsection
