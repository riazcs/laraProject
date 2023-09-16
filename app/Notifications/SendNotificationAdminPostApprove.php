<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNotificationAdminPostApprove extends Notification
{
    use Queueable;
    public $user, $postId;
    public function __construct(User $fromUser, $postId)
    {
        $this->user = $fromUser;
        $this->postId = $postId;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'postId' => $this->postId,
        ];
    }
}
