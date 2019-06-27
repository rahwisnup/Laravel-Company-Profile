<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service ;

class ServiceController extends Controller
{
    public function index(Request  $request)
    {
        $search = $request->search ;
        return Service::when($request->search, function($query) use ($request) {
                return $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
        })->orderBy('id','desc')->paginate(5) ;
    }

    public function store(Request $request)
    {
        $input = $request->all() ;
        $save = Service::create($input) ;

        return $save ;
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id) ;
        $input = $request->all() ;
        $update = $service->update($input);

        return $service ;
    }

    public function destroy($id)
    {
        Service::find($id)->delete() ;
        return 204 ;
    }
}
