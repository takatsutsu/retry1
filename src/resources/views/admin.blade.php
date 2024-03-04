@extends('layouts.app')

<style>
    th {
        background-color: #289ADC;
        color: white;
        padding: 5px 40px;
    }

    tr:nth-child(odd) td {
        background-color: #FFFFFF;
    }

    td {
        padding: 25px 40px;
        background-color: #EEEEEE;
        text-align: center;
    }

    svg.w-5.h-5 {
        /*paginateメソッドの矢印の大きさ調整のために追加*/
        width: 30px;
        height: 30px;
    }
</style>
@section('title', 'index.blade.php')

@section('content')
<table>
    <tr>
        <th>Data</th>
    </tr>
    @foreach ($authors as $author)
    <tr>
        <td>
            {{$author->getDetail()}}
        </td>
    </tr>
    @endforeach
</table>
{{ $authors->links() }}
@endsection

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
            <input class="create-form__item-input" type="text" name="random">
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">検索</button>
            <!-- <button class="create-form__button-submit" type="submit">リセット</button> -->
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
                        <?php
                        if ($contact['gender'] == '1') {
                            echo '男性';
                        } else if ($contact['gender'] == '2') {
                            echo '女性';
                        } else if ($contact['gender'] == '3') {
                            echo 'その他';
                        }
                        ?>
                    </td>
                    <td>
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                    <td>
                        <input type="hidden" name="category_ID" value="{{ $contact['category_ID'] }}" />
                        <input type="text" name="category_content" value="{{ $category->content }}" readonly />
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