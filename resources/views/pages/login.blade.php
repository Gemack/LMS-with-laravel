@extends('layout')
@section('content')
    <section class="form-container">

        <form action="/login" method="post">
            @csrf
            <h3>login now</h3>
            <p>your email <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" class="box" value="{{ old('email') }}">
            @error('email')
                <p class="error" style="color: red">{{ $message }}</p>
            @enderror
            <p>your password <span>*</span></p>
            <input type="password" name="password" placeholder="enter your password" class="box">
            @error('password')
                <p class="error" style="color: red">{{ $message }}</p>
            @enderror
            <input type="submit" value="login new" name="submit" class="btn">
        </form>

    </section>
@endsection

</body>

</html>
