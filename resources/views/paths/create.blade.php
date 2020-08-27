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
            <div class="table-responsive">
                {!! Form::open(['action' => 'PathController@store', 'method'=>'POST']) !!}
                <table class="table table-bordered table-striped" id="path_table">
                    <thead>
                        <tr>
                            <th width="70%">Stop name</th>
                            <th width="30%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add stop</button></td>
                            <td>
                                @csrf
                                {{Form::submit('Add path', ['class'=>'btn btn-primary'])}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
$(document).ready(function(){
    var count = 1;
    dynamic_field(count);
    dynamic_field(++count)

    function dynamic_field(number)
    {
        html = '<tr>';
        html += '<td>{{Form::select('stops[]', $placeNames, "", ['class' => 'form-control'])}}</td>';
        html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
        $('tbody').append(html);
    }

    $(document).on('click', '#add', function(){
        dynamic_field(++count);
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