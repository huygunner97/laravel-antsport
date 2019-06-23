@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Người dùng</span>&emsp;/&emsp;<span>Sửa</span>
    </div>
    <div class="container-extra">
        <form action="admin/user/edit/{{ $user->id }}" method="post" enctype= "multipart/form-data">
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
                    <td><input type="email" name="email" placeholder="Email" value="{{$user->email}}" id="input"></td>
                </tr>
                <tr>
                    <td>Mật khẩu: </td>
                    <td><input type="password" name="password" placeholder="không đổi mật khẩu thì bỏ qua ô này" disabled id="input">&emsp;<input type="checkbox" id="checkbox"></td>
                </tr>
                <tr>
                    <td>Tên người dùng: </td>
                    <td><input type="text" name="name" placeholder="Tên người dùng" value="{{$user->name}}" id="input"></td>
                </tr>
                <tr>
                    <td>Địa chỉ: </td>
                    <td><input type="text" name="diachi" placeholder="Địa chỉ" value="{{$user->diachi}}" id="input"></td>
                </tr>
                <tr>
                    <td>Điện thoại: </td>
                    <td><input type="text" name="dienthoai" placeholder="Điện thoại" value="+(84){{$user->dienthoai}}" id="input"></td>
                </tr>
                <tr>
                    <td>Cấp độ: </td>
                    <td>
                        <input type="checkbox" 
                        @if ($user->level == 1 )
                            checked
                        @endif
                        name="level">&nbsp;<strong>Admin</strong>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"  value="Sửa" id="submit"></td>
                </tr>
            </table>
        <form>
    </div>
</div>

@endsection

@section ('script')
<script type="text/javascript">
    $(function () {
        $('#checkbox').click(function(){
            if ($(this).prop('checked') == true) {
                $(this).siblings().removeAttr('disabled');
            }
            else {
                $(this).siblings().attr('disabled', 'true');
            }
        })
    })
</script>
@endsection 