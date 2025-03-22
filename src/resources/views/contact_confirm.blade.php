@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('/css/contact_confirm.css') }}">
@endsection


@section('content')
    
    <form action="/thanks" method="post" class="form">
        @csrf
        <table>
            <tr>
                <th>名前</th>
                <td>{{ $contact['last_name'] . '　' . $contact['first_name'] }}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>{{ $contact['gender'] }}</td>
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
