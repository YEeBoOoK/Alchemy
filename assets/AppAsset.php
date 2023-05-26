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
        'css/admin.css',
        'css/animations.css',
        'css/buttons.css',
        'css/cookie.css',
        'css/elements.css',
        'css/fonts.css',
        // 'css/media.css',
        'css/playingField.css',
        'css/preloader.css',
        'css/profile.css',
        'css/site.css',
        'css/style.css',
    ];
    public $js = [
        'js/app.js',
        'js/preloader.js',
        'js/cookie.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
