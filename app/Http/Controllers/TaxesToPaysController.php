<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaxesToPaysController extends Controller
{
    public function index()
    {
        if (! Gate::allows('tax_to_pay_access')) {
            return abort(401);
        }
        return view('taxes_to_pays.index');
    }
}
