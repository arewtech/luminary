<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookRentNotification extends Notification
{
    use Queueable;

    private $bookRent;
    public function __construct($bookRent)
    {
        $this->bookRent = $bookRent;
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
        $formatDate = Carbon::parse($this->bookRent->rent_date)->format('d F Y');
        return [
            'id' => $this->bookRent->id,
            // example: 'Book Rent The Hobbit'
            'title' => 'Book Rent ' . $this->bookRent->book->title,
            // example message: 'Jonh Doe Book Rent The Hobbit is 2021-08-01, please return the book before 3 days'
            'message' => ucwords(strtolower($this->bookRent->user->name)) . ' Book Rent ' . $this->bookRent->book->title . ' is ' . $formatDate . ', please return the book before 3 days',
            // example url: 'john-doe/rent-logs/1'
            'url' =>  'rent-logs/' . $this->bookRent->id,
            // example url: 'rent-logs/1'
            'status' => $this->bookRent->setStatusRentLog(),
        ];
    }
}