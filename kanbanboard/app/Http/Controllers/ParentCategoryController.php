<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Category;
use App\ParentCategory;
use Auth;

use DB;
use PDO;


class ParentCategoryController extends Controller
{

    public function __construct()
    {
      $this->middleware('userisadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcategories = Category::orderBy('id', 'desc')->paginate(20);

        return view('admin.parentcategories.index',compact('pcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parentcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pcategory = new ParentCategory;
        $pcategory->name = $request->name;

        $pcategory->save();
        return redirect('admin/parentcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ParentCategory $parentcategory)
    {
        return view('admin.parentcategories.show', compact('parentcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentCategory $parentcategory)
    {
        return view('admin.parentcategories.edit', compact('parentcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pcategory->update($request->all());

        $pcategory->save();
       
        
        return redirect('admin/parentcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $parentcategory)
    {
        $parentcategory->delete();

        return redirect('admin/parentcategories');
    }
}
