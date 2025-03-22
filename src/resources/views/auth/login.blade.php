@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection

@section('header')
    <a href="/register" class="register__button">register</a>
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
            <div class="form__group-error">
                @error('email')
                    <p class="form__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__group-title">
                <h3>パスワード</h3>
            </div>
            <div class="form__group-input">
                <input type="password" name="password"placeholder="例: coachtech1106">
            </div>
            <div class="form__group-error">
                @error('password')
                <p class="form__error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit">
            ログイン
        </button>
    </form>
</div>
@endsection
