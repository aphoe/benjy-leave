<?php

namespace App\Notifications;

use App\Customers\Models\Leave;
use App\Enums\LeaveStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveApproval extends Notification implements ShouldQueue
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
        $mail = (new MailMessage)
            ->subject('Re: ' . $this->leave->tag)
            ->from($this->leave->hr->email, $this->leave->hr->name)
            ->greeting("Dear {$notifiable->first_name},");

        if($this->leave->status === LeaveStatus::Approved){
            $mail->line('This is to inform you that ' . $this->leave->leaveType->name . ' has been approved.')
                ->line("The leave is starting on {$this->leave->start->format('jS M, Y')} and will end on {$this->leave->end->format('jS M, Y')}.");
        }else{
            $mail->line('This is to inform you that ' . $this->leave->leaveType->name . ' was declined.')
                ->line('You can get in touch with the HR unit for more information.');
        }
        $mail->line('Thank you')
            ->salutation('<br>Yours,<br>' . $this->leave->hr->name);

        return $mail;
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
