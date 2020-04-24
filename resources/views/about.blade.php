@extends('layouts.base')

@section('top-body-elements')
    <div class="jumbotron">
        <h1 class="display-3 text-center">{{config('app.name','Bus Ticketing')}}</h1>
        <p class="lead text-center">Secure your travel expenses from the comfort of your home</p>
        <hr class="my-4">
    </div>
@endsection

@section('container')    
    <div class="mx-auto w-25">
        <p class="text-center font-weight-normal text-justify">@lang('messages.main-text')</p>
    </div>
@endsection
