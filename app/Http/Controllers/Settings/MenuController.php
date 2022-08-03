<?php

namespace App\Http\Controllers\Settings;


use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Exception;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('father',null)->with('menus')->get();
        return response()->json($menus);
    }
     

    public function store(Request $request )
    {
        try{
            $menu = Menu::create($request->post());
            return response()->json($menu);
        }catch(Exception $e){
            return response()->json([
                'messages'=>$e
            ]);
        }
    }

    public function show(Menu $menu)
    {
        return response()->json($menu);
    }
    
    public function update(Request $request, Menu $menu )
    {
        try{
            $menu->fill($request->post())->save();
            return response()->json($menu);
        }catch(Exception $e){
            return response()->json([
                'messages'=>$e
            ]);
        }
    }

    private function checkRoute($route) {
        return Route::has($route);
    }

    /* public function activate(Menu $menu, $value){
        $menu->update([
            'isActive'=>$value,
        ]);
        return redirect()->route('menus.index');

    } */

    public function destroy(Menu $menu)
    {
        try{
            $menu->delete();
            return response()->json([
                'messages'=>__('content.deleted')
            ]);
        }catch(Exception $e){
            return response()->json([
                'messages'=>$e
            ]);
        }
    }




}
