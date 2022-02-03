@extends('layouts.app')
@section('title', '商品一覧')
@section('content')
    <div class="subsub-menu">
        <div class="subsub-menu__btnbox">
            <button type="button" id="all" class="subsub-menu__btn"><span>すべて</span><span>（{{ 20 }}）</span></button>
            <button type="button" id="Published" class="subsub-menu__btn"><span>公開済み</span><span>（{{ 15 }}）</span></button>
            <button type="button" id="draft" class="subsub-menu__btn"><span>下書き</span><span>（{{ 0 }}）</span></button>
            <button type="button" id="trash" class="subsub-menu__btn"><span>ゴミ箱</span><span>（{{ 2 }}）</span></button>
        </div>
        <div class="subsub-menu__searchbox">
            <form action="" class="form-search">
                <input type="text" name="search_txt" id="search_txt" class="search-input form-control">
                <button type="submit" name="search_submit" class="search-btn">商品の検索</button>
            </form>
        </div>
    </div>
@endsection
