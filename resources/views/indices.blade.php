@extends('master')

@section('content')
    @if($errors -> any())
        @foreach($errors -> all() as $error)
            <ul>
                <li>{{$error}}</li>
            </ul>
        @endforeach
    @endif
    {!! Form::open() !!}
        <h1>Articles</h1>
        <div class="form-group">
            {!! Form:: label('name', 'Name: ') !!}
            {!! Form:: text('name',null, ['class' => 'form-control','placeholder' => 'Write ur name']) !!} <br><br>
        </div>

        <div class="form-group">
            {!! Form:: label('body','Body: ') !!}<br>
            {!! Form:: textarea('body', null) !!} <br><br>
        </div>

        <div class="form-group">
            {!! Form:: submit('Add') !!}
        </div>
    {!! Form::close() !!}

@stop

