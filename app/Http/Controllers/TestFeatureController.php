<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestFeatureController extends Controller
{
    public function cssBlade()
    {
        return view('test.test_css_blade');
    }

    public function pdf()
    {
	    $data = [];
	    $pdf = App::make('dompdf.wrapper');
	    $pdf->loadView('test.test_a_pdf_view', $data);
	    return $pdf->download('my_application.pdf');
    }
}
