@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('/css/dashboard.css')}}">
@endsection

@section('content')
<div class="form__header">
    <h2>Admin</h2>
</div>

<div class="search">
    <div class="search__content">
        <div class="search__content-filters">
            <form method="GET" action="{{ route('admin.index') }}">
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">
                <select name="gender">
                    <option value="">性別</option>
                    <option value="">全て</option>
                    <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                    <option value="2"  {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                    <option value="3"  {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                </select>
                <select name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                    @endforeach
                </select>
                <input type="date" name="date" value="{{ request('date') }}">
                <button class="search__button-search">検索</button>
            </form>
            <a href="{{ route('admin.index') }}" class="search__button-reset">リセット</a>
        </div>
        <div class="search__content-controls">
            <form method="get" action="{{ route('admin.export') }}">
                @foreach(request()->query() as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <button class="search__button-export">エクスポート</button>
            </form>
            <div class="pagination-wrapper">
                {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <div class="search__content-table">
            <table>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>
                        @if($contact->gender ===1 )
                        男性
                        @elseif($contact->gender === 2)
                        女性
                        @else
                        その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td>
                        <button class="detail-button" data-id="{{ $contact->id }}">詳細</button>
                    </td>
                </tr>
                <div class="modal" id="modal-{{ $contact->id }}">
                    <div class="modal__overlay"></div>
                    <div class="modal__content">
                        <button class="modal__close" data-id="{{ $contact->id }}">&times;</button>

                        <h3>お問い合わせ詳細</h3>
                        <p><strong>名前：</strong>{{ $contact->last_name }} {{ $contact->first_name }}</p>
                        <p><strong>性別：</strong>{{ $contact->gender === 1 ? '男性' : ($contact->gender === 2 ? '女性' : 'その他') }}</p>
                        <p><strong>メール：</strong>{{ $contact->email }}</p>
                        <p><strong>電話番号：</strong>{{ $contact->tel }}</p>
                        <p><strong>住所：</strong>{{ $contact->address }} {{ $contact->building }}</p>
                        <p><strong>お問い合わせの種類：</strong>{{ $contact->category->content }}</p>
                        <p><strong>内容：</strong>{{ $contact->detail }}</p>

                        <form method="POST" action="{{ route('admin.delete', $contact->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="modal__delete">削除</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </table>
        </div>
    </div>

</div>


@endsection

@section('js')
<script>
    document.querySelectorAll('.detail-button').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            document.getElementById(`modal-${id}`).classList.add('is-active');
        });
    });

    document.querySelectorAll('.modal__close').forEach(close => {
        close.addEventListener('click', () => {
            const id = close.dataset.id;
            document.getElementById(`modal-${id}`).classList.remove('is-active');
        });
    });
</script>
@endsection

