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
            ]);

            if ($response->successful()) {
                return response()->json([
                    'status' => 'success',
                    'message' => $response->json()['choices'][0]['message']['content'],
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $response->json()['error']['message'],
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while communicating with the chatbot API.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
