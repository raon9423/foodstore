<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RoleMaster;
use App\Models\UserRolesMapping;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated($request, $user)
    {
        // Lấy danh sách vai trò của người dùng
        $roleNames = $user->roles->map(function($roleMapping) {
            return $roleMapping->role->rolename; // Truy xuất tên role từ bảng RoleMaster
        })->toArray();

        if (in_array('Admin', $roleNames) || in_array('User', $roleNames) || in_array('Customer', $roleNames)) {
            return redirect()->route('dashboard'); // Chuyển hướng trang quản trị
        }
     
        return redirect()->route('home'); // Chuyển hướng trang chủ
    }
        
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   
}
