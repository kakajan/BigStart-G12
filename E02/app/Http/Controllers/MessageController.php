<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all()->sortByDesc('created_at');
        return view('contact', ['messages' => $messages]);
    }
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect('/messages#messageArea');
    }
    public function edit($id)
    {
        $message = Message::find($id);
        return view('editMessage', ['message' => $message]);
    }
    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->message = $request->message;
        $message->save();
        return redirect('/messages#messageArea');
    }
    public function store(Request $request)
    {
        $message = new Message;
        $message->email = $request->email;
        $message->mobile = $request->mobile;
        $message->fullName = $request->fullName;
        $message->message = $request->message;
        $message->save();
        // Message::insert([
        //     'email' => $request->email,
        //     'mobile' => $request->mobile,
        //     'fullName' => $request->fullName,
        //     'message' => $request->message,
        // ]);
        // DB::table('messages')->insert([
        //     'email' => $request->email,
        //     'mobile' => $request->phone,
        //     'fullName' => $request->fullName,
        //     'message' => $request->message,
        // ]);
        return redirect('/messages');
        // return
        // '<ul>' .
        // '<li>' . $request->email . '</li>' .
        // '<li>' . $request->mobile . '</li>' .
        // '<li>' . $request->fullName . '</li>' .
        // '<li>' . $request->message . '</li>' .
        //     '</ul>';
    }
}
