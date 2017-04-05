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

    public $options;

    public function run()
    {
        $options = $this->options ? Json::encode($this->options):'';
        $this->getView()->registerJs("$('#$this->id').headroom($options)");
        $this->getView()->registerCss("
            .headroom {
                will-change: transform;
                transition: transform 200ms linear;
            }
            .headroom--pinned {
                transform: translateY(0%);
            }
            .headroom--unpinned {
                transform: translateY(-100%);
            }
        ");
        return null;
    }
}