<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home');
    }

}
