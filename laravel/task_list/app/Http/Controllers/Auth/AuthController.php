<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dao\Auth\AuthDao;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    /**
     * Auth Interface
     */
    private $authInterface;

    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }

    /**
     * To show login form
     * @return response()
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * To show register form
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Login User Account
     * @param Request
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Register User Account
     * @param Request
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = $this->authInterface->createUser($data);
        Auth::login($user);
        return redirect("/")->withSuccess('Great! You have Successfully completed Registration');
    }

    /**
     * Logout Process
     * @return response()
     */
    public function logout()
    {
        session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
