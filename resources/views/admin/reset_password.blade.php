<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/css/login.css')}}">
</head>
<body>
    <div class="opacity"></div>
    <div class="login">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <table cellpadding="25">
                <tr>
                    <td>Reset Password</td>
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}"  required></td>
                    @if ($errors->has('email'))
                        <script type="text/javascript">
                            alert('Email không đúng');
                        </script>
                    @endif
                </tr>
                <tr>
                    <td><input type="password"  name="password" placeholder="Password"  required ></td>
                </tr>
                <tr>
                    <td><input type="password" id="password-confirm"  name="password_confirmation" placeholder="Confirm Password"  required ></td>
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
