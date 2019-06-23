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
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="{{ route('password.email') }}">
            @csrf
            <table cellpadding="25">
                <tr>
                    <td>Quên mật khẩu</td>
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required></td>
                    @if ($errors->has('email'))
                        <script type="text/javascript">
                            alert('Email không đúng');
                        </script>
                    @endif
                </tr>
                <tr>
                    <td>
                        <input type="submit"  value="Gửi">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
