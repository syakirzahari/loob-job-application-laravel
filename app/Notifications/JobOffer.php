<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobOffer extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('[Loob Recruiter] Job Offer for position '.$this->application->jobPosting->title)
            ->markdown('mail.job-offer', [
                'application' => $this->application,
                'content' => [
                    'header' => 'Hi, '.$this->application->applicant_name,
                    'salutation' => 'Mr / Mrs,',
                    'body' => 'Congratulations! We are pleased to offer you the position of '.$this->application->jobPosting->title.' at Loob Holdings:',
                    'thanks' => 'Thank You',
                ],
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
