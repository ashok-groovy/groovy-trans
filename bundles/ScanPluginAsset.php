<?php

namespace sagarp1992\groovytrans\bundles;

use yii\web\AssetBundle;

/**
 * Contains javascript files necessary for message scan on the backend.
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.4
 */
class ScanPluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@lajax/translatemanager/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'javascripts/scan.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'sagarp1992\groovytrans\bundles\TranslationPluginAsset',
    ];
}
