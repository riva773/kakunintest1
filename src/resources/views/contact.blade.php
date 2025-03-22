@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/contact.css') }}">
@endsection

@section('content')

<div class="contact__alert">
    @if ($errors->any())
        <div class="contact__alert--danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="form">
    <form action="/confirm" method="post">
        @csrf
        <div class="form__name form__group">
            <div class="form__name-text">
                <span>お名前</span>
                <span class="required">※</span>
            </div>
            <div class="form__name-input">
                <input type="text" name="last_name" class="form__name-input-last_name" value="{{ old('last_name') }}">
                <input type="text" name="first_name" class="form__name-input-first_name" value="{{ old('first_name') }}">
            </div>
        </div>
        <div class="form__gender form__group">
            <div class="form__gender-text">
                <span>性別</span>
                <span class="required">※</span>
            </div>
            <div class="form__gender-input">
                <input type="radio" name="gender" value="男" {{ old('gender','男') === '男' ? 'checked' : '' }}>男
                <input type="radio" name="gender" value="女" {{ old('gender') === '女' ? 'checked' : '' }}>女
                <input type="radio" name="gender" value="その他" {{ old('gender') === 'その他' ? 'checked' : '' }}>その他
            </div>
        </div>
        <div class="form__email form__group">
            <div class="form__email-text">
                <span>メールアドレス</span>
                <span class="required">※</span>
            </div>
            <div class="form__email-input">
                <input type="email" name="email" value=" {{ old('email') }}">
            </div>
        </div>
        <div class="form__phone form__group">
            <div class="form__phone-text">
                <span>電話番号</span>
                <span class="required">※※</span>
            </div>
            <div class="form__phone-input">
                <input type="tel" name="phone1" value= "{{ old('phone1') }}">
                <span>-</span>
                <input type="tel" name="phone2" value= "{{ old('phone2') }}">
                <span>-</span>
                <input type="tel" name="phone3" value="{{ old('phone3') }}" >
            </div>
        </div>
        <div class="form__address form__group">
            <div class="form__address-text">
                <span>住所</span>
                <span class="required">※</span>
            </div>
            <div class="form__address-input">
                <input type="text" name="address" value="{{ old('address') }}">
            </div>
        </div>
        <div class="form__building form__group">
            <div class="form__building-text">
                <span>建物名</span>
            </div>
            <div class="form__building-input">
                <input type="text" name="building" value="{{ old('building') }}">
            </div>
        </div>
        <div class="form__contact-category form__group">
            <div class="form__contact-text">
                <span>お問い合わせの種類</span>
                <span class="required">※</span>
            </div>
            <div class="form__contact-input">
                <select name="category_id">
                    <option value="" {{ old('category_id') === null ? 'selected' : '' }}>選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form__contact-message form__group">
            <div class="form__contact-message-text">
                <span>お問い合わせ内容</span>
                <span class="required">※</span>
            </div>
            <div class="form__contact-message-input">
                <textarea name="detail">{{ old('detail')}}</textarea>
            </div>
        </div>
        <div class="form__contact-button">
            <button type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection