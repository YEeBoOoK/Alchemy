<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/profile.css',
        'css/game.css',
        'css/fonts.css',
        'css/playingField.css',
        'css/animations.css',
        'css/media.css',
        'css/buttons.css',
        'css/elements.css',
        'css/style.css',
        'css/preloader.css',
        'css/admin.css',
    ];
    public $js = [
        'js/app.js',
        'js/preloader.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
