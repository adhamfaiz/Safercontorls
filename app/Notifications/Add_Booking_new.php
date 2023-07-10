<?php

namespace App\Notifications;
use App\Models\Booking_hotel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;


// طريقة التعامل مع الطلب الوارد في وحة التحكم في Laravel


class Add_Booking_new extends Notification
{
    use Queueable;
    private $Booking_hotel;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking_hotel   $Booking_hotel)
    {
        $this->Booking_hotel = $Booking_hotel;
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
            'id'=> $this->Booking_hotel->id,
            'title'=>'تم اضافة حجز جديد بواسطة :',
            'user'=> $this->Booking_hotel->username,

        ];
    }
}
