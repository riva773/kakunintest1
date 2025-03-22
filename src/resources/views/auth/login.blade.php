@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection


@section('content')
<div class="form__form-content">
    <div class="register__form-heading">
        <h2>Login</h2>
    </div>
    <form action="/login" method="post" class="form">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <h3>メールアドレス</h3>
            </div>
            <div class="form__group-input">
                <input type="text" name="email" placeholder="例: test@example.com">
            </div>
            <div class="form__group-title">
                <h3>パスワード</h3>
            </div>
            <div class="form__group-input">
                <input type="password" name="password"placeholder="例: coachtech1106">
            </div>
        </div>
        <button type="submit">
            ログイン
        </button>
    </form>
</div>
@endsection
