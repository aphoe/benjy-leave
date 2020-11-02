<?php

namespace App\Notifications;

use App\Customers\Models\LeaveNote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StaffLeaveHandoverNote extends Notification
{
    use Queueable;

    /**
     * @var LeaveNote
     */
    private $note;

    /**
     * Create a new notification instance.
     *
     * @param LeaveNote $note
     */
    public function __construct(LeaveNote $note)
    {
        $this->note = $note;
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
            ->subject('Handover note for ' . $this->note->leave->tag)
            ->from($this->note->leave->user->email, $this->note->leave->user->name)
            ->greeting("Hello {$notifiable->first_name},")
            ->line('I have uploaded the handover note for ' . $this->note->leave->tag . '.')
            ->line('Please go through and acknowledge at your convenience.')
            ->action('View handover note', url('user/leave/' . hashEncode($this->note->leave->id) . '/note'))
            ->line('Thank you in anticipation.')
            ->salutation('<br>Yours,<br>' . $this->note->leave->official_name);
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
