@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin__alert">
    @if (session('message'))
    <div class="admin__alert--success">
        {{ session('message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="admin__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="admin__content">
    <form class="create-form">
        <div class="header_random_search">
            <input type="text" name="random_search" placeholder="名前やメールアドレスを入力してください" />
        </div>
        <div class="header_gender_search">
            <select name="header_gender">
                <option value="" selected hidden>性別</option>
        </div>
        <div class="header_category_search">
            <select name="header_category">
                <option value="" selected hidden>お問い合わせ種別</option>
        </div>
        <div class=" create-form__button">
            <button class="create-form__button-submit" type="submit">検索</button>
            <!-- <button class="create-form__button-submit" type="submit">リセット</button> -->
        </div>
    </form>
    {{ $contacts->links('vendor.pagination.custom') }}
    <form class="create-form">
        <div class="admin-table">
            <table class="admin-table__inner">
                <tr class="admin-table__row">
                    <th class="admin-table__header">姓名</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせ種別</th>
                    <th class="admin-table__header">詳細</th>

                </tr>
                @foreach ($contacts as $contact)
                <form action="">
                    <input type="hidden" name="id" value="{{ $contact['id']}}" />
                    <input type="hidden" name="created_at" value="{{ $contact['created_at']}}" />
                    <tr class="admin-table__row">
                        <td>
                            <input type="text" name="fname" value="{{ $contact['first_name'] }}{{ $contact['last_name'] }}" readonly />
                        </td>
                        <td>
                            <input type="text" name="gender" value="{{ $contact['gender']}}" readonly />

                        </td>
                        <td>
                            <input type="email" name="email" value="{{ $contact['email']}}" readonly />
                        </td>
                        <td>
                            <input type="hidden" name="category_id" value="{{ $contact['category_id']}}" />
                            <input type="text" name="category_content" value="{{$contact->category->content}}" readonly />
                        </td>
                        <td>
                            <button class="delete-form__button-submit" type="submit">詳細</button>
                        </td>

                    </tr>
                </form>
                @endforeach
            </table>


        </div>
    </form>
</div>
@endsection