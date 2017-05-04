@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.sales.title')</h3>
    @can('sale_create')
    <p>
        <a href="{{ route('sales.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
                
        @if(!is_null(Auth::getUser()->role_id) && config('quickadmin.can_see_all_records_role_id') == Auth::getUser()->role_id)
            @if(Session::get('Sale.filter', 'all') == 'my')
                <a href="?filter=all" class="btn btn-default">Show all records</a>
            @else
                <a href="?filter=my" class="btn btn-default">Filter my records</a>
            @endif
        @endif
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($sales) > 0 ? 'datatable' : '' }} @can('sale_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('sale_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.sales.fields.test1')</th>
                        <th>@lang('quickadmin.sales.fields.test2')</th>
                        <th>@lang('quickadmin.sales.fields.test3')</th>
                        <th>@lang('quickadmin.sales.fields.created-by')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($sales) > 0)
                        @foreach ($sales as $sale)
                            <tr data-entry-id="{{ $sale->id }}">
                                @can('sale_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $sale->test1 }}</td>
                                <td>{{ $sale->test2 }}</td>
                                <td>{{ $sale->test3 }}</td>
                                <td>{{ $sale->created_by->name or '' }}</td>
                                <td>
                                    @can('sale_view')
                                    <a href="{{ route('sales.show',[$sale->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('sale_edit')
                                    <a href="{{ route('sales.edit',[$sale->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('sale_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['sales.destroy', $sale->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('sale_delete')
            window.route_mass_crud_entries_destroy = '{{ route('sales.mass_destroy') }}';
        @endcan

    </script>
@endsection