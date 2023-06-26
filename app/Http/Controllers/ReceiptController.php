<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index(): View
    {
        return view('admin.receipt.index');
    }

    public function create(): View
    {
        return view('admin.receipt.form');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
