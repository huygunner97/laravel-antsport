<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <base href="http://localhost/sport-project/laravel/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/css/login.css')}}">
</head>
<body>
    <div class="opacity"></div>
    <div class="login">
        <form method="post" action="{{ route('login') }}">
            @csrf
            <table cellpadding="25">
                <tr>
                    <td>Đăng nhập</td>
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Email" value="{{ old('email') }}"  required></td>
                    @if ($errors->has('email'))
                        <script type="text/javascript">
                            alert('Thông tin đăng nhập không đúng');
                        </script>
                    @endif
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password"  required ></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit"  value="Gửi">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Quên mật khẩu ?</a>
                        @endif
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
