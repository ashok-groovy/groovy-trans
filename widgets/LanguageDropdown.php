<?php

namespace lajax\translatemanager\widgets;
use Yii;
use yii\base\Widget;
use lajax\translatemanager\Module;
use lajax\translatemanager\models\Language;


/**
 * Widget that displays button for switching to translating mode.
 *
 * Simple example:
 *
 * ~~~
 * \ lajax\translatemanager\widgets\ToggleTranslate::widget();
 * ~~~
 *
 * Example for changing position:
 *
 * ~~~
 * \ lajax\translatemanager\widgets\ToggleTranslate::widget([
 *  'position' => \ lajax\translatemanager\widgets\ToggleTranslate::POSITION_TOP_RIGHT,
 * ]);
 * ~~~
 *
 * Example for changing skin:
 *
 * ~~~
 * \ lajax\translatemanager\widgets\ToggleTranslate::widget([
 *  'frontendTranslationAsset' => 'lajax\translatemanager\bundles\FrontendTranslationAsset',
 * ]);
 * ~~~
 *
 * Example for changing template and skin:
 *
 * ~~~
 * \ lajax\translatemanager\widgets\ToggleTranslate::widget([
 *  'template' => '<a href="javascript:void(0);" id="toggle-translate" class="{position}" data-language="{language}" data-url="{url}"><i></i> {text}</a><div id="translate-manager-div"></div>',
 *  'frontendTranslationAsset' => 'lajax\translatemanager\bundles\FrontendTranslationAsset',
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
