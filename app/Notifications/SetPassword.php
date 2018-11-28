<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SetPassword extends Notification
{
    use Queueable;

    public $token;
    public $role;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $role)
    {
        $this->token = $token;
        $this->role = $role;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line(
                'You are receiving this email because you have been added as a ' .
                    $this->role->name .
                    ' you need to set a password for your account'
            )
            ->action(
                'Set Password',
                url(
                    config('app.url') .
                        route('password.reset', $this->token, false)
                )
            )
            ->line(
                'If you did not request a password reset, no further action is required.'
            );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
                //
            ];
    }
}
