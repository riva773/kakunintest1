@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/register.css') }}">
@endsection

@section('header')
    <a href="/login" class="login__button">login</a>
@endsection

@section('content')
<div class="register__form-content">
    <div class="register__form-heading">
        <h2>Register</h2>
    </div>
    <form action="/register" method="post" class="form">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <h3>お名前</h3>
            </div>
            <div class="form__group-input">
                <input type="text" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}">
            </div>
            <div class="form__group-error">
                @error('name')
                <p class="form__error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <h3>メールアドレス</h3>
            </div>
            <div class="form__group-input">
                <input type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
            <div class="form__group-error">
                @error('email')
                <p class="form__error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <h3>パスワード</h3>
            </div>
            <div class="form__group-input">
                <input type="password" name="password" placeholder="例: coachtech1106">
            </div>
            <div class="form__group-error">
                @error('password')
                <p class="form__error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit">登録</button>
    </form>
</div>
@endsection