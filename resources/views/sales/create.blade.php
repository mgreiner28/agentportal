@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.sales.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['sales.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('test1', 'Test1', ['class' => 'control-label']) !!}
                    {!! Form::text('test1', old('test1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('test1'))
                        <p class="help-block">
                            {{ $errors->first('test1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('test2', 'Test2', ['class' => 'control-label']) !!}
                    {!! Form::text('test2', old('test2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('test2'))
                        <p class="help-block">
                            {{ $errors->first('test2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('test3', 'Test3', ['class' => 'control-label']) !!}
                    {!! Form::text('test3', old('test3'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('test3'))
                        <p class="help-block">
                            {{ $errors->first('test3') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

