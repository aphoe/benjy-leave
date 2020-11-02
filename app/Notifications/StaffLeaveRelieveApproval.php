<?php

namespace App\Notifications;

use App\Customers\Models\Leave;
use App\Customers\Models\User;
use App\Enums\LeaveStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StaffLeaveRelieveApproval extends Notification
{
    use Queueable;

    /**
     * @var Leave
     */
    private $leave;
    /**
     * @var User
     */
    private $reliever;

    /**
     * Create a new notification instance.
     *
     * @param Leave $leave
     * @param User $reliever
     */
    public function __construct(Leave $leave, User $reliever)
    {
        $this->leave = $leave;
        $this->reliever = $reliever;
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
            ->subject('Re: Request to relieve during leave')
            ->from($this->reliever->email, $this->reliever->name)
            ->greeting("Dear {$notifiable->first_name},")
            ->line('This is to inform you that I have set the reliever approval of ' . $this->leave->tag  . ' to ' . LeaveStatus::getDescription($this->leave->reliever_status) . '.')
            ->line('Thank you.')
            ->salutation('<br>Yours,<br>' . $this->reliever->official_name);
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
