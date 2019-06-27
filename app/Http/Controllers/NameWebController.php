<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebName ;

class NameWebController extends Controller
{

    public function index()
    {
        return WebName::first() ;
    }

    public function updatedata(Request $request)
    {
        $webname = WebName::find($request->id) ;
        $input = $request->all() ;
        if($request->get('image'))
           {
               $image = $request->get('image');
               $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
               \Image::make($request->get('image'))->save(public_path('/img/web/').$name);

               $input['logo'] = $name;

              $image_path = public_path("/img/web/".$webname->logo."");
              unlink($image_path);
          }

          $webname->update($input);

          echo "sukses save" ;

    }

}
