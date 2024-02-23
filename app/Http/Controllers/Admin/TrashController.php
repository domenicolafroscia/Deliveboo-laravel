<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashController extends Controller
{
    public function index(){
        $meals = Meal::onlyTrashed()->where('restaurant_id', Auth::user()->id)->get();
        return view('admin.trash.index',compact('meals'));
    }

    public function restore($id){

        $meal = Meal::withTrashed()->find($id);
        $meal->restore();

        return redirect()->route('admin.trash.index');
    }

    public function delete($id){

        $meal = Meal::withTrashed()->find($id);
        $meal->forceDelete();

        return redirect()->route('admin.trash.index');
    }
}
