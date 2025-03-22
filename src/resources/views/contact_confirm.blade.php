@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('/css/contact_confirm.css') }}">
@endsection


@section('content')
    
    <form action="/thanks" method="post" class="form">
        @csrf
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
        <input type="hidden" name="phone1" value="{{ $contact['phone1'] }}">
        <input type="hidden" name="phone2" value="{{ $contact['phone2'] }}">
        <input type="hidden" name="phone3" value="{{ $contact['phone3'] }}">
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
        <table>
            <tr>
                <th>名前</th>
                <td>{{ $contact['last_name'] . '　' . $contact['first_name'] }}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @if ($contact['gender'] == 0)
                        男
                    @elseif ($contact['gender'] == 1)
                        女
                    @else
                        その他
                    @endif
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td> {{ $contact['email'] }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $contact['phone1'] . $contact['phone2'] . $contact['phone3'] }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td> {{ $contact['address'] }} </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $contact['building'] }} </td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $category->content }}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{{ $contact['detail'] }}</td>
            </tr>
        </table>
        <div class="form__button-wrapper">
            <button type="submit" class="form__button-submit">送信</button>
            <a href="#">修正</a>
        </div>
    </form>
@endsection
