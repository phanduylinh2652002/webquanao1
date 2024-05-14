<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(CategoryRequest $request){
        Category::create($request->all());
        return redirect()->route('category.index');
    }
    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }
    public function update(Category $category, CategoryRequest $request){
        $category->update($request->all());
        return redirect()->route('category.index');
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }
}
