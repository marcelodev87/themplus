<?php

namespace App\Http\Controllers\Themplus;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        /* $user = User::where('id', 1)->first();
        $user->password = bcrypt('teste');
        $user->save(); */
        return view('app.index');
    }

    public function login(Request $request)
    {
        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Ooops, informe todos os campos para efetuar o login!')->render();
            return response()->json($json);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Ooops, informe um email válido!')->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Ooops, Usuário ou Senha incorretos!')->render();
            var_dump($request);
            return response()->json($json);
        }

        $json['redirect'] = route('app.dashboard');
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('app.login');
    }

    // --------------------------------- ROUTES -------------------------------------//
    public function dashboard()
    {
        return view('app.dashboard');
    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }
}
