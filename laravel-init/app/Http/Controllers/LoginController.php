<?php
namespace App\Http\Controllers;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function login(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }

    public function authentication(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('users.index'));
        }
        return redirect(route('auth.login'));
    }

    public function register(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.register');
    }

    public function registration(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(4)
                ->letters()
                ->uncompromised()
            ],
        ]);

        $user = User::create($data);

        $role = Role::select('is_admin')->where('name', 'utilisateur')->first();

        Auth::login($user);

        return redirect(route('users.index'));
    }

    public function signOut() {
        Auth::logout();
        return redirect(route('auth.login'));
    }

    public function dashboard()
    {
        return view('dashboard', ['users' => User::all()]);
    }
}
