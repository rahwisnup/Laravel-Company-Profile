<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message ;
use App\WebName ;
use Mail ;
class MessageController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search ;
        return Message::when($request->search, function($query) use ($request) {
                return $query->where('subject', 'like', '%'.$request->search.'%')
                    ->orWhere('message', 'like', '%'.$request->search.'%')
                    ->orWhere('name', 'like', '%'.$request->search.'%')
                    ->orWhere('email', 'like', '%'.$request->search.'%');
        })->orderBy('id','desc')->paginate(10) ;
    }

    public function store(Request $request)
    {
        $email_admin = WebName::find(1);
        $date = date('ymd:hi') ;
        $save = Message::create($request->all()) ;
        $email = Mail::send('email', ['nama' => $save->name, 'subject' => $save->subject ], function ($message) use ($save, $date)
                {
                    $message->subject("Contact Support PT. Lamjaya Global Solusi");
                    $message->from("info@lamsolusi.com", "Email No Repeat ($save->name) - $date");
                    $message->to("$save->email");
                });
        $email_admin = Mail::send('email_admin', ['nama' => $save->name , 'email' => $save->email, 'subject' => $save->subject, 'pesan' => $save->message ], function ($message) use ($email_admin, $date)
                {
                    $message->subject("Contact Support PT. Lamjaya Global Solusi");
                    $message->from("info@lamsolusi.com", "Email No Repeat $date");
                    $message->to("$email_admin->email");
                });
        return response()->json($save);
    }

    public function show($id)
    {
        $result = Message::where('status', 1)->count() ;
        return response()->json($result);
    }

    public function read($id){

        $message = Message::find($id);
        $data['status'] = '0' ;
        $message->update($data) ;
        return $message;
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $message = Message::find($id) ;
        $message->delete() ;

        return 202 ;
    }

    public function delleteAll(Request $request)
    {
       $message = Message::whereIn('id', $request->id )->delete();
       return 202 ;
    }
}
