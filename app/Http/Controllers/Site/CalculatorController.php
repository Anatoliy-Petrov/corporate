<?php

namespace App\Http\Controllers\Site;

use App\Models\Common\Calculator\CalcCategory;
use App\Models\Common\Calculator\CalcGadget;
use App\Models\Common\Calculator\CalcHallmark;
use App\Models\Common\Calculator\CalcMaxAmount;
use App\Models\Common\Calculator\CalcPrice;
use App\Models\Common\Calculator\CalcRate;
use App\Models\Common\Calculator\CalcRequest;
use App\Models\Common\Calculator\CalcStatus;
use App\Models\Common\Calculator\CalcTariff;
use App\Models\Common\Calculator\CalcTerm;
use App\Models\Common\City;
use App\Models\Common\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {
        $hallmarks = $this->getHallmarks($request);
        $statuses = CalcStatus::all();

//        return view('site.calculator.test', compact('statuses', 'hallmarks'));
        return view('site.calculator.calculator', compact('statuses', 'hallmarks'));

//        $hallmarks = CalcHallmark::where('hallmark', 925)->pluck('calc_tariff_id');
//
//        return $hallmarks;
    }

    public function storeRequest(Request $request)
    {
        if ($request->has('files')) {
            $check = is_object($request->files);

            return response()->json([
                "message" => $check
            ], 200);
        }
        return response()->json([
            "message" => 'нет ключа файлс'
        ], 200);
//        return response()->json([
//            "message" => $request->img
//        ], 200);

//        if ($request->has('files')) {
//
//        $request->myFile->store('test');
//        return response()->json([
//            "message" => 'одну сохранил'
//        ], 200);
//            foreach ($request->img as $image) {
//                $image->store('test');
//                return response()->json([
//                    "message" => 'одну сохранил'
//                ], 200);
//            }
//        }
//        return response()->json([
//            "message" => 'проскачил'
//        ], 200);
////        dd($request->img);
////        return $request->img;
//        $input = $request->all();
//        return response()->json([
////            dd($request->img)
//
//            "message" => $input['img']
//        ], 200);
//        return $request;
        $order = new CalcRequest;
        $order->fill($request->except('files', '_token'));
//        $input = $request->except( 'img');
//        $input['hallmark'] = (int)$request->hallmark;
//        $input['amount'] = (int)$request->amount;
//        $input['overpayment'] = (int)$request->overpayment;
//        return response()->json( [
//            "message" => $input
//        ], 200 );


//        $order->fill([
//            'weight' =316> $request->weight,
//            'category' => $request->category,
//            'city' => $request->city,
//            'client_status' => $request->client_status,
//            'stone' => $request->stone,
//            'hallmark' => $request->hallmark,
//            'tariff' => $request->tariff,
//            'term' => $request->term,
//            'amount' => $request->amount,
//            'overpayment' => $request->overpayment,
//            'name' => $request->name,
//            'phone' => $request->phone,
//            'email' => $request->email,
//            'weight' => $request->input('weight'),
//            'category' => $request->input('category'),
//            'city' => $request->input('city'),
//            'client_status' => $request->input('client_status'),
//            'stone' => $request->input('stone'),
//            'hallmark' => $request->input('hallmark'),
//            'tariff' => $request->input('tariff'),
//            'term' => $request->input('term'),
//            'amount' => $request->input('amount'),
//            'overpayment' => $request->input('overpayment'),
//            'name' => $request->input('name'),
//            'phone' => $request->input('phone'),
////            'email' => $request->email,
//            'email' => $request->input('email'),
//            'weight' => $request->input('weight'),
//            'category' => $request->category,
//            'city' => $request->input('city'),
//            'client_status' => $request->input('client_status'),
//            'stone' => $request->input('stone'),
//            'hallmark' => $request->input('hallmark'),
//            'tariff' => $request->input('tariff'),
//            'term' => $request->input('term'),
//            'amount' => $request->input('amount'),
//            'overpayment' => $request->input('overpayment'),
//            'name' => $request->input('name'),
//            'phone' => 656565,
////            'email' => $request->email,
//            'email' => $request->input('email'),
//        ]);


//        return response()->json([
//            "message" => 'проскачили'
//        ], 200);

        if ($order->save()) {
            if ($request->has('files')) {

                return response()->json([
                    "message" => $request->files
                ], 200);
                foreach ($request->files as $image) {
                    return response()->json([
                        "message" => 'мы в цикле'
                    ], 200);
                    // создали картинку, запись на диск, возвращает filename.jpeg
//                    $imagePath = storage_path($image);
                    $imageName = $order->saveRequestImage($image, 'request', 900);
                    return response()->json([
                        "message" => 'storage exists false'
                    ], 200);
                    // создали запись в таблице images
                    $order->addImage($imageName);
                }
            }
            return response()->json([
                "message" => 'Заявка оформлена'
            ], 200);
        }
    }

    public function storeTempImage(Request $request)
    {
//        return response()->json([
//            "message" => 'мы тут'
//        ]);
        if ($request->has('img')){

//            return response()->json([
//                "message" => $request->img
//            ], 200);
            $names = [];
            foreach ($request->img as $image){
                $names[] = $image->store('temp');
//                return response()->json([
//                    "message" => $names
//                ], 200);
            }
//            $name = $request->img->store('temp');
            return response()->json([
                "names" => $names
            ], 200);
        } else {
            return response()->json([
                "message" => 'что-то пошло не так'
            ]);
        }
    }

    public function storeGadgetRequest(Request $request)
    {

        if ($request->has('img')){
            $name = $request->image->store('temp');
            return response()->json([
                "message" => $name
            ], 200);
        } else {
            return response()->json([
                "message" => 'что-то пошло не так'
            ]);
        }
//        dd($request);
//        return $request;
        return response()->json( [
            "message" => $request->img
        ], 200 );
        return $request;
//        $order = new CalcRequest;
        $order->fill($request->except('img', '_token'));
//        $input = $request->except( 'img');
//        $input['hallmark'] = (int)$request->hallmark;
//        $input['amount'] = (int)$request->amount;
//        $input['overpayment'] = (int)$request->overpayment;
//        return response()->json( [
//            "message" => $input
//        ], 200 );


//        $order->fill([
//            'weight' =316> $request->weight,
//            'category' => $request->category,
//            'city' => $request->city,
//            'client_status' => $request->client_status,
//            'stone' => $request->stone,
//            'hallmark' => $request->hallmark,
//            'tariff' => $request->tariff,
//            'term' => $request->term,
//            'amount' => $request->amount,
//            'overpayment' => $request->overpayment,
//            'name' => $request->name,
//            'phone' => $request->phone,
//            'email' => $request->email,
//            'weight' => $request->input('weight'),
//            'category' => $request->input('category'),
//            'city' => $request->input('city'),
//            'client_status' => $request->input('client_status'),
//            'stone' => $request->input('stone'),
//            'hallmark' => $request->input('hallmark'),
//            'tariff' => $request->input('tariff'),
//            'term' => $request->input('term'),
//            'amount' => $request->input('amount'),
//            'overpayment' => $request->input('overpayment'),
//            'name' => $request->input('name'),
//            'phone' => $request->input('phone'),
////            'email' => $request->email,
//            'email' => $request->input('email'),
//            'weight' => $request->input('weight'),
//            'category' => $request->category,
//            'city' => $request->input('city'),
//            'client_status' => $request->input('client_status'),
//            'stone' => $request->input('stone'),
//            'hallmark' => $request->input('hallmark'),
//            'tariff' => $request->input('tariff'),
//            'term' => $request->input('term'),
//            'amount' => $request->input('amount'),
//            'overpayment' => $request->input('overpayment'),
//            'name' => $request->input('name'),
//            'phone' => 656565,
////            'email' => $request->email,
//            'email' => $request->input('email'),
//        ]);

        if ($order->save()){
            if ($request->has('img')){
                foreach ($request->img as $image){
                    // создали картинку, запись на диск, возвращает filename.jpeg
                    $imageName = $order->saveRequestImage($image, 'request', 900);
                    // создали запись в таблице images
                    $order->addImage($imageName);
                }
            }
            return response()->json( [
                "message" => 'Заявка оформлена'
            ], 200 );
        }
    }

    public function getCategories()
    {
        return CalcCategory::all();
    }

    public function getHallmarks(Request $request)
    {
        if ($request->has('category')){
            return CalcHallmark::where('calc_category_id', $request->category)->distinct()->get(['hallmark']);
        }
        return CalcHallmark::where('calc_category_id', 1)->distinct()->get(['hallmark']);
    }

    public function getTariffs(Request $request)
    {
        if ($request->has('hallmark')){
            $tariffIds = CalcHallmark::where('hallmark', $request->hallmark)->pluck('calc_tariff_id');
            $tariffs = CalcTariff::whereIn('id', $tariffIds)->get();

//            return response()->json( [
//                "tariffs" => $tariffs, "message" => 'Вот вам тарифы'
//            ] );
            return $tariffs;
        }
//        return CalcHallmark::where('calc_category_id', 1)->distinct()->get(['hallmark']);
    }

    public function getBrands()
    {
        $brands = CalcGadget::where('category', 'Ноутбуки, компьютеры, планшеты')
        ->orWhere('category', 'Смартфоны и телефоны')
        ->distinct()->pluck('brand');

        return response()->json( [
            "brands" => $brands, "message" => 'Вот вам бренды'
        ], 200 );
    }

    public function getModels(Request $request)
    {
        if ($request->has('brand')){
            $models = CalcGadget::where('brand', $request->brand)->get();
            return response()->json( [
                "models" => $models, "message" => 'Вот вам модели'
            ], 200 );
        }
        return response()->json( [
            "models" => [], "message" => 'Нет моделей по этому бренду'
        ], 200 );
    }

    public function calculate(Request $request)
    {
        $msg = [
            'days.required' => 'нужно дни ввести, обязательно',
            'weight.required' => 'нужно указать вес',
            'weight.integer' => 'должно быть число',
            'hallmark.required' => 'нужно указать пробу',
            'tariff.required' => 'нужно указать тариф',
            'hallmark.exists' => 'нет такой пробы',
            'tariff.exists' => 'нет такого тарифа',
            'status.required' => 'выберите статус пож-та',
            'status.exists' => 'нет такого статуса',
        ];
        $validator = \Validator::make($request->all(), [
            'weight'=>'required|integer',
            'hallmark'=> 'required|exists:calc_hallmarks,hallmark',
            'tariff' => 'required|exists:calc_tariffs,id',
            'status' => 'required|exists:calc_statuses,id',
            'days' => 'required'
        ], $msg);

//        $request->validate([
//            'weight'=>'required',
//            'hallmark'=> 'required|exists:calc_hallmarks,hallmark',
//            'tariff' => 'required|exists:calc_tariffs,id',
//            'status' => 'required|exists:calc_statuses,id',
//            'days' => 'required'
//        ]);
        if ($validator->fails())
        {
            return response($validator->errors(), 400);
        }

        $weight = (int)$request->weight;
        $hallmark = CalcHallmark::whereHallmark($request->hallmark)
            ->where('calc_tariff_id', $request->tariff)
            ->first();

        $tariff = CalcTariff::find($request->tariff);
        $status = CalcStatus::find($request->status);
        $days = (int)$request->days;

        //  получаем срок кредитования
        $term = CalcTerm::where('calc_tariff_id', $tariff->id)
            ->where('from', '<=', 15)
            ->where('to', '>=', 15)
            ->first();

        // получаем цену за грамм металла
        $price = CalcPrice::where('calc_tariff_id', $tariff->id)
            ->where('calc_status_id', $status->id)
            ->where('calc_hallmark_id', $hallmark->id)
            ->first();

        // предварительная стоимость изделия
        $amount = $weight * $price->value;

        // выбираем параметр максимальна сумма ( до 6000 например)
        $maxAmountsValues = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->where('value', '>=', $amount)->pluck('value')->toArray();

        if (count($maxAmountsValues)){
            $maxAmount = min($maxAmountsValues);
            $maxAmount = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->where('value', $maxAmount)->first();
        } else {
            $maxAmount = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->first();
        }

        // получаем ставку по кредиту
        $rate = CalcRate::where('calc_tariff_id', $tariff->id)
            ->where('calc_status_id', $status->id)
            ->where('calc_max_amount_id', $maxAmount->id)
            ->where('calc_term_id', $term->id)
            ->first();

        // расчитываем переплату

        $overPayment = $amount * ($rate->value)/100 * $days;

        return response()->json( [
            "amount" => $amount, "overPayment" => $overPayment, "message" => 'Посчитал'
        ], 200 );
    }


    public function calculate2(Request $request)
    {
        $input = $request->all();
        $weight = $request->weight;
        $hallmark = CalcHallmark::find($request->hallmark);
        $diamonds = $request->diamonds;
        $tariff = CalcTariff::find($request->tariff);
        $status = CalcStatus::find($request->status);
        $days = $request->term;

        //  получаем срок кредитования
        $term = CalcTerm::where('calc_tariff_id', $tariff->id)
            ->where('from', '<=', $request->term)
            ->where('to', '>=', $request->term)
            ->first();

        // получаем цену за грамм металла
        $price = CalcPrice::where('calc_tariff_id', $tariff->id)
            ->where('calc_status_id', $status->id)
            ->where('calc_hallmark_id', $hallmark->id)
            ->first();

        // предварительная стоимость изделия
        $metalAmount = $weight * $price->value;

        // выбираем параметр максимальна сумма ( до 6000 например)
        $maxAmountsValues = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->where('value', '>=', $metalAmount)->pluck('value');
        if (count($maxAmountsValues)){
            $maxAmount = min($maxAmountsValues);
            $maxAmount = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->where('value', $maxAmount)->first();
        } else {
            $maxAmount = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->first();
        }


        // получаем ставку по кредиту
        $rate = CalcRate::where('calc_tariff_id', $tariff->id)
            ->where('calc_status_id', $status->id)
            ->where('calc_max_amount_id', $maxAmount->id)
            ->where('calc_term_id', $term->id)
            ->first();

        // расчитываем переплату
        $overPayment = $metalAmount * ($rate->value)/100 * $days;
    }

    public function getCities()
    {
        return City::all();
    }

    public function getDepartments($id)
    {
        return City::findOrFail($id)->departments;
    }
}