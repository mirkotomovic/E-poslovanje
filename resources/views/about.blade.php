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
    <hr class="my-3">
    <h5 class="font-italic text-center"><span class="badge badge-secondary text-primary">We offer</span></h5>
    <hr class="my-4">
    <div class="row mb-5">
        <div class="col-4 d-flex justify-content-center">
            <div class="mb-2 w-25 h-30">
                <img class="img-thumbnail" src="{{asset('img/tickets.png')}}" alt="tickets">
                <p class="font-light text-center text-justify">@lang('messages.ticket-system')</p>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <div class="mb-2 w-25 h-30">
                <img class="img-thumbnail" src="{{asset('img/bus-time.png')}}" alt="bus-time">
                <p class="font-light text-center text-justify">@lang('messages.search-system')</p>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <div class="mb-2 w-25 h-30">
                <img class="img-thumbnail" src="{{asset('img/support.png')}}" alt="support">
                <p class="font-light text-center text-justify">@lang('messages.support-system')</p>
            </div>
        </div>
    </div>
@endsection
