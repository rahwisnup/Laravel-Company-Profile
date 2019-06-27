<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ;
        return Product::when($request->search, function($query) use ($request) {
                return $query->where('name_portfolio', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
        })->orderBy('id','desc')->paginate(5) ;
    }

    public function store(Request $request)
    {
        if($request->get('image'))
        {
          $image = $request->get('image');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('/img/portfolio/').$name);
        }

       $input = $request->all() ;
       $input['picture'] = $name;
       $save = Product::create($input) ;

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    public function updatedata(Request $request)
    {
        $portfolio = Product::find($request->id);
        $input = $request->all() ;
        if($request->get('image'))
           {
               $image = $request->get('image');
               $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
               \Image::make($request->get('image'))->save(public_path('img/portfolio/').$name);
               $input['picture'] = $name;

              $image_path = public_path("/img/portfolio/".$portfolio->picture."");
              unlink($image_path);
          }
       $portfolio->update($input);

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    public function destroy($id)
    {
        Product::find($id)->delete() ;
        $image_path = public_path("/img/portfolio/".$_GET['picture']."");
        unlink($image_path);
        return 204 ;
    }
}
