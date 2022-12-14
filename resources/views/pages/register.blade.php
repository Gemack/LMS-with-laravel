@extends('layout')
@section('content')
    <section class="form-container">

        <form action="/users" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>register now</h3>
            <p>your name <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box"
                value="{{ old('name') }}">
            @error('name')
                <p class="error" style="color: red">{{ $message }}</p>
            @enderror
            <p>your email <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box"
                value="{{ old('email') }}">

            @error('email')
                <p class="error" style="color: red">{{ $message }}</p>
            @enderror
            <p>your password <span>*</span></p>
            <input type="password" name="password" placeholder="enter your password" required maxlength="20" class="box">
            @error('password')
                <p class="error" style="color: red">{{ $message }}</p>
            @enderror
            <p>confirm password <span>*</span></p>
            <input type="password" name="password_confirmation" placeholder="confirm your password" required maxlength="20"
                class="box">
            @error('password')
                <p class="error" style="color: red">{{ $message }}</p>
            @enderror
            <p>select profile <span>*</span></p>
            <input type="file" name="photo">
            <input type="submit" name="submit" class="btn">

        </form>

    </section>
@endsection

</body>

</html>
