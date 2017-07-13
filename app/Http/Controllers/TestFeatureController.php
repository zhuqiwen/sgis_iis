<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestFeatureController extends Controller
{
    public function cssBlade()
    {
        return view('test.test_css_blade');
    }
}
