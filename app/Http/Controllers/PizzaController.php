<?php

namespace App\Http\Controllers;

use App\Models\Pizzas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PizzaController extends Controller
{

    public function apiIndex()
    {
        $pizzas = Pizzas::all();
        return response()->json($pizzas);
    }

    public function index()
    {
        $pizzas = Pizzas::all();

        return view('menu', ['pizzas' => $pizzas]);
    }

    public function apiStore(Request $request)
    {
        $pizza = new Pizzas();
        $pizza->name = $request->input('name');
        $pizza->description = $request->input('description');
        $pizza->price = $request->input('price');
        $pizza->save();

        return response()->json($pizza);
    }

    public function apiDestroy(Request $request)
    {
        // Get the pizza name from the request body
        $name = $request->input('name');

        // Find the pizza by its name
        $pizza = Pizzas::where('name', $name)->firstOrFail();

        // Delete the pizza
        $pizza->delete();

        return response()->json(['success' => true]);
    }
}
