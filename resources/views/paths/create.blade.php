@extends('layouts.app')

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="card table-responsive">
                <div class="card-header">Add path</div>
                <div class="card-body bg-ligh">
                    {!! Form::open(['action' => 'PathController@store', 'method'=>'POST']) !!}
                    {{ Form::label('stops', 'Stops:', ['class' => 'col-form-label']) }}
                    <table class="table table-bordered table-striped" id="path_table">
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td><button type="button" name="add" id="add" class="btn btn-success">Add stop</button></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            @csrf
                            {{Form::submit('Add path', ['class'=>'btn btn-primary'])}}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
$(document).ready(function(){
    var count = 2;
    dynamic_field(count);

    function dynamic_field(number)
    {
        for (var i = 0; i < number; i++) {
            html = '<tr>';
            html += '<td class="col-10">{{Form::select('stops[]', $placeNames, "", ['class' => 'form-control'])}}</td>';
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
    }

    $(document).on('click', '#add', function(){
        count++;
        dynamic_field(1);
    });

    $(document).on('click', '.remove', function() {
        if (count > 2) {
            count--;
            $(this).closest("tr").remove();
        }
    });
});
</script>
@endsection