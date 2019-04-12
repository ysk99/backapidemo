<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eotime;

class EotimeController extends Controller
{
    //
    public function index()
    {
        return Eotime::all();
        // return $request->all();
    }

}
