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
        $tasks = Task::whereNot('status', 'DONE')
            ->whereDate('deadline', today())
            ->get();

        foreach ($tasks as $task) {
            $this->sendWhatsAppNotification($task);
        }
    }

    public function sendWhatsAppNotification($task)
    {
        $user = $task->user;

        $message = "Halo {$user->name},\n\n"
            . "Kami ingin memberitahu bahwa tugas berikut belum selesai dan mendekati batas waktu:\n\n"
            . "Nama Tugas: {$task->task_name}\n"
            . "Deskripsi: {$task->description}\n"
            . "Batas Waktu: {$task->deadline}\n\n"
            . "Terima kasih atas perhatian dan kerja keras Anda.\n\n"
            . "Salam,\n"
            . "GasstuGas";

        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_TOKEN'),
        ])->post('https://api.fonnte.com/send', [
            'target' => $task->user->phone,
            'message' => $message,
            'countryCode' => '62',
        ]);

        Log::info('WhatsApp notification response: ' . $response->body());

    }
}
