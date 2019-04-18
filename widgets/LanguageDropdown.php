<?php

namespace sagarp1992\groovytrans\widgets;
use Yii;
use yii\base\Widget;
use sagarp1992\groovytrans\Module;
use sagarp1992\groovytrans\models\Language;


/**
 * Widget that displays button for switching to translating mode.
 *
 * Simple example:
 *
 * ~~~
 * \sagarp1992\groovytrans\widgets\ToggleTranslate::widget();
 * ~~~
 *
 * Example for changing position:
 *
 * ~~~
 * \sagarp1992\groovytrans\widgets\ToggleTranslate::widget([
 *  'position' => \sagarp1992\groovytrans\widgets\ToggleTranslate::POSITION_TOP_RIGHT,
 * ]);
 * ~~~
 *
 * Example for changing skin:
 *
 * ~~~
 * \sagarp1992\groovytrans\widgets\ToggleTranslate::widget([
 *  'frontendTranslationAsset' => 'sagarp1992\groovytrans\bundles\FrontendTranslationAsset',
 * ]);
 * ~~~
 *
 * Example for changing template and skin:
 *
 * ~~~
 * \sagarp1992\groovytrans\widgets\ToggleTranslate::widget([
 *  'template' => '<a href="javascript:void(0);" id="toggle-translate" class="{position}" data-language="{language}" data-url="{url}"><i></i> {text}</a><div id="translate-manager-div"></div>',
 *  'frontendTranslationAsset' => 'sagarp1992\groovytrans\bundles\FrontendTranslationAsset',
 * ]);
 * ~~~
 *
 * @author Lajos Molnar <lajax.m@gmail.com>
 *
 * @since 1.0
 */
class LanguageDropdown extends Widget
{
    
    public function run()
    {
       $Url    =  \yii\helpers\Url::to(['site/change-language'], $schema = true);
       return   '<form action ="'.$Url.'" method="POST">
                    <input type="hidden" name="'.Yii::$app->request->csrfParam.'" value="'.Yii::$app->request->csrfToken.'" />'                    
                    .\yii\helpers\Html::dropDownList('lang_id', Yii::$app->language,\yii\helpers\ArrayHelper::map(Language::find()->where(['status'=>1])->all(), 'language_id', 'name')
                    ,['onchange'=>"this.form.submit();"]).
                '</form>';
    }
}
