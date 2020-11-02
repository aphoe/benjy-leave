<?php

namespace App\Notifications;

use App\Customers\Models\Leave;
use App\Customers\Models\User;
use App\Enums\LeaveStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StaffLeaveSupervisorApproval extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Leave
     */
    private $leave;
    /**
     * @var User
     */
    private $supervisor;

    /**
     * Create a new notification instance.
     *
     * @param Leave $leave
     * @param User $supervisor
     */
    public function __construct(Leave $leave, User $supervisor)
    {
        $this->leave = $leave;
        $this->supervisor = $supervisor;
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
            ->subject('Re: Leave Application')
            ->from($this->supervisor->email, $this->supervisor->name)
            ->greeting("Dear {$notifiable->first_name},")
            ->line('This is to inform you that I have set ' . $this->leave->tag  . ' application to ' . LeaveStatus::getDescription($this->leave->supervisor_status) . '.')
            ->line('Thank you.')
            ->salutation('<br>Yours,<br>' . $this->supervisor->official_name);
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
