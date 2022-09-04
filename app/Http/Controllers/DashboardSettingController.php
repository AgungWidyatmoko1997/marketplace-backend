<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();

        return view('pages.dashboard-settings', [
            'user' => $user,
            'categories' => $categories
        ]);
    }

    public function account()
    {
        $user = Auth::user();

        return view('pages.dashboard-account', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect) 
    {
        $item = Auth::user();

        $item->update([
            'store_name' => $request->store_name,
            'categories_id' => $request->categories_id,
            'store_status' => $request->store_status
        ]);

        return redirect()->route($redirect);
    }
}
