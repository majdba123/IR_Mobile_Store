<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\messages;
use App\Notifications\MessageResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'content' => 'required',
        ]);

        $message = new messages([
            'user_id' => Auth::id(), // If user is authenticated
            'email' => $validatedData['email'],
            'content' => $validatedData['content'],
        ]);

        $message->save();

        return response()->json(['message' => 'Message sent successfully'], 200);
    }

    public function get_all_message()
    {
        $all_message = messages::all();
        return response()->json($all_message, 200);
    }

    // public function sendResponse(Request $request, $messageId)
    // {
    //     $validatedData = $request->validate([
    //         'admin_response' => 'required',
    //     ]);

    //     $message = messages::findOrFail($messageId);
    //     $message->admin_response = $validatedData['admin_response'];
    //     $message->save();

    //     // Notify the user about the response
    //     Notification::send($message->user, new MessageResponse($message));

    //     return response()->json(['message' => 'Response sent successfully'], 200);
    // }
}
