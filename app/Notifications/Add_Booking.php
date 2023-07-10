<?php

namespace App\Notifications;
use App\Models\Booking_car;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Add_Booking extends Notification
{
    use Queueable;
    private $Booking_car;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking_car $Booking_car)
    {
        $this->Booking_car = $Booking_car;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [

            //'data' => $this->details['body']سسس
            'id'=> $this->Booking_car->id,
            'title'=>'تم اضافة حجز سياره جديد بواسطة :',
            'user'=> $this->Booking_hotel->user_name,

        ];
    }
}
