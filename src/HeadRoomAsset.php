<?php
/**
 * Author: dungang
 * Date: 2017/4/5
 * Time: 9:58
 */

namespace dungang\headroom;


use yii\web\AssetBundle;

class HeadRoomAsset extends AssetBundle
{

    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        $this->js = ['headroom.min.js'];
    }
}