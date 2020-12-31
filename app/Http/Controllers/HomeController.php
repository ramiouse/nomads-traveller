<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TravelPackage;

class HomeController extends Controller
{
    public function index(){

        // DATA SELECT WITH METHOD CLASS TravelPackage
        $items = TravelPackage::with(['galleries'])->get();
        return view('pages.home', [
            'items' => $items
        ]);
    }
}
