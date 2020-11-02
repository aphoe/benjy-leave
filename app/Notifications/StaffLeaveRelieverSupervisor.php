<?php

namespace App\Notifications;

use App\Customers\Models\Leave;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StaffLeaveRelieverSupervisor extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Leave
     */
    private $leave;

    /**
     * Create a new notification instance.
     *
     * @param Leave $leave
     */
    public function __construct(Leave $leave)
    {
        $this->leave = $leave;
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
        return (new MailMessage)
            ->subject('Leave reliever duty accepted')
            ->from($this->leave->reliever->email, $this->leave->reliever->name)
            ->greeting("Dear {$notifiable->first_name},")
            ->line("I am using this medium to bring to your notice that I have accepted to stand in for {$this->leave->user->name} while he/she is on {$this->leave->leaveType->name}.")
            ->line("I will be fully on ground to take deputise him/her when leave starts on {$this->leave->start->format('j M, Y')}.")
            ->line('Thank you.')
            ->salutation('<br>Yours,<br>' . $this->leave->reliever->official_name);
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
