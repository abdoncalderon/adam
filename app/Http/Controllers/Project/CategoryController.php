<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use App\Imports\CategoriesImport;
use App\Http\Requests\Project\StoreCategoryRequest;
use App\Http\Requests\Project\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('categories.*')
                                    ->join('families','categories.family_id','=','families.id')
                                    ->where('families.project_id',session('current_project_id'))
                                    ->get();
        return view('project.categories.index', compact('categories'));
    }

    public function create()
    {
        if(current_user()->project->families->count()>0){
            $families = Family::select('families.*')
                                ->leftJoin('categories','families.id','=','categories.family_id')
                                ->where('project_id',session('current_project_id'))
                                ->whereNull('family_id')
                                ->get();
        }else{
            $families = Family::where('project_id',session('current_project_id'))
                                ->get();
        }
        return view('project.categories.create')
        ->with('families',$families);
    }

    public function store(StoreCategoryRequest $request )
    {
        try{
            Category::create($request ->validated());
            return redirect()->route('categories.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Category $category)
    {
        return view('project.categories.show',[
            'category'=>$category
            ]);
    }

    public function edit(Category $category)
    {
        $families = Family::where('project_id',session('current_project_id'))->get();
        return view('project.categories.edit',[
            'category'=>$category
            ])->with('families',$families);
    }
    
    public function update(Category $category, UpdateCategoryRequest $request)
    {
        try{
            $category->update($request->validated());
            return redirect()->route('categories.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return redirect()->route('categories.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new CategoriesImport,$file);
                return back();
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function add(StoreCategoryRequest $request )
    {
        try{
            Category::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function getSubcategories(Request $request, $id)
    {
        if($request->ajax())
        {
            $subcategories = Subcategory::where('category_id',$id)->get();
            return response()->json($subcategories);
        }
    }
}
