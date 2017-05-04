<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AgentsDealsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('agents_deal_access')) {
            return abort(401);
        }
        return view('agents_deals.index');
    }
}
