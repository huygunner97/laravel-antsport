<?php

namespace App\Http\Controllers;

use http\Env\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;
use App\Mail\SendMailResetPass;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\User;
use App\Customer;
use App\Order;
use App\OrderDetail;

class AjaxController extends Controller
{
    public function getCart($total_number, $total_price, $cart_id, $number)
    {
        foreach (session('cart') as $rows) {
            $classify = $rows['classify'];
            $pk_product_id = $rows['pk_product_id'];
            if ($pk_product_id.$classify == $cart_id) {
                session(['cart.'.$pk_product_id.$classify.'.number' => $number]);
            }
        }
        echo '<p>Tổng sản phẩm :&emsp;<span style="color: red">'.$total_number.'&nbsp;Sản phẩm</span></p>';
        echo '<p>Tổng giá :&emsp;<span style="color: red">'.number_format($total_price).'đ</span></p>';
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Email không hợp lệ',
                'password.required' => 'Bạn chưa nhập mật khẩu'
            ]);
        $email = $request->email;
        $password = $request->password;
        $check = User::where('email', $email)->first();
        if (isset($check->email)) {
            if (!Hash::check($password, $check->password)) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('err-pass', 'Mật khẩu không đúng');
                });
            }
        } else {
            $validator->after(function ($validator) {
                $validator->errors()->add('err-email', 'Email không tồn tại');
            });
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        } else {
            $request->session()->put('name', $check->name);
            $request->session()->put('id', $check->id);
            return response()->json(['ok'=> 'Đăng nhập thành công']);
        }
    }

    public function forgetPass(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email'
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Email không hợp lệ',
            ]);

        $email = $request->email;
        $check = User::where('email', $email)->first();
        if (!isset($check->email)) {
            $validator->after(function ($validator) {
                $validator->errors()->add('err-email', 'Tài khoản không tồn tại');
            });
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        } else {
            $data = [
                'user' => $request->email
            ];
            Mail::to($request->email)
                ->send(new SendMailResetPass($data));

            return response()->json([
                'announce' => 'Please check e-mail '.$request->email.' for reset password'
            ]);
        }
    }

    public function resetPass(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
                'confirm' => 'required',
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Email không hợp lệ',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu cần ít nhất 8 ký tự',
                'confirm.required' => 'Bạn chưa nhập xác thực mật khẩu'
            ]);

        $email = $request->email;
        $check = User::where('email', $email)->first();
        if (!isset($check->email)) {
            $validator->after(function ($validator) {
                $validator->errors()->add('err-email', 'Tài khoản không tồn tại');
            });
        }

        if ($request->password != $request->confirm) {
            $validator->after(function ($validator) {
                $validator->errors()->add('err-confirm', 'xác nhận mật khẩu không thành công');
            });
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        } else {
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'announce'=> 'Thay đổi mật khẩu thành công',
                'user' => $request->email,
                'pass' => $request->password
            ]);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email|email',
                'password' => 'required|min:8',
                'confirm' => 'required',
                'address' => 'required',
                'phone' => 'required|min:10|max:10'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu cần ít nhất 8 ký tự',
                'confirm.required' => 'Bạn chưa nhập xác thực mật khẩu',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.min' => 'Số điện thoại không hợp lệ (10 số)',
                'phone.max' => 'Số điện thoại không hợp lệ (10 số)'
            ]);


        if ($request->password != $request->confirm) {
            $validator->after(function ($validator) {
                $validator->errors()->add('err-pass', 'xác nhận mật khẩu không thành công');
            });
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        } else {
            $user = new User;
            $user->email = time().$request->email;
            $user->password = Hash::make($request->password);
            $user->name = $request->name;
            $user->diachi = $request->address;
            $user->dienthoai = substr($request->phone, '1', '9');
            $user->level = 0 ;
            $user->save();

            $data = [
                'id' => $user->id,
                'user' => $request->email,
                'pass' => $request->password
            ];
            Mail::to($request->email)
                ->send(new SendMail($data));

            return response()->json([
                'announce'=> 'Please check e-mail '.$request->email.' for complete registration'
            ]);
        }
    }

    public function getCheckout()
    {
        if (!session('name')) {
            return response()->json(['notlogin' => 'Bạn cần đăng nhập để thực hiện chức năng này']);
        } else {
            $user = User::where('id', session('id'))->first();
            return $user;
        }
    }

    public function postCheckout(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'phone.required' => 'Bạn chưa nhập số điện thoại'
            ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        } else {

            $customer = new Customer;
            $customer->hoten = $request->name;
            $customer->diachi = $request->address;
            $customer->dienthoai = str_replace('+(84)', '', $request->phone);
            $customer->date = now();
            $customer->fk_user_id = $request->session()->get('id');
            $customer->save();

            $tonggia = 0;
            foreach (session('cart') as $product) {
                $tonggia = $tonggia + $product["number"] * $product["c_price"];
            }

            $order = new Order;
            $order->customer_id = $customer->pk_customer_id;
            $order->price = $tonggia;
            $order->save();

            foreach (session('cart') as $value) {
                //insert ban ghi
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->order_id;
                $order_detail->fk_product_id = $value['pk_product_id'];
                $order_detail->price = $value['c_price'];
                $order_detail->number = $value['number'];
                $order_detail->classify = $value['classify'];
                $order_detail->save();
            }
            session(['cart' => []]);
            return response()->json(['ok' => 'Đơn hàng được xác nhận']);

        }
    }

}
