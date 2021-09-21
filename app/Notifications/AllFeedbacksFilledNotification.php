<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AllFeedbacksFilledNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($meeting)
    {
        $this->meeting = $meeting;
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
        $turma = $this->meeting->students[0]->group->group_code;

        $fname = explode(' ', $notifiable->name);
        return (new MailMessage)
            ->subject('Feedbacks preenchidos')
            ->from('atec.ibis@gmail.com', 'IBIS')
            ->greeting('Olá ' .$fname[0].',')
            ->line('Os feedbacks da reunião com ID '. $this->meeting->id . ' da  turma '.$turma. ' com data iniciada a ' . $this->meeting->start.' e com data de fim a ' . $this->meeting->end .', foram todos preenchidos pelos respetivos formadores.')
            ->line('Clique no botão para aceder à aplicação IBIS.')
            ->action('IBIS', url('/'))
            ->salutation('Cumprimentos,');
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
