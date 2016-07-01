<?php

namespace WondersLabCorporation\UnlimitedNumber;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Asset extends AssetBundle
{
    public $js = [
        'unlimited-number-input.js',
    ];
    public $css = [
        'unlimited-number-input.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/assets';
        parent::init();
    }
}
