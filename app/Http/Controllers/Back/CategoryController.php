<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.category.index',[
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'active' => 'required|in:yes,no'
        ]);

        $data['seotitle'] = Str::slug($data['title']);

        Category::create($data);

        return back()->with('success', 'Categories has been created');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'active' => 'required|in:yes,no'
        ]);

        $data['seotitle'] = Str::slug($data['title']);

        Category::find($id)->update($data);

        return back()->with('success', 'Categories has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();

        return back()->with('success', 'Categories has been deleted');
    }
}
