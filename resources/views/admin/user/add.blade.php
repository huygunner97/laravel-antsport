@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Người dùng</span>&emsp;/&emsp;<span>Thêm</span>
    </div>
    <div class="container-extra">
        <form action="admin/user/add" method="post" enctype= "multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <table cellpadding="10" style="width: 70%;">
                <tr>
                    <td></td>
                    <td>
                        @include ('admin.error') 
                        
                        @if (session('announce'))
                            <div class="alert-succ">{{ session('announce') }}</div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" placeholder="Email" value="{{old('email')}}" id="input"></td>
                </tr>
                <tr>
                    <td>Mật khẩu: </td>
                    <td><input type="password" name="password" placeholder="password"  id="input"></td>
                </tr>
                <tr>
                    <td>Tên người dùng: </td>
                    <td><input type="text" name="name" placeholder="Tên người dùng" value="{{old('name')}}" id="input"></td>
                </tr>
                <tr>
                    <td>Địa chỉ: </td>
                    <td><input type="text" name="diachi" placeholder="Địa chỉ" value="{{old('diachi')}}" id="input"></td>
                </tr>
                <tr>
                    <td>Điện thoại: </td>
                    <td><input type="text" name="dienthoai" placeholder="Điện thoại" value="{{old('dienthoai')}}" id="input"></td>
                </tr>
                <tr>
                    <td>Cấp độ: </td>
                    <td><input type="checkbox" name="level">&nbsp;<strong>Admin</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"  value="Thêm" id="submit"></td>
                </tr>
            </table>
        <form>
    </div>
</div>

@endsection