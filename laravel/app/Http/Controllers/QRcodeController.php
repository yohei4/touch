<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class QRcodeController extends Controller
{
    /**
    *
    *
    * @param int $id
    * @return array 検索結果
    */
    public function tableCount()
    {
        //複合主キーから店のIDを取得
        $id = Auth::id();
        $restaurant_id = explode('|', $primarykey, 2)[0];

        //テーブル数を取得
        $table_count = Restaurant::where('id', $restaurant_id)->value('table_count');

        if ($table_count != null) {
            for ($table_number = 1; $table_number <= $table_count; $table_number++) {
                $protocol_host_URL = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] ;
                $url = $protocol_host_URL."/order_page/restaurant_id=" . $restaurant_id . "&table=" . $table_number;
                $qrcode_image = QrCode::size(100)->generate($url);
                $QRcode = array(
                    'count' => $table_number,
                    'url' => $url,
                    'qrcode_image' => $qrcode_image
                );
                $qrcode_datas[] = $QRcode;
            };
            return view(
                'QRcode_page',
                ['qrcode_datas' => $qrcode_datas]
            );
        }
        return view('tableCount');
    }

    /**
    *
    *
    * @param int $id
    * @return array 検索結果
    */
    public function tableCountUp()
    {
        return view('tableCount');
    }

    public function store()
    {
        $table_count = $_POST['tableCount'];
        $primarykey = Auth::id();
        $restaurant_id = explode('|', $primarykey, 2)[0];
        $qrcode_datas = null;

        // QRコードをテーブル数だけ制作
        for ($table_number = 1; $table_number <= $table_count; $table_number++) {
            $protocol_host_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] ;
            $url = $protocol_host_url."/order_page/restaurant_id=" . $restaurant_id . "&table=" . $table_number;
            $qrcode_image = QrCode::size(100)->generate($url);
            $QRcode = array(
                'count' => $table_number,
                'url' => $url,
                'qrcode_image' => $qrcode_image
            );
            $qrcode_datas[] = $QRcode;
        };
        // テーブル数をアカウントに登録
        Restaurant::where('id', $restaurant_id)->update(['table_count' => $table_count]);
        return view(
            'QRcode_page',
            ['qrcode_datas' => $qrcode_datas]
        );
    }

    /**
    *
    *
    * @param int $id
    * @return array 検索結果
    */
    public function save()
    {

    }
}
