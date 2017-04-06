<?php
/**
 * Author: dungang
 * Date: 2017/4/5
 * Time: 10:01
 */

namespace dungang\headroom;


use yii\base\Widget;
use yii\helpers\Json;

class HeadRoom extends Widget
{

    public $closeDefaultCss = false;

    public $options = [
        'offset' => 205,
        'tolerance' => [
            'down' => 10,
            'up' => 20
        ]
    ];

    public function run()
    {
        $view = $this->getView();
        HeadRoomAsset::register($view);
        $options = $this->options ? Json::encode($this->options) : '{}';
        $view->registerJs("(function(){new Headroom(document.getElementById('$this->id'),$options).init();})();");
        if (!$this->closeDefaultCss) {
            $view->registerCss("
            .headroom {
                will-change: transform;
                transition: transform .25s ease-in-out;
            }
            .headroom--pinned {
                transform: translateY(0%);
            }
            .headroom--unpinned {
                transform: translateY(-105%);
            }
        ");
        }
        return null;
    }
}