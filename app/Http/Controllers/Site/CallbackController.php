<?php

namespace App\Http\Controllers\Site;

use App\Models\Common\Callback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    public function store(Request $request)
    {

        Callback::create($request->only('phone', 'name'));

        return response()->json( [
            "status" => "success", "message" => 'Заявка отправлена.'
        ] );
    }
}
