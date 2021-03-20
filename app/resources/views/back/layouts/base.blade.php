<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <title>{{ isset($title) ? $title . ' | ' : '' }}Laravel CMS</title>
</head>
<body>
    <div id="app">
        <header class="top-0 lef-0 w-full z-40 bg-white fixed border-b border-gray-200">
          <div class="container px-6 mx-auto flex justify-between items-center">
              <a class="navbar-brand text-3xl" href="/admin">Laravel CMS【管理画面】</a>
              <nav>
                  <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-blue-600" onClick="(function(){
                    document.getElementById('logout-form').submit();
                    return false;
                    })();">ログアウト</a>
                  <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                      @csrf 
                  </form>
              </nav>
          </div>
        </header>
        <div class="container mx-auto px-4 pt-24">
            @yield ('content')
        </div>
    </div>
</body>
<script src="{{ asset('/js/editor-init.js') }}"></script>
</html>
