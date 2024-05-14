<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Size;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
class SizeController extends Controller
{
    //
    public function index(){
        $size = Size::all();
        return view('admin.size.index', compact('size'));
    }
    public function create(){
        return view('admin.size.create');
    }
    public function store(SizeRequest $request){
        Size::create($request->all());
        return redirect()->route('size.index');
    }
    public function edit(Size $size){
        return view('admin.size.edit', compact('size'));
    }
    public function update(Size $size, SizeRequest $request){
        $size->update($request->all());
        return redirect()->route('size.index');
    }
    public function destroy(Size $size){
        $size->delete();
        return redirect()->route('size.index');
    }
}
