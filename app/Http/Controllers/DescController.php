<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Description ;
class DescController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search ;
        return Description::when($request->search, function($query) use ($request) {
                return $query->where('type', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
        })->orderBy('id','desc')->paginate(10) ;
    }

    public function update(Request $request, $id)
    {
        $desc = Description::find($id) ;
        $input = $request->all() ;
        $desc->update($input) ;
        return $input ;
    }

}
