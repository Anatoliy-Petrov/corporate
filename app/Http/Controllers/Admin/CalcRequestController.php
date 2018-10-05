<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcRequest;
use App\Models\Common\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcRequestController extends Controller
{
    private $paginate = 20;

    public function index(Request $request)
    {
        Carbon::setLocale('ru');
        $page = $request->has('page') ? $request->page*$this->paginate-$this->paginate : 0;
        $requests = CalcRequest::paginate($this->paginate);

        return view('admin.calculator.calc_requests.index', compact('requests', 'page'));
    }

    public function show ($id)
    {
        $request = CalcRequest::with('images')->findOrFail($id);
        return view('admin.calculator.calc_requests.show', compact('request'));
    }

    public function store (Request $request)
    {
        $input = $request->only('');
    }

    public function update($id)
    {
        CalcRequest::find($id)->toggle()->save();

        return response()->json( [
            "class" => "success", "message" => 'Статус изменен.'
        ] );
    }

    public function destroyAll(Request $request)
    {
        if($request->requests && count($request->requests)){

            CalcRequest::destroy($request->requests);

            return redirect()->route('requests.index')
                ->with(['message' => 'Заявки удалены', 'class' => 'success']);
        } else {
            return back()->with(['message' => 'Не выбрано ни одной заявки', 'class' => 'warning']);
        }
    }
    public function destroy( CalcRequest $request ) {

        if ($request->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Заявка удалена'
            ] );
        }
    }
}
