<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index(){
        $meals = Meal::onlyTrashed()->get();
        return view('admin.trash.index',compact('meals'));
    }
}
