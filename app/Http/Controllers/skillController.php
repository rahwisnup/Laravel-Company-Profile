<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill ;

class skillController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search ;
        return Skill::when($request->search, function($query) use ($request) {
                return $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
        })->orderBy('id','desc')->paginate(5) ;
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $save = Skill::create($input);

        return $save ;
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::find($id) ;
        $input = $request->all() ;
        $skill->update($input) ;

        return $skill ;
    }

    public function destroy($id)
    {
        Skill::find($id)->delete() ;
        return 204 ;
    }
}
