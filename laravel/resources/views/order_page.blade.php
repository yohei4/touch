<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app/style.css') }}">
    <title>注文ページ</title>
</head>

<body>
    <form method="post" action="{{ route('confirm_page') }}">
        @csrf
        <div class="tab-wrap">
            @foreach($types as $type)
                <div class="tab-wrap">
                    <input id="TAB-0{{ $type->id }}" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-0{{ $type->id }}">{{ $type->name }}</label>
                    <div class="tab-content">
                    <input type="hidden" name="table_number" value="{{ $table_number }}">
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">
                        @foreach($foods as $food)
                            @if ($food->type_id == $type->id)
                                <ul class="plan-content">
                                    <div class="plan-div">
                                        <li class="plan-item">
                                            <h4 class="plan-title">{{ $food->name }}</h4>
                                            <p style="padding-top: 5px;padding-left: 20px;">{{ $food->price }}円</p>
                                            <p style="padding-top: 5px;padding-left: 20px;">個数：</p>
                                            <input id="food-id" type="hidden" name="orders[{{$food->type_id .'_'. $food->id}}][food_id]" value="{{ $food->id }}">
                                            <input id="type-id" type="hidden" name="orders[{{$food->type_id .'_'. $food->id}}][type_id]" value="{{ $type->id }}">
                                            <input id="count" class="order_post" type="number" name="orders[{{$food->type_id .'_'. $food->id}}][count]" min="0" value="0">
                                        </li>
                                    </div>
                                </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <input class="confirmSubmit" type="submit" name="confirmSubmit" value="注文確認画面へ">
    </form>
    <p style="color: red;text-align: center;">{{ session('flash_message') }}</p>
    <div class="total">
        <form method="post" action="{{ route('total_page') }}">
            @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">
            <input type="hidden" name="table_number" value="{{ $table_number }}">
            <input type="submit" value="現在の注文状況">
        </form>
    </div>
</body>

</html>