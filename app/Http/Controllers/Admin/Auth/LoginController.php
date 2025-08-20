<?php

/**
 * Created By: JISHNU T K
 * Date: 2025/08/19
 * Time: 21:42:18
 * Description: LoginController.php
 */

namespace App\Http\Controllers\Admin\Auth;

use App\Constants\UserTypes;

use App\Helpers\ToastrHelper;

use App\Http\Requests\UserLoginRequest;

use App\Services\AuthService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @return [type]
     */
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    /**
     * @param UserLoginRequest $request
     *
     * @return [type]
     */
    public function login(UserLoginRequest $request)
    {
        $login = $this->authService->loginAdminWeb($request->email, $request->password);

        if (isset($login['error'])) {
            return back()->withErrors(['error' => $login['error']]);
        }

        ToastrHelper::success('Login successful!');

        $user = $login['user'];

        return redirect()->route('admin.dashboard');
    }

    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
