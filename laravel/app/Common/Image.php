<?php

namespace App\Common;

use Illuminate\Support\Facades\Storage;
use App\Models\Restaurant;

class Image {

    /**
    * 画像保存処理
    * @param any $file
    * @param string $directory
    * @param string $file_name
    * @return string $path
    */
    public static function saveImage($file, $file_name, $directory = '')
    {
        $restaurant_id = auth()->user()->restaurant_id;

        // 画像をstorageに保存(ファイル名=logo.拡張子)
        return 'public/' . $file->storeAs('images/' . $restaurant_id, $directory + $file_name .  '.' . $file->extension(), 'public');
    }

    /**
    * 画像更新処理
    * @param any $file
    * @param string $directory
    * @param string $file_name
    * @return string $path
    */
    public static function updImage($file, $file_name, $directory = '')
    {
        // 画像保存
        return Image::saveImage($file, $file_name, $directory);
    }

    /**
    * 画像取得
    * @param string $path
    * @return string $path
    */
    public static function getImage($path)
    {
        // 初期値
        $file_base64 = '';
        $disk_name = 'local';
        $exists = Storage::disk($disk_name)->exists($path);

        if ($exists) {
            // ストレージから画像を取得
            $file = Storage::disk($disk_name)->get($path);

            // ファイルのMIMEを取得
            // $mime_type = mime_content_type($tmp_file_dir);

            // base64に変換(imgタグでの表示のため、[data:image/'mime_type;base64,data]の形)
            $file_base64 = 'data:image/jpeg;base64,' . base64_encode($file);
            // $file_base64 = base64_encode($file);
        } else {
            $file_base64 = '';
        }

        return $file_base64;
    }
}
