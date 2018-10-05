<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcGadget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class CalcGadgetController extends Controller
{
    private $paginate = 20;

    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->page*$this->paginate-$this->paginate : 0;

        if ($request->has('q') and count($request->q)){
            $input = $request->input();
            $gadgets = CalcGadget::where('model', 'like', "%{$request->q}%")
                ->orWhere('brand', 'like', "%{$request->q}%")
                ->paginate($this->paginate)
                ->appends($input);
        } else {
            $gadgets = CalcGadget::latest()->paginate($this->paginate);
        }
        return view('admin.calculator.calc_gadgets.index', compact('gadgets', 'page'));
    }

    public function show(CalcGadget $gadget)
    {
        return view('admin.calculator.calc_gadgets.show', compact('gadget'));
    }

    public function showParser()
    {
        return view('admin.calculator.calc_gadgets.gadgets_parser');
    }

    public function parse(Request $request)
    {
        if ($request->has('gadgets')){

            $file = $request->gadgets;

            $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$file->getClientOriginalExtension();

            $path = 'public/uploads/';

            Storage::putFileAs($path, $file, $file_name);

            $xml = XmlParser::load(asset('storage/uploads/'.$file_name));

            $gadgets = $xml->parse([
                ['uses' => 'Commodity[TypeNomenklatura,Brand,Nomenklatura,Image,Price,Description]'],
            ]);

            foreach ($gadgets[0] as $gadget){

                CalcGadget::create([
                    'category' => $gadget['TypeNomenklatura'],
                    'brand' => $gadget['Brand'],
                    'model' => $gadget['Nomenklatura'],
                    'image' => $gadget['Image'],
                    'price' => $gadget['Price'],
                    'description' => $gadget['Description'],
                ]);
            }
        }
        return redirect()->route('gadgets.index')->with(['message' => 'Вроде получилось', 'class' => 'success']);

    }
}
