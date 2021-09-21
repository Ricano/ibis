<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMeetingNotification extends Notification
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
            ->subject('Nova reunião criada')
            ->from('atec.ibis@gmail.com', 'IBIS')
            ->greeting('Olá ' .$fname[0].',')
            ->line('Foi criada uma reunião na turma '.$turma.' com termino a '.$this->meeting->end.'.')
            ->line('Clique no botão para aceder à aplicação IBIS.')
            ->action('IBIS', url('/'))
            ->line('Qualquer dúvida, entre em contacto connosco.')
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
