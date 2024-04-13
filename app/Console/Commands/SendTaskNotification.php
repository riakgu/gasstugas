<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendTaskNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification for tasks not done before the deadline';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('status', '!=', 'DONE')
            ->whereDate('deadline', today())
            ->with('user')
            ->get();

        foreach ($tasks as $task) {
            $this->sendWhatsAppNotification($task);
        }
    }

    public function sendWhatsAppNotification($task)
    {
        $user = $task->user;

        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_TOKEN'),
        ])->post('https://api.fonnte.com/send', [
            'target' => $task->user->phone,
            'message' => "Reminder: Task '{$task->task_name}' is due tomorrow.",
            'countryCode' => '62',
        ]);

        Log::info('WhatsApp notification response: ' . $response->body());

    }
}
