<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::latest()->get();
        return view('pizzas.index',['pizzas'=>$pizzas]);
    }
    public function show($id)
    {
        $pizzas = Pizza::findORFail($id);
        return view('pizzas.show',['pizzas'=>$pizzas]);
    }
    public function create()
    {
        return view('pizzas.create');
    }
    public function store()
    {
        $this->validate(request(),[
            'type'=>'required',
            'base'=>'required',
        ]);
        $pizza = new Pizza();
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->save();
        session()->flash('msg','Pizzas Added Successfully');
        return redirect('/pizzas');
    }
    public function edit($id)
    {
        $pizza = Pizza::findORFail($id);
        return view('pizzas.edit',['pizza'=>$pizza]);
    }
    public function update($id)
    {
        $this->validate(request(),[
            'type'=>'required',
            'base'=>'required',
        ]);

        $pizza = Pizza::findORFail($id);
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->save();
        return redirect('/pizzas');
    }
    public function destroy($id)
    {
        $pizza = Pizza::findORFail($id);
        $pizza->delete();
        return redirect('/pizzas');
    }
}

