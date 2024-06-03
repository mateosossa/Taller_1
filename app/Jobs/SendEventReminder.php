<?php
namespace App\Jobs;

use App\Models\Event;
use App\Notifications\EventReminder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendEventReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $event;
    protected $email;
    protected $eventName; // Nuevo atributo para el nombre del evento

    public function __construct(Event $event, $email, $eventName)
    {
        $this->event = $event;
        $this->email = $email;
        $this->eventName = $eventName;
    }

    public function handle()
    {
        Notification::route('mail', $this->email)->notify(new EventReminder($this->eventName));
    }
}
