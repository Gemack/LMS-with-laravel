<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>

<body>

    <header class="header">

        <section class="flex">

            <a href="home.html" class="logo">GEMS</a>

            <form action="search.html" method="post" class="search-form">
                <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
                <button type="submit" class="fas fa-search"></button>
            </form>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="user-btn" class="fas fa-user"></div>
                <div id="toggle-btn" class="fas fa-sun"></div>
            </div>


            <div class="profile">
                @if (auth()->user())
                    <img src="{{ auth()->user()->photo ? auth()->user()->photo : 'images/pic-1.jpg' }}" class="image"
                        alt="user profile photo">
                    <h3 class="name">{{ auth()->user()->name }}</h3>
                    <p class="role">student</p>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                @else
                    <img src="images/pic-1.jpg" class="image" alt="">
                    <div class="flex-btn">
                        <a href="/login_page" class="option-btn">login</a>
                        <a href="/register" class="option-btn">register</a>
                    </div>
                @endif
            </div>

        </section>


    </header>

    <div class="side-bar">

        <div id="close-btn">
            <i class="fas fa-times"></i>
        </div>
        @if (auth()->user())
            <div class="profile">
                <img src="{{ auth()->user()->photo ? auth()->user()->photo : 'images/pic-1.jpg' }}" class="image"
                    alt="user profile photo">
                <h3 class="name">{{ auth()->user()->name }}</h3>
                <p class="role">student</p>
                <a href="/update" class="btn">Update Profile</a>
            </div>
        @else
            <div class="profile">
                <img src="images/pic-1.jpg" class="image" alt="">
                <p class="not_log">You are not logged in</p>
            </div>
        @endif


        <nav class="navbar">
            <a href="/"><i class="fas fa-home"></i><span>home</span></a>
            <a href="/about"><i class="fas fa-question"></i><span>about</span></a>
            <a href="/course"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
            <a href="/course_form"><i class="fa-solid fa-pen-to-square"></i><span> add courses</span></a>

        </nav>

    </div>
    {{-- {{  VIEW OUTPUT }} --}}
    @yield('content')

    <footer class="footer">

        &copy; copyright @ 2022 by <span>Gems consulting company</span> | all rights reserved!

    </footer>

    <!-- custom js file link  -->
    <script src={{ asset('Js/script.js') }}></script>
