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

/* @var $this \yii\web\View */
/* @var $language_id string */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel lajax\translatemanager\models\searches\LanguageSourceSearch */
/* @var $searchEmptyCommand string */

$this->title = Yii::t('language', 'Translation into {language_id}', ['language_id' => $language_id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('language', 'Languages'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Translation</h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"></a>
                  </li>
                  <li class="breadcrumb-item">
                  </li>
                  <li class="breadcrumb-item active">
                  </li>
                </ol>
              </div>
              <div class="col s2 m6 l6">
                <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="<?= Url::toRoute(['list'], $schema = true)?>">
                <i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl"><< Back</span>
                </a>                            
              </div>
            </div>
          </div>
    </div>  
    <div class="col s12">
        <div class="container">
            <div class="section">               
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div id="icon-sizes" class="card card-default">
                            <div class="card-content">
                                <div class="row">
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
                                                        return Html::button(Yii::t('language', 'Save'), ['type' => 'button', 'data-id' => $data->id, 'class' => 'btn btn-lg btn-success']);
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
        </div>
    </div>
 </div>