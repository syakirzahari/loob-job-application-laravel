<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationReceived extends Notification
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
            ->subject('[Loob Recruiter] Application Received for position '.$this->application->jobPosting->title)
            ->markdown('mail.application-received', [
                'application' => $this->application,
                'content' => [
                    'header' => 'Hi, '.$this->application->applicant_name,
                    'salutation' => 'Mr / Mrs,',
                    'body' => 'Your application for position ['.$this->application->jobPosting->title.'] has been received:',
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
