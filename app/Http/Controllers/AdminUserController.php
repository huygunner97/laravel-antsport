<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminUserController extends Controller
{
    public function getList()
    {
        $users = User::orderBy('id', 'desc')->paginate(3);

        $array = [
        	'users' => $users
        ];
        return view('admin.user.list', $array);
    }

    public function getAdd()
    {
    	return view('admin.user.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'name' => 'required',
            'diachi' => 'required',
            'dienthoai' => 'required|min:10|max:10'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Mật khẩu cần ít nhất 6 ký tự',
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'diachi.required' => 'Bạn chưa nhập địa chỉ',
            'dienthoai.required' => 'Bạn chưa nhập điện thoại',
            'dienthoai.min' => 'Số điện thoại không hợp lệ (10 số)',
            'dienthoai.max' => 'Số điện thoại không hợp lệ (10 số)'
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->diachi = $request->diachi;
        $user->dienthoai = substr($request->dienthoai, '1', '9');
        $user->level = isset($request->level) ? 1 : 0 ;
        $user->save();

        return redirect('admin/user/add')->with('announce','Thêm thành công');
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'email' => 'required' ,
            Rule::unique('user', 'email')->ignore($id),
            'name' => 'required',
            'password' => 'min:6',
            'diachi' => 'required',
            'dienthoai' => 'required'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.min' => 'Mật khẩu cần ít nhất 6 ký tự',
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'diachi.required' => 'Bạn chưa nhập địa chỉ',
            'dienthoai.required' => 'Bạn chưa nhập điện thoại'
        ]);

        if (!isset($request->password)) {
            User::where('id', $id)->update([
                'email' => $request->email,
                'name' => $request->name,
                'diachi' => $request->diachi,
                'dienthoai' => str_replace('+(84)', '', $request->dienthoai),
                'level' => isset($request->level) ? 1 : 0
            ]);
        } else {           
            User::where('id', $id)->update([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'diachi' => $request->diachi,
                'dienthoai' => str_replace('+(84)', '', $request->dienthoai),
                'level' => isset($request->level) ? 1 : 0
            ]);
        }

        return redirect('admin/user/edit/'.$id)->with('announce','Sửa thành công');
    }

    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list');
    }
    
}
