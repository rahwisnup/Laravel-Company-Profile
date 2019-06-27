<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About ;

class AboutController extends Controller
{

    public function index(Request $request  )
    {
        $search = $request->search ;
        return About::when($request->search, function($query) use ($request) {
                return $query->where('title', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
        })->orderBy('id','desc')->paginate(5) ;
    }

    public function store(Request $request)
    {
        if($request->get('image'))
        {
          $image = $request->get('image');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('/img/about/').$name);
        }

       $about = new About();
       $about->picture = $name;
       $about->title = $request->title;
       $about->icon = $request->icon;
       $about->description =  $request->description;
       $about->save();

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    public function updatedata(Request $request)
    {
        $about = About::find($request->id);
        if($request->get('image'))
           {
               $image = $request->get('image');
               $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
               \Image::make($request->get('image'))->save(public_path('/img/about/').$name);
              $picture['picture'] = $name;
              //
              $image_path = public_path("/img/about/".$about->picture."");
              unlink($image_path);
          }

       $picture['title'] = $request->title ;
       $picture['description'] = $request->description ;
       $picture['icon'] = $request->icon ;

       $about->update($picture);
       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    public function destroy($id)
    {
        About::find($id)->delete() ;
        $image_path = public_path("/img/about/".$_GET['picture']."");
        unlink($image_path);
        return 204 ;
    }
}
