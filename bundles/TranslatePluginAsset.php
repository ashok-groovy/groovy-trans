<?php

namespace sagarp1992\groovytrans\bundles;

use yii\web\AssetBundle;

/**
 * Contains javascript files necessary for modify translations on the backend.
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
class TranslatePluginAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@lajax/translatemanager/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'javascripts/helpers.js',
        'javascripts/translate.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'sagarp1992\groovytrans\bundles\TranslationPluginAsset',
    ];
}
