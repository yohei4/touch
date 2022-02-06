@extends('layouts.app')
@section('title', '商品一覧')
@section('content')
    <ul class="subsub-menu">
        <li class="all subsub-menu__btn"><a href="" class="current">すべて<span class="count">（{{ 20 }}）</span></a></li>
        <li class="Publish subsub-menu__btn"><a href="" >公開済み<span class="count">（{{ 15 }}）</span></a></li>
        <li class="draft subsub-menu__btn"><a href="" >下書き<span>（{{ 0 }}）</span></a></li>
        <li class="trash subsub-menu__btn"><a href="">ゴミ箱<span>（{{ 2 }}）</span></a></li>
    </ul>
    <form action="" class="posts-filter">
        <div class="search-box">
            <input type="text" name="search_txt" id="search-txt" class="search-input form-control">
            <button type="submit" id="search-acition" name="search_acition" class="form-btn search-btn">商品の検索</button>
        </div>
        <div class="tablenav">
            <div class="actions-box">
                <div class="align-left__actions">
                    <select name="filter_date" id="" class="tablenav-select form-select"><option value="すべての日付">一括操作</option></select>
                    <button type="submit" id="do-action" name="do_action" class="form-btn">適用</button>
                </div>
                <div class="align-right__actions">
                    <select name="filter_date" id="filter-date" class="tablenav-select form-select"><option value="すべての日付">すべての日付</option></select>
                    <select name="filter_food" id="filter-food" class="tablenav-select form-select"><option value="すべての日付">商品名(指定なし)</option></select>
                    <select name="filter_money" id="filter-money" class="tablenav-select form-select"><option value="すべての日付">値段(指定なし)</option></select>
                    <select name="filter_category" id="filter-category" class="tablenav-select form-select"><option value="すべての日付">カテゴリー</option></select>
                    <button type="submit" id="filter-action" name="filter_action" class="form-btn">絞り込む</button>
                </div>
            </div>
            <div class="displaying-num"><span class="displaying-num__txt">0項目</span></div>
        </div>
    </form>
    <table class="food-list__table">
        <thead>
            <tr>
                <td class="check-column" scope="col"><input id="selectc-all-1" type="checkbox"></td>
                <th scope="col" id="food" class="manege-column column-food">商品名</th>
                <th scope="col" id="category" class="manege-column column-category">商品カテゴリー</th>
                <th scope="col" id="money" class="manege-column column-money">値段</th>
                <th scope="col" id="images" class="manege-column column-images">画像</th>
                <th scope="col" id="status" class="manege-column column-status">状態</th>
                <th scope="col" id="date" class="manege-column column-date">日付</th>
            </tr>
        </thead>
        <tbody class="the-list">
            <tr id="food-1" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-1" type="checkbox" name="chk_food[]" value="1"></th>
                <td class="column-food">
                    <strong><a href="">げんこつハンバーグ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">4</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-2" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-2" type="checkbox" name="chk_food[]" value="2"></th>
                <td class="column-food">
                    <strong><a href="">おにぎりハンバーグ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">980円</td>
                <td class="column-images">3</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
            <tr id="food-3" class="category-1 status-publish">
                <th scope="row" class="check-column"><input id="row-selectc-3" type="checkbox" name="chk_food[]" value="3"></th>
                <td class="column-food">
                    <strong><a href="">よくばりコンビ</a></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="">編集</a></span>
                        <span class="trash"><a href="">ゴミ箱へ移動</a></span>
                        <span class="view"><a href="">表示</a></span>
                    </div>
                </td>
                <td class="column-category">鉄板料理</td>
                <td class="column-money">1080円</td>
                <td class="column-images">2</td>
                <td class="column-status">公開済み</td>
                <td class="column-date">2022/4/21 15:15</td>
            </tr>
        </tbody>
    </table>
@endsection
