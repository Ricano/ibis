<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\IbisEmail as Mailable;

class NewUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        $fname = explode(' ', $notifiable->name);
        return (new MailMessage)
            ->subject('Registo efetuado na aplicação IBIS')
            ->from('atec.ibis@gmail.com', 'IBIS')
            ->greeting('Olá ' . $fname[0] . ',')
            ->line('É com muito prazer que o recebemos na IBIS.')
            ->line('Estamos aqui para tornar toda a sua burocracia em algo muito simples e prático de realizar no seu dia a dia.')
            ->line('Clique no botão para aceder à página principal da aplicação IBIS')
            ->action('Ir para IBIS', url('/'))
            ->line('Qualquer dúvida, entre em contacto connosco.')
            ->line('Ricardo Caetano, Team Leader of Ibis Application, ricardo.caetano.t0118442@edu.atec.pt')
            ->line('Luis Ferreira, Development Team Member of Ibis Application, luis.ferreira.t0118439@edu.atec.pt')
            ->line('Daniel Guimarães, Development Team Member of Ibis Application, daniel.guimaraes.t0118432@edu.atec.pt')
            ->salutation('Cumprimentos,')
            ->salutation('IBIS Dev Team');
//                    ->markdown('emails.registers.welcome');
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
