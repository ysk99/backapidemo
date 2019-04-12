<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use App\Movie;

class MovieController extends Controller
{
    //
    public function store(Request $request)
    {
        // return Movie::create($request->all());
        // $exceldatas = $request->input('formdata');
        // return $exceldatas;
    // }
        $formdata = $request->input('formdata');
        $movie = new Movie;
        $movie->title = $formdata['title'];
        $movie->leibie = $formdata['leibie'];
        $movie->address = $formdata['address'];
        $movie->files_address = $formdata['files_address'];
        $movie->desc = $formdata['desc'];
        $movie->save();
    }

    public function index()
    {
        return Movie::all();
    }

    public function getip(Request $request)
    {
        $request->setTrustedProxies(array('10.32.0.1/16'));
        return $request->getClientIp();
    }

    public function delete(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return $id;
    }

    public function update(Request $request)
    {
        $id = $request->input('formdata.id');
        // $id = $newdata->id;
        // $id = $request->only(['id']);
        // $id = 1;
        $movie = Movie::findOrFail($id);
        $movie->update($request->input('formdata'));

        return $movie;
    }



}
