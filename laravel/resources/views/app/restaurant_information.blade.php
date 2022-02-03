@extends('layouts.app')
@section('title', '店舗情報')
@section('content')
    <div class="form-outer">
        <form action="{{ route('restaurant_information/update') }}" id="restaurant-information" class="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="restaurant_name">店舗名</label>
                    <span class="form-required"></span>
                </div>
                <input class="form-input form-control" type="text" name="restaurant_name" id="restaurant_name" value="{{ $restaurant->restaurant_name }}" placeholder="店舗名"/>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="postal_code">郵便番号</label>
                    <span class="form-required"></span>
                </div>
                <input class="form-input form-control" type="text" name="postal_code" id="postal_code" value="{{ $restaurant->postal_code }}" placeholder="郵便番号"/>
                <button class="ajaxzip3" type="button">郵便番号から住所取得</button>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="address_1">都道府県</label>
                    <span class="form-required"></span>
                </div>

                <select class="form-select form-control" name="address_1" id="address_1" placeholder="都道府県">
                    <option value=""></option>
                    @foreach($prefectures as $item)
                        <option value="{{ $item->name }}" {{ $restaurant->address_1 === $item->name ? "selected" : "" }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="address_2">市区町村</label>
                    <span class="form-required"></span>
                </div>
                <input class="form-input form-control" type="text" name="address_2" id="address_2" value="{{ $restaurant->address_2 }}" placeholder="市区町村"/>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="address_3">番地</label>
                    <span class="form-required"></span>
                </div>
                <input class="form-input form-control" type="text" name="address_3" id="address_3" value="{{ $restaurant->address_3 }}" placeholder="番地"/>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="address_4">建物名・部屋番号</label>
                </div>
                <input class="form-input form-control" type="text" name="address_4" id="address_4" value="{{ $restaurant->address_4 }}" placeholder="建物名・部屋番号"/>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="tel">電話番号</label>
                    <span class="form-required"></span>
                </div>
                <input class="form-input form-control" type="text" name="tel" id="tel" value="{{ $restaurant->tel }}" placeholder="電話番号"/>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="comment">店舗の説明</label>
                </div>
                <textarea class="form-textarea form-control" cols="" rows="5" name="comment" id="comment" value="{{ $restaurant->comment }}" placeholder="店舗の説明"></textarea>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="table_count">テーブル数</label>
                    <span class="form-required"></span>
                </div>
                <input class="form-input form-control" type="text" name="table_count" id="table_count" value="{{ $restaurant->table_count }}" placeholder="テーブル数"/>
            </div>

            <div class="form-item">
                <div class="form-label__outer">
                    <label class="form-label" for="table_count">ロゴ写真</label>
                </div>
                <div class="react-form__file"></div>
            </div>

            <div class="form-item">
                <button class="form-btn" type="submit">変更を更新</button>
            </div>
        </form>
    </div>
@endsection
