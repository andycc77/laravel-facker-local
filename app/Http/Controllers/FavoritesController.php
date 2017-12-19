<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * FavoritesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        dd(\Auth::user()->favorites());
    }

    public function store(Request $request)
    {
        \Auth::user()->favorites()->attach($request->get('lesson_id'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->favorites()->detach($id);
        return redirect()->back();
    }
}
