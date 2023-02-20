<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     $certificates = Certificate::all();

    $pdf = Pdf::loadview('home', ['certificates' =>$certificates]);
    return $pdf->download('qr-code-pdf.pdf');

    //return view('home', compact('certificates'));

//return view('home');
    }
}
