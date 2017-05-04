<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SalesController extends Controller
{
    /**
     * Display a listing of Sale.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('sale_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Sale.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Sale.filter', 'my');
            }
        }
        $sales = Sale::all();

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating new Sale.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('sale_create')) {
            return abort(401);
        }
        $relations = [
            'created_bies' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('sales.create', $relations);
    }

    /**
     * Store a newly created Sale in storage.
     *
     * @param  \App\Http\Requests\StoreSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRequest $request)
    {
        if (! Gate::allows('sale_create')) {
            return abort(401);
        }
        $sale = Sale::create($request->all());



        return redirect()->route('sales.index');
    }


    /**
     * Show the form for editing Sale.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('sale_edit')) {
            return abort(401);
        }
        $relations = [
            'created_bies' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $sale = Sale::findOrFail($id);

        return view('sales.edit', compact('sale') + $relations);
    }

    /**
     * Update Sale in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRequest $request, $id)
    {
        if (! Gate::allows('sale_edit')) {
            return abort(401);
        }
        $sale = Sale::findOrFail($id);
        $sale->update($request->all());



        return redirect()->route('sales.index');
    }


    /**
     * Display Sale.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('sale_view')) {
            return abort(401);
        }
        $relations = [
            'created_bies' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $sale = Sale::findOrFail($id);

        return view('sales.show', compact('sale') + $relations);
    }


    /**
     * Remove Sale from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('sale_delete')) {
            return abort(401);
        }
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index');
    }

    /**
     * Delete all selected Sale at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('sale_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Sale::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
