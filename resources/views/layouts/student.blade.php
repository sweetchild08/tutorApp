<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    .apps{
      height:20vh
    }
    .font-bold{
      font-weight: 800
    }
    .gap-10{
      gap: 3rem;
    }
  </style>
</head>
<body class="h-screen overflow-hidden" style="background-image: url('/images/pwd.jpg');background-position: center;
background-repeat: no-repeat;
background-size: cover;padding-top:5rem">
  <div class="flex flex-col items-center justify-center">

<!-- Title -->
<h1 class="text-gray-200 text-5xl font-serif font-bold">
  Choose
</h1>

<!-- Profiles -->
<div class="flex flex-row flex-wrap justify-center gap-10 mt-8">

  <!-- Profile 1 -->
  <a href="#" class="flex flex-col items-center group gap-2">
    <img class="rounded border-2 border-transparent hover:animate-bounce apps" src="/images/icons/audio.png" />
    <p class="text-gray-500 group-hover:text-gray-300 text-xl font-semibold"> Audio </p>
  </a>

  <!-- Profile 2 -->
  <a href="#" class="flex flex-col items-center group gap-2">
    <img class="rounded border-2 border-transparent  hover:animate-bounce apps" src="/images/icons/video.png" />
    <p class="text-gray-500 group-hover:text-gray-300 text-xl font-semibold"> Video </p>
  </a>

  <!-- Profile 3 -->
  <a href="#" class="flex flex-col items-center group gap-2">
    <img class="rounded border-2 border-transparent  hover:animate-bounce apps" src="/images/icons/games.png" />
    <p class="text-gray-500 group-hover:text-gray-300 text-xl font-semibold"> Games </p>
  </a>

  <!-- Profile 4 -->
  <a href="#" class="flex flex-col items-center group gap-2">
    <img class="rounded border-2 border-transparent  hover:animate-bounce apps" src="/images/icons/quiz.png" />
    <p class="text-gray-500 group-hover:text-gray-300 text-xl font-semibold"> Quizes </p>
  </a>

  <!-- Add Profile -->
  {{-- <a href="#" class="flex flex-col items-center group gap-3 ">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-[150px] w-[150px] group-hover:bg-gray-300 border-2 border-transparent" viewBox="0 0 20 20" fill="#6b7280">
      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
    </svg>
    <p class="text-gray-500 group-hover:text-gray-300 apps-text"> Add Profile </p>
  </a> --}}

</div>

<!-- Manage Profiles -->
  <form id="logout" method="POST" action="{{ route('logout') }}">
    @csrf
  <button type="submit" class="border-2 border-gray-600 text-gray-600 px-4 py-1 mt-20 hover:border-gray-400 hover:text-gray-400">
    Logout
  </button>
  </form> 
</a>
  <!-- Authentication -->
  
</div>
</body>

</html>