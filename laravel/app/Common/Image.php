<?php

namespace App\Common;

use Illuminate\Support\Facades\Storage;
use App\Models\Restaurant;

class Image {

    /**
    * 画像保存処理
    * @param any $file
    * @param string $file_name
    * @return string $path
    */
    public static function saveImage($file, $file_name)
    {
        $restaurant_id = auth()->user()->restaurant_id;

        // 画像をstorageに保存(ファイル名=logo.拡張子)
        return 'public/' . $file->storeAs('images/' . $restaurant_id, $file_name .  '.' . $file->extension(), 'public');
    }

    /**
    * 画像更新処理
    * @param RestaurantRequest $request
    * @param string $file_name
    * @param string $saved_image_name
    * @return string $path
    */
    public static function updImage($request, $file_name, $saved_image_name)
    {

        $file = null;
        $path = '';
        $disk_name = 'local';
        $saved_image = $request->input($saved_image_name);

        // ファイルがアップロードに成功しているかを確認
        $file = $request->file($file_name);

        // ロゴを保存
        $path = Image::saveImage($file, $file_name);

        return $path;
    }
}
