<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Chat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/chat.css">
    </head>
    <body>
        <section class="msger">

            <header class="msger-header">
                <div class="msger-header-title">
                    <i class="fas fa-comment-alt"></i>
                    <span class="chatWith"></span>
                    <span class="typing" style="display: none;">{{ __('Escribiendo') }}...</span>
                </div>
                <div class="msger-header-options">
                    <span class="chatStatus offline"><i class="fas fa-circle"></i></span>
                </div>
            </header>

            <div class="msger-chat" style="background-image: url('{{ asset('chat-bg.svg' ) }}'); background-repeat: repeat; background-size: 260px 260px;"></div>

            <form class="msger-inputarea">
                {{-- <input type="hidden" name="chatId" value="{{ $chat->id }}"> --}}
                <input type="text" class="msger-input" oninput="sendTypingEvent()" placeholder="{{ __('Escribe un mensaje') }}...">
                <button type="submit" class="msger-send-btn">{{ __('Enviar') }}</button>
            </form>

        </section>

        <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
        {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> --}}
        {{-- <script src="/js/app.js"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('js/chat.js') }}"></script> --}}
        <script src="/js/chat.js"></script>
    </body>
</html>
