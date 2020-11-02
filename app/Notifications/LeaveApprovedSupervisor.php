<?php

namespace App\Notifications;

use App\Customers\Models\Leave;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveApprovedSupervisor extends Notification implements ShouldQueue
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
            ->subject('Re: Leave application by ' . $this->leave->user->name)
            ->from($this->leave->hr->email, $this->leave->hr->name)
            ->greeting("Dear {$notifiable->first_name},")
            ->line("This is to inform you that {$this->leave->leaveType->name} application by {$this->leave->user->name} has been approved.")
            ->line("The leave is starting on {$this->leave->start->format('jS M, Y')} and will end on {$this->leave->end->format('jS M, Y')}.")
            ->action('View Details', url('user/leave/supervisor/accepted'))
            ->line('Thank you')
            ->salutation('<br>Yours,<br>' . $this->leave->hr->name);
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
