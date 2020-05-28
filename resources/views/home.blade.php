@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search</div>

                <div class="card-body bg-ligh">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- Forma pretrage -->
                    <form  action="{{ route('search') }}" method="GET" enctype="multipart/form-data">
                        <fieldset>

                            <div class="form-group">
                                <label class="col-form-label" for="from">From:</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="Starting location"
                                        id="from">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="to">To:</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="Final location"
                                        id="to">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="tripDate">When:</label>
                                <div class="col-10">
                                    <input class="form-control" type="date" id="tripDate">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="numPassengers">Passengers</label>
                                <div class="col-10">
                                    <input class="form-control" type="number" id="numPassengers" value="1"> 
                                </div>
                            </div>
                            @csrf
                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
