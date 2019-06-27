<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client ;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ;
        return Client::when($request->search, function($query) use ($request) {
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
          \Image::make($request->get('image'))->save(public_path('/img/clients/').$name);
        }

       $client = new Client();
       $client->logo = $name;
       $client->name = $request->name;
       $client->save();

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    public function updatedata(Request $request)
    {
        $client = Client::find($request->id);
        if($request->get('image'))
           {
               $image = $request->get('image');
               $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
               \Image::make($request->get('image'))->save(public_path('/img/clients/').$name);

               $input['logo'] = $name;

              $image_path = public_path("/img/clients/".$client->logo."");
              unlink($image_path);
          }


       $input['name'] = $request->name ;
       $client->update($input);

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    public function destroy($id)
    {
        Client::find($id)->delete() ;
        $image_path = public_path("/img/clients/".$_GET['picture']."");
        unlink($image_path);
        return 204 ;
    }
}
