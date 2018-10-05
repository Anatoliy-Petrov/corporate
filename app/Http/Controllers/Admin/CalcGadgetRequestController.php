<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcGadgetRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcGadgetRequestController extends Controller
{
    private $paginate = 20;

    public function index(Request $request)
    {
        Carbon::setLocale('ru');
        $page = $request->has('page') ? $request->page*$this->paginate-$this->paginate : 0;
        $requests = CalcGadgetRequest::paginate($this->paginate);

        return view('admin.calculator.calc_gadget_requests.index', compact('requests', 'page'));
    }

    public function store (Request $request)
    {
        $input = $request->only('');
    }
}
