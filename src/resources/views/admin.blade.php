@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="main_head">
    <h2>Admin</h2>
</div>
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
<d class="admin__content">
    <div class="header_search">
        <form class="header_search_form" action="/search" method="get">
            @csrf
            <div>
                <input type="text" name="random_search" placeholder="名前やメールアドレスを入力してください" />
            </div>
            <div>
                <p>
                    <select name="gender_search">
                        <option value="" placeholder="性　別">性　別</option>
                        <option value="1">男　性</option>
                        <option value="2">女　性</option>
                        <option value="3">その他</option>
                    </select>
                </p>
            </div>
            <div>
                <p>
                    <select name="category_search">
                        <option value="" selected hidden>お問い合わせの種類を選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ?  : '' }}>
                            {{
                $category->content }}
                        </option>
                        @endforeach
                    </select>
                </p>
            </div>
            <div>
                <input class="date_search" type="date" name="date_search" value="{{request('date')}}">
            </div>

            <div>
                <p>
                    <button class="search-form__search-submit" type="submit">検索</button>
                    <button class="search-form__reset-submit" type="submit" name="reset">リセット</button>
                    <!-- <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset"> -->
                </p>
            </div>
        </form>
    </div>

    <!-- @foreach($contacts as $contact) -->
    <!-- <p class="page_p">{{ $contact->name }}</p> -->
    <!-- @endforeach -->
    {{ $contacts->links('vendor.pagination.custom')}}

    <form class="create-form">
        <div class="admin-table">
            <table class="admin-table__inner">
                <tr class="admin-table__row">
                    <th class="admin-table__header">姓名</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせ種別</th>
                    <th class="admin-table__header">登録日</th>
                    <th class="admin-table__header">詳細</th>

                </tr>
                @foreach ($contacts as $contact)
                <form action="">
                    <input type="hidden" name="id" value="{{ $contact->id}}" />
                    <input type="hidden" name="updated_at" value="{{ $contact->updated_at}}" />
                    <input type="hidden" name="detail" value="{{ $contact->detail}}" />
                    <tr class="admin-table__row">
                        <td>
                            <input type="text" name="fname" value="{{ $contact->first_name}}{{ $contact->last_name }}" readonly />
                        </td>
                        <td>
                            <input type="hidden" name="gender" value="{{ $contact->gender}}" readonly />
                            <?php
                            if ($contact['gender'] == '1') {
                                $gender_name = '男性';
                            } else if ($contact['gender'] == '2') {
                                $gender_name = '女性';
                            } else if ($contact['gender'] == '3') {
                                $gender_name = 'その他';
                            }
                            ?>
                            <input type="text" name="gender_name" value="{{ $gender_name}}" readonly />

                        </td>
                        <td>
                            <input type="email" name="email" value="{{ $contact->email}}" readonly />
                        </td>
                        <td>
                            <input type="hidden" name="category_id" value="{{ $contact->category_id}}" />
                            <input type="text" name="category_content" value="{{$contact->category->content}}" readonly />
                        </td>


                        <td>
                            <input type="datetime" name="crated_at" value="{{$contact->created_at}}" readonly />
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