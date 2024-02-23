<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Menu;
use App\Models\MenuSlugs;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    // public function dashboard()
    // {
    //     return view('admin.dashboard');
    // }

    public function create()
    {
        $menus = Menu::all();
        return view('restaurant.menu_items.create',compact('menus'));
    }

    public function store_menu_item(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'menu_id' => ['required', 'numeric'],
        ]);
        // $menu_id = $request->input('menu_id');

        $menuItem = new MenuItem();
        $menuItem->title = $request->title;
        $menuItem->description = $request->description;
        $menuItem->price = $request->price;
        $menuItem->menu_id = $request->menu_id;
        $menuItem->save();

        return redirect()->route('menu_items.create')->with('success', 'Menu Item created successfully');
    }
}
