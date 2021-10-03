<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Atlet</title>
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/asset/css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>

    <div class="parent clearfix">
        <div class="bg-illustration">
            <img src="{{ url('') }}/asset/img/ilus.png" alt="illustration">
            <div class="login-title">Sistem Informasi Atlet</div>
            <div class="login-subtitle">Dinas Pemuda, Olahraga,
                Kebudayaan, dan Pariwisata</div>

        </div>
        <div class="login" style="left: 1000px;">
            <div class="container">
                <img src="{{ url('') }}/asset/img/logo_dinpor.png" alt="logo">
                <div class="container">
                    @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                </div>
                <div class="login-form">

                    <form action="/login" method="POST">
                        @csrf
                        <div class="login-username">Username</div>
                        <img src="{{ url('') }}/asset/img/Profile.png" alt="Profile"
                            style="width: 24px; height: 24px; top: 25px; left: 5px">
                        <input type="text" class="@error('username') is-invalid @enderror" id="username" name="username"
                            value="{{ old('username') }}" placeholder="Masukkan Username anda" autofocus>
                        @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="login-password">Password</div>
                        <img src="{{ url('') }}/asset/img/Password.png" alt="password"
                            style="width: 24px; height: 24px; top: 105px; left: 5px">
                        <input type="password" class="@error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ old('password') }}" placeholder="Masukkan Password anda">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="remember-form">
                            <input type="checkbox">
                            <span>ingat saya</span>
                        </div>
                        <div class="forget-pass">
                            <a href="#">Lupa password?</a>
                        </div>

                        <button type="submit">Masuk</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>