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
        <div class="create-form__item">
            <input class="create-form__item-input" type="text">
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>
    <form class="create-form">
        <div class="admin-table">
            <table class="admin-table__inner">
                <tr class="admin-table__row">
                    <th class="admin-table__header">姓名</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせ種別</th>
                    <th class="admin-table__header">''</th>

                </tr>
                @foreach ($categories as $admin)
                <tr class="admin-table__row">
                    <td class="admin-table__item">
                        <form class="update-form">
                            <div class="update-form__item">
                    <td>
                        <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                        <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                    </td>
                    <td>
                        <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly />
                    </td>
                    <td>
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                    <td>
                        <input type="text" name="category_ID" value="{{ $contact['category_ID'] }}" readonly />
                    </td>

                </tr>
                @endforeach
            </table>

            <div class="update-form__button">
                <button class="delete-form__button-submit" type="submit">詳細</button>
            </div>

        </div>
    </form>
</div>
@endsection