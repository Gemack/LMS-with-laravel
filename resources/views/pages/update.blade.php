@extends('layout')
@section('content')
    <section class="form-container">

        <form action="" method="post" enctype="multipart/form-data">
            <h3>update profile</h3>
            <p>update name</p>
            <input type="text" name="name" placeholder="shaikh anas" maxlength="50" class="box">
            <p>update email</p>
            <input type="email" name="email" placeholder="shaikh@gmail.come" maxlength="50" class="box">
            <p>previous password</p>
            <input type="password" name="old_pass" placeholder="enter your old password" maxlength="20" class="box">
            <p>new password</p>
            <input type="password" name="new_pass" placeholder="enter your old password" maxlength="20" class="box">
            <p>confirm password</p>
            <input type="password" name="c_pass" placeholder="confirm your new password" maxlength="20" class="box">
            <p>update pic</p>
            <input type="file" accept="image/*" class="box">
            <input type="submit" value="update profile" name="submit" class="btn">
        </form>

    </section>
@endsection


</body>

</html>
