<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app/style.css') }}">
    <title>商品登録ページ</title>
</head>

<body>
    <ul style="color: red;">
        @if ($errors->has('type'))
        <li>{{ $errors->first('type') }}</li>
        @endif
        @if ($errors->has('name'))
        <li>{{ $errors->first('name') }}</li>
        @endif
        @if ($errors->has('price'))
        <li>{{ $errors->first('price') }}</li>
        @endif
    </ul>
    <h1>商品登録</h1>
    <table>
        <tr>
            <th></th>
            <th>種類名</th>
            <th>商品名</th>
            <th>価格</th>
        </tr>
        @if(isset( $foods ))
        @foreach( $foods as $food )
        <tr>
            <td>{{ $food['row'] }}</td>
            <td>{{ $food['type_name'] }}</td>
            <td>{{ $food['food_name'] }}</td>
            <td>{{ $food['price'] }}</td>
            @endforeach
            @endif
        </tr>
    </table>
    <form action="{{ route('food_store') }}" method="post">
        @csrf
        <div class="contents-box">
            <label>種類</label><br>
            <input name="type" type="text" list="type_example" autocomplete="off"><br>
            <datalist id="type_example">
                @foreach ( $types as $type )
                <option value="{{ $type->name }}"></option>
                @endforeach
            </datalist>
        </div>
        <div class="contents-box">
            <label>商品名</label><br>
            <input name="name" type="text" autocomplete="off" value=""><br>
        </div>
        <div class="contents-box" style="margin-bottom: 10px;">
            <label>価格</label><br>
            <input name="price" type="number" autocomplete="off" value=""><br>
        </div>
        <button type="submit">登録</button>
    </form>
    @if(Session::has('name'))
    <div>
        <p style="color: red;text-align: center;"><span class="sessionMark">【{{ session('type') }}】 【{{ session('name') }}】 【{{ session('amount') }}円】</span> の登録が完了しました</p>
    </div>
    @endif
</body>

</html>