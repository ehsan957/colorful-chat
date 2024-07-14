<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dist/bootstrap.rtl.min.css')}}" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: Vazirmatn;
        }
        #shows{
            height: 75vh;
            overflow-y: scroll;
            flex-direction: column-reverse;
        }
        #fields{
            height: 20vh;
        }
        .toast{
            --bs-toast-min-width: 50vw;
            --bs-toast-max-width: 100vw !important;
            /* display: unset !important; */
        }
    </style>
    <title>Colorful Chats</title>
</head>

<body class="bg-secondary vh-100 p-1">
    
        @livewire('chat')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{asset('dist/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="{{asset('dist/popper.min.js')}}" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="{{asset('dist/bootstrap.min.js')}}" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
</body>

</html>