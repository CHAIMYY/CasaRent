<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // Retrieve conversations for the current user
        $conversations = Auth::user()->conversations;

        return view('test', compact('conversations'));
    }

    public function getConversation($conversationId)
    {
        $conversation = Conversation::findOrFail($conversationId);
        $messages = $conversation->messages()->with('user')->orderBy('created_at', 'desc')->take(10)->get();
        
        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $conversationId = $request->input('conversation_id');
        $message = new Message();
        $message->conversation_id = $conversationId;
        $message->user_id = Auth::id();
        $message->content = $request->input('message');
        $message->save();
        
        return response()->json(['success' => true]);
    }
}
