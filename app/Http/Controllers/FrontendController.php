<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $info = BasicInfo::first();
        return view('frontend.index', compact('info'));
    }
}
