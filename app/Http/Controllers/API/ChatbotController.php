<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chatbot(Request $request)
    {
        $message = $request->input('message');

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY')
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $message
                    ],
                ],
                'temperature' => 0,
                'max_tokens' => 1000,
                'top_p' => 1.0,
                'frequency_penalty' => 0.52,
                'presence_penalty' => 0.5,
                'stop' => ['11.']
            ])->json();

            return response()->json([
                'message' => $response['choices'][0]['message']['content']
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
