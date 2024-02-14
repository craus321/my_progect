@extends('layout')

@section('content')

    <form id="sendMessageForm" class="messenger-form" method="POST" action="{{ route('chat.index') }}">
        @csrf
        <div class="users-form">
            <label for="user-select">Выберите пользователя:</label>
            <select id="user-select" name="receiver_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->surname }} {{ $user->name }}  {{ $user->patronymic }}</option>
                @endforeach
            </select>
        </div>
        <div class="message-area" id="messageArea">
            <!-- Сюда будут добавляться сообщения -->
            @foreach($messages as $message)
                @if($message->sender_id === $currentUserId)
                    <div class="message sent">
                        <p>{{ $message->message_text }}</p>
                    </div>
                @else
                    <div class="message received">
                        <p>{{ $message->message_text }}</p>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="input-area">
            <textarea id="messageInput" name="message_text" placeholder="Введите сообщение..."></textarea>
            <button type="submit">Отправить</button>
        </div>
    </form>



    <script>
        const socket = new WebSocket('ws://127.0.0.1:6001');

        socket.onopen = function(event) {
            console.log('WebSocket соединение установлено');
        };

        socket.onmessage = function(event) {
            console.log('Получено сообщение от сервера:', event.data);
            // Добавьте логику для отображения полученного сообщения в вашем интерфейсе
        };

        socket.onerror = function(error) {
            console.error('Ошибка WebSocket соединения:', error);
        };

        socket.onclose = function(event) {
            console.log('WebSocket соединение закрыто');
        };

        function sendMessage(message) {
            socket.send(message);
        }
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sendMessageForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(data) {
                        $('#messageInput').val(''); // Очищаем поле ввода

                        // Добавляем новое сообщение к существующим сообщениям на странице
                        var newMessage = '<div class="message sent"><p>' + data.message_text + '</p></div>';
                        $('#messageArea').append(newMessage); // Добавляем новое сообщение в конец блока сообщений
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

    </script>

    <style>

        .users-form {
            margin: 20px;
            font-family: Arial, sans-serif;
        }

        label {
            font-weight: bold;
        }

        select {
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
            /* Дополнительные стили по желанию */
        }

        /* При фокусе добавляем стиль для выбранного элемента */
        select:focus {
            outline: none;
            border-color: dodgerblue;
            box-shadow: 0 0 5px rgba(0, 0, 255, 0.5);
        }

        /* Стили для блоков сообщений */
        .message p {
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
            line-height: 1.4;
            background-color: #f9f9f9; /* Цвет фона сообщения */
            border: 1px solid #ccc; /* Граница сообщения */
        }

        .sent {
            text-align: right;/* Выравнивание текста сообщения справа */
        }

        .received {
            text-align: left; /* Выравнивание текста сообщения слева */
        }

        /* Стили для текста внутри сообщений */
        .message p {
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
            line-height: 1.4;
            background-color: #f9f9f9; /* Цвет фона сообщения */
            border: 1px solid #ccc; /* Граница сообщения */
        }

        .sent p {
            color: #fff; /* Цвет текста для отправленных сообщений */
            background-color: #007bff; /* Цвет фона для отправленных сообщений */
        }

        /* Дополнительные стили для полученных сообщений */
        .received p {
            color: #333; /* Цвет текста для полученных сообщений */
            background-color: #f0f0f0; /* Цвет фона для полученных сообщений */
        }

        /* Стили для блока .messenger-form */
        .messenger-form {
            width: 650px; /* Ширина блока */
            height: 700px; /* Высота блока */
            background-color: #f9f9f9; /* Цвет фона блока */
            border: 1px solid #ccc; /* Граница блока */
            border-radius: 5px; /* Радиус скругления углов блока */
            margin: 200px auto; /* Внешние отступы для центрирования блока по горизонтали */
            overflow: hidden; /* Скрытие содержимого, если оно выходит за пределы блока */
        }

        /* Стили для select внутри .messenger-form */
        .messenger-form select {
            width: calc(100% - 18px); /* Ширина select */
            padding: 6px; /* Внутренние отступы */
            font-size: 14px; /* Размер шрифта */
            outline: none; /* Убирает рамку при фокусе */
            background-color: #fff; /* Цвет фона */
            border: 1px solid #ccc; /* Граница */
            border-radius: 3px; /* Радиус скругления углов */
            margin-bottom: 10px; /* Отступ снизу */
        }

        /* Дополнительные стили для фокуса и наведения */
        .messenger-form select:focus,
        .messenger-form select:hover {
            border-color: #007bff;
        }

        #recipientSelect {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            padding: 8px;
            font-size: 16px;
            outline: none;
            background-color: #fff;
            margin-bottom: 10px; /* Для добавления отступа между select и соседними блоками */
        }

        /* Дополнительные стили для фокуса и наведения */
        #recipientSelect:focus,
        #recipientSelect:hover {
            border-color: #007bff;
        }

        .messenger-container {
            height: 550px;
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        .message-area {
            height: 300px;
            padding: 10px;
            overflow-y: auto;
            background-color: #f9f9f9;
        }

        .input-area {
            margin-top: auto;
            display: flex;
            align-items: flex-end; /* Выравнивание по нижнему краю */
            justify-content: space-between; /* Равномерное распределение по ширине */
            padding: 10px;
            background-color: #fff;
        }


        #messageInput {

            flex: 1;
            padding: 75px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: none;
        }

        button {
            padding: 8px 15px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }


    </style>
@endsection
