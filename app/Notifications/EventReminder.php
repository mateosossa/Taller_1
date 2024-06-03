<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventReminder extends Notification
{
    use Queueable;

    protected $eventName; // Nuevo atributo para el nombre del evento

    public function __construct($eventName)
    {
        $this->eventName = $eventName;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Recordatorio de evento')
            ->line('Recuerda que tienes un evento próximo: ' . $this->eventName);
    }
}
