<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActualReturnNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $actualReturnDate;
    public function __construct($actualReturnDate)
    {
        $this->actualReturnDate = $actualReturnDate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $formatDate = Carbon::parse($this->actualReturnDate->actual_return_date)->format('d F, Y');
        return [
            'rentlog_id' => $this->actualReturnDate->id,
            // example: 'Actual Return Date John Doe'
            'title' => 'Actual Return ' . $this->actualReturnDate->book->title,
            // example message: 'Actual Return Date John Doe is 2021-08-01 which is late'
            'message' => 'Actual Return Date ' . $this->actualReturnDate->user->name . ' is ' . $formatDate . ' which is ' . $this->actualReturnDate->setStatusRentLog(),
            // example url: 'john-doe/rent-logs/1'
            'url' =>  'rent-logs/' . $this->actualReturnDate->id,
            // example url: 'rent-logs/1'
            'status' => $this->actualReturnDate->setStatusRentLog(),
        ];
    }
}
