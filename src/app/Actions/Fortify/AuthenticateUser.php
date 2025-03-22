<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;

class AuthenticateUser
{
    public function __invoke(array $input)
    {
        $request = new LoginRequest();

        $request->merge($input);

        $validator = Validator::make(
            $request->all(),
            $request->rules(),
            $request->messages()
        );
        $validator->validate();

        if (Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password'],
        ])) {
            session()->regenerate();
            return app(LoginResponse::class);
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }
}
