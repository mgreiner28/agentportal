@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.sales.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.sales.fields.test1')</th>
                            <td>{{ $sale->test1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.sales.fields.test2')</th>
                            <td>{{ $sale->test2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.sales.fields.test3')</th>
                            <td>{{ $sale->test3 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.sales.fields.created-by')</th>
                            <td>{{ $sale->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('sales.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop