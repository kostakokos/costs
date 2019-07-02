<?php 

namespace App\Http\Controllers;

use App\Models\Costs;
use App\Models\TypeCosts;
use Illuminate\Http\Request;

class CostsController extends Controller
{

    public function index(Request $reqest)
    {
        return view('costs.index');
    }

    public function ajax(Request $reqest)
    {
        $count = $reqest->input('count');
        if (!is_numeric($count)) {
            $count = 10;
        }
        $costs = Costs::filters($reqest)->paginate($count);
        $type = TypeCosts::all();
        dd($costs);
        return response()->json([$type, $costs], 200);
    }

    public function delite(Request $reqest)
    {
        $row = Costs::where('id',$reqest->input('id'))->delete();
        return response()->json(compact('row'), 200);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'amount' => 'required|integer',
                'type' => 'required|integer',
            ]);
            Costs::create([
                'type_costs_id' => $request->input('type'),
                'amount' => $request->input('amount'),
                'description' => $request->input('description'),
            ]);
            return redirect('create')->with('success','Item created successfully!');;
        }

        $types = TypeCosts::all();
        return view('costs.create', compact('types'));
    }

    public function createType(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
            ]);
            TypeCosts::create([
                'name' => $request->input('name'),
            ]);
            return redirect('create-type')->with('success','Item created successfully!');;
        }
        return view('costs.create-type');
    }

}