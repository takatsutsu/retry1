@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="main_head">
    <h2>Confirm</h2>
</div>
<form class="form" action="/contact" method="post">
    @csrf
    <div class="form_main">
        <table class="form_table" border="1">
            <tr>
                <th>お名前<span>※</span></th>
                <td>
                    <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                    <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                </td>
            </tr>
            <!-- <div class="form__error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error">
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div> -->
            <tr>
                <th>
                    性別<span></span>
                </th>
                <td>
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
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
            </tr>

            <tr>
                <th>
                    メールアドレス<span></span>
                </th>
                <td>
                    <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                </td>
            </tr>
            <!-- <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div> -->

            <tr>
                <th>電話番号<span></span></th>
                <td><input type="tel" name="tell" value="{{ $contact['tell'] }}" readonly /></td>
            </tr>
            <!-- <div class="form__error">
                        @error('tel')
                        {{ $message }}
                        @enderror -->

            <tr>
                <th>住所<span></span></th>
                <td><input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                </td>
            </tr>

            <!-- <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div> -->
            <tr>
                <th>建物名</th>
                <td>
                    <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                </td>
            </tr>

            <tr>
                <th>お問い合わせの種類<span></span></th>
                <td>
                    <input type="text" name="category_content" value="{{ $category->content }}" readonly />
                    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                </td>
            </tr>
            <!-- <div class="form__error">
                        @error('inqcate')
                        {{ $message }}
                        @enderror -->
    </div>
    <tr>
        <th>お問い合わせ内容<span>※</span></th>
        <td>
            <textarea name="detail" cols="50" rows="5" readonly>{{ $contact['detail']}}</textarea>
        </td>
    </tr>
    <!-- <div class="form__error">
                @error('detail')
                {{ $message }}
                @enderror -->
    </div>
    </table>




    <div class="form_btn">
        <input type="submit" value="送信" />
    </div>

</form>

@endsection