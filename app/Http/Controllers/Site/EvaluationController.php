<?php

namespace App\Http\Controllers\Site;

use App\Models\Common\Evaluation;
use App\Models\Common\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluationController extends Controller
{
    public function store(Office $office, $mark)
    {
//        $this->validate(request(),['comment' => 'required']);

        $evaluation = $office->evaluate([
            'mark' => $mark
        ]);
        return view('site.evaluations.edit', compact('evaluation'));

    }

    public function update(Evaluation $evaluation, Request $request)
    {
        if ($request->has('comment')){
            $evaluation->update([
                'comment' => $request->comment
            ]);
        }
        return 'Коммент добавлен';
    }
}
