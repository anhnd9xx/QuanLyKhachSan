<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(15);
        return view('backend.categories.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        $category = new Category();
        $category->name = $request->get('name');
        $category->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $category->parent_id = $request->get('parent_id');
        $category->depth = $request->get('depth');
        $category->content = $request->get('content');
        $save = $category->save();
        if ($save) {
            $request->session()->flash('success', 'Tạo danh mục sản phẩm thành công' . '<br>');
        } else {
            $request->session()->flash('fail', 'Tạo danh mục sản phẩm thất bại' . '<br>');
        }


        return redirect()->route('backend.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::Find($id);
        return view('backend.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $name = $request->get('name');
        $slug = \Illuminate\Support\Str::slug($request->get('name'));
        $parent_id = $request->get('parent_id');
        $depth = $request->get('depth');
        $content = $request->get('content');

        $category = Category::Find($id);
        $category->name = $name;
        $category->slug = $slug;
        $category->parent_id = $parent_id;
        $category->depth = $depth;
        $category->content = $content;
        $save = $category->save();

        if ($save) {
            $request->session()->flash('success_update', 'Cập nhật danh mục sản phẩm thành công' . '<br>');
        } else {
            $request->session()->flash('fail_update', 'Cập nhật danh mục sản phẩm thất bại' . '<br>');
        }

        return redirect()->route('backend.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('backend.category.index');    }
}
