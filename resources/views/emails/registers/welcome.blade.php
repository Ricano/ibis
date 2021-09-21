@component('mail::panel')
    Isto é o Painel
@endcomponent

@component('mail::message')
    # Bem Vindo à aplicação IBIS

    Vai ser muito feliz aqui!!!


    Obrigado por fazer parte desta família,
    {{ config('app.name') }}
@endcomponent


@component('mail::button', ['url' => '', 'color' => 'primary'])
    Página principal da aplicação
@endcomponent
