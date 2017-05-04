<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PurchasesController extends Controller
{
    public function index()
    {
        if (! Gate::allows('purchase_access')) {
            return abort(401);
        }
        return view('purchases.index');
    }
}
