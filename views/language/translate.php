<?php

/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use lajax\translatemanager\helpers\Language;
use lajax\translatemanager\models\Language as Lang;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $language_id string */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel lajax\translatemanager\models\searches\LanguageSourceSearch */
/* @var $searchEmptyCommand string */

$this->title = Yii::t('language', 'Translation into {language_id}', ['language_id' => $language_id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('language', 'Languages'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title"><?= Html::encode($this->title) ?></h3>
                <?php
                    echo Breadcrumbs::widget([
                        'tag'		=>'div', // container tag
                        'itemTemplate' => ' <span class="kt-subheader__breadcrumbs-separator"></span> {link}', // template for all links
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options'=>["class"=>"kt-subheader__breadcrumbs"],
                        'activeItemTemplate'	=>'<span class="kt-subheader__breadcrumbs-separator"></span> <span class="inac">{link}</span>',
                    ]);
                ?>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                               Scan
                            </h3>
                        </div>
                    </div>
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <?= Html::hiddenInput('language_id', $language_id, ['id' => 'language_id', 'data-url' => Yii::$app->urlManager->createUrl('/translatemanager/language/save')]); ?>
                            <div id="translates" class="<?= $language_id ?>">
                                <?php
                                Pjax::begin([
                                    'id' => 'translates',
                                ]);
                                $form = ActiveForm::begin([
                                    'method' => 'get',
                                    'id' => 'search-form',
                                    'enableAjaxValidation' => false,
                                    'enableClientValidation' => false,
                                ]);
                                echo $form->field($searchModel, 'source')->dropDownList(['' => Yii::t('language', 'Original')] + Lang::getLanguageNames(true))->label(Yii::t('language', 'Source language'));
                                ActiveForm::end();
                                echo GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        [
                                            'format' => 'raw',
                                            'filter' => Language::getCategories(),
                                            'attribute' => 'category',
                                            'filterInputOptions' => ['class' => 'form-control', 'id' => 'category'],
                                        ],
                                        [
                                            'format' => 'raw',
                                            'attribute' => 'message',
                                            'filterInputOptions' => ['class' => 'form-control', 'id' => 'message'],
                                            'label' => Yii::t('language', 'Source'),
                                            'content' => function ($data) {
                                                return Html::textarea('LanguageSource[' . $data->id . ']', $data->source, ['class' => 'form-control source', 'readonly' => 'readonly']);
                                            },
                                        ],
                                        [
                                            'format' => 'raw',
                                            'attribute' => 'translation',
                                            'filterInputOptions' => [
                                                'class' => 'form-control',
                                                'id' => 'translation',
                                                'placeholder' => $searchEmptyCommand ? Yii::t('language', 'Enter "{command}" to search for empty translations.', ['command' => $searchEmptyCommand]) : '',
                                            ],
                                            'label' => Yii::t('language', 'Translation'),
                                            'content' => function ($data) {
                                                return Html::textarea('LanguageTranslate[' . $data->id . ']', $data->translation, ['class' => 'form-control translation', 'data-id' => $data->id, 'tabindex' => $data->id]);
                                            },
                                        ],
                                        [
                                            'format' => 'raw',
                                            'label' => Yii::t('language', 'Action'),
                                            'content' => function ($data) {
                                                return Html::button(Yii::t('language', 'Save'), ['type' => 'button', 'data-id' => $data->id, 'class' => 'btn btn-sm btn-success']);
                                            },
                                        ],
                                    ],
                                ]);
                                Pjax::end();
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>