<?php

namespace App\Consts;

class Menu
{
    public const SUMMARY_MEYU = [
        ['id' => 'summary-btn-1', 'name' => 'ホーム', 'className' => 'fas fa-home', 'sectionId' => 'home'],
        ['id' => 'summary-btn-2', 'name' => '在庫', 'className' => 'fas fa-boxes', 'sectionId' => 'stock'],
        ['id' => 'summary-btn-3', 'name' => '帳票', 'className' => 'fab fa-wpforms', 'sectionId' => 'form'],
        ['id' => 'summary-btn-4', 'name' => '基本情報', 'className' => 'fas fa-cogs', 'sectionId' => 'info'],
    ];

    public const DETAILS_MENU = [
        'home' => [
            ['id' => 'home-btn-1', 'name' => '混み具合', 'url' => '', 'summaryId' => '1'],
            ['id' => 'home-btn-2', 'name' => '受注ページ', 'url' => '', 'summaryId' => '1'],
            ['id' => 'home-btn-3', 'name' => '売れ行き管理', 'url' => '', 'summaryId' => '1'],
            ['id' => 'home-btn-4', 'name' => 'お客様ページ管理', 'url' => '', 'summaryId' => '1'],
        ],
        'stock' => [
            ['id' => 'stock-btn-2', 'name' => '在庫管理', 'url' => '', 'summaryId' => '2'],
            ['id' => 'stock-btn-3', 'name' => '仕入れ管理', 'url' => '', 'summaryId' => '2'],
        ],
        'form' => [
            ['id' => 'form-btn-1', 'name' => '帳票', 'url' => '', 'summaryId' => '3'],
            ['id' => 'form-btn-2', 'name' => 'QRコード印刷', 'url' => '', 'summaryId' => '3'],
        ],
        'info' => [
            ['id' => 'info-btn-1', 'name' => '商品登録', 'url' => '', 'summaryId' => '4'],
            ['id' => 'info-btn-2', 'name' => '商品種別登録', 'url' => '', 'summaryId' => '4'],
            ['id' => 'info-btn-3', 'name' => '店舗情報', 'url' => '', 'summaryId' => '4'],
            ['id' => 'info-btn-4', 'name' => 'テーブル数登録', 'url' => '', 'summaryId' => '4'],
            ['id' => 'info-btn-5', 'name' => '管理者登録', 'url' => '', 'summaryId' => '4'],
        ],
    ];
}
