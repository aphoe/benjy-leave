<?php

namespace App\Notifications;

use App\Customers\Models\Leave;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StaffLeaveRelieve extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User
     */
    private $user;
    /**
     * @var Leave
     */
    private $leave;

    /**
     * Create a new notification instance.
     *
     * @param Leave $leave
     * @param User $user
     */
    public function __construct(Leave $leave, User $user)
    {
        $this->user = $user;
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
            ->subject('Request to relieve during leave')
            ->from($this->user->email, $this->user->name)
            ->greeting("Hello {$notifiable->first_name},")
            ->line('I am requesting that you stand in for me while I am away on leave.')
            ->line("If my leave is approved, I will be starting a/an {$this->leave->leaveType->name} on {$this->leave->start->format('jS M, Y')}.")
            ->line("The leave is scheduled to end on {$this->leave->start->format('jS M, Y')}.")
            ->line('Your acceptance is the first step in the process of approval of my leave.')
            ->action('Accept to relieve me', url('user/leave/relieve'))
            ->line('Thank you in anticipation.')
            ->salutation('<br>Yours,<br>' . $this->user->official_name);
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
