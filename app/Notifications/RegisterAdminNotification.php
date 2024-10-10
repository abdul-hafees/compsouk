<?php

namespace App\Notifications;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterAdminNotification extends Notification
{
    use Queueable;

    private $admin;
    private $passowrd;


    public function __construct(Admin $admin, String $passowrd)
    {
        $this->admin = $admin;
        $this->passowrd = $passowrd;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Thanks for signing up')
            ->line('Email: ' . $this->admin->email)
            ->line('Password: ' . $this->passowrd);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
