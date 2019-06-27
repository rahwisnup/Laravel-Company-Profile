<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team ;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ;
        return Team::when($request->search, function($query) use ($request) {
                return $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('position', 'like', '%'.$request->search.'%');
        })->orderBy('id','desc')->paginate(5) ;
    }

    public function store(Request $request)
    {
        if($request->get('image'))
        {
          $image = $request->get('image');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('/img/team/').$name);
        }

       $team = new Team();
       $team->picture = $name;
       $team->position = $request->position;
       $team->name = $request->name;
       $team->save();

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    public function updatedata(Request $request)
    {
        $team = Team::find($request->id);
        if($request->get('image'))
           {
               $image = $request->get('image');
               $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
               \Image::make($request->get('image'))->save(public_path('/img/team/').$name);

               $input['picture'] = $name;

              $image_path = public_path("/img/team/".$team->picture."");
              unlink($image_path);
          }


       $input['name'] = $request->name ;
       $input['position'] = $request->position ;
       $team->update($input);

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    public function destroy($id)
    {
        Team::find($id)->delete() ;
        $image_path = public_path("/img/team/".$_GET['picture']."");
        unlink($image_path);
        return 204 ;
    }
}
