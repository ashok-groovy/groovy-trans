<?php
/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use lajax\translatemanager\models\Language;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel lajax\translatemanager\models\searches\LanguageSearch */

$this->title = Yii::t('language', 'List of languages');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title"><?= Html::encode($this->title) ?></h3>
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
                                All Users
                            </h3>
                        </div>
                    </div>
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <?php
                                Pjax::begin([
                                    'id' => 'languages',
                                ]);
                                echo GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        // ['class' => 'yii\grid\SerialColumn'],
                                        // 'language_id',
                                        'name_ascii',
                                        [
                                            'format' => 'raw',
                                            'filter' => Language::getStatusNames(),
                                            'attribute' => 'status',
                                            'filterInputOptions' => ['class' => 'form-control', 'id' => 'status'],
                                            'label' => Yii::t('language', 'Status'),
                                            'content' => function ($language) {
                                                return Html::activeDropDownList($language, 'status', Language::getStatusNames(), ['class' => 'form-control status', 'id' => $language->language_id, 'data-url' => Yii::$app->urlManager->createUrl('/translatemanager/language/change-status')]);
                                            },
                                        ],
                                        [
                                            'format' => 'raw',
                                            'attribute' => Yii::t('language', 'Statistic'),
                                            'content' => function ($language) {
                                                return '<span class="statistic"><span style="width:' . $language->gridStatistic . '%"></span><i>' . $language->gridStatistic . '%</i></span>';
                                            },
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => '{translate} {view} {update} {delete}',
                                            'header'=>'Action',
                                            'buttons' => [
                                                'translate' => function ($url, $model, $key) {
                                                    return Html::a('Translate', ['language/translate', 'language_id' => $model->language_id], [
                                                        'title' => Yii::t('language', 'Translate'),'class'=>'btn btn-sm btn-success',
                                                        'data-pjax' => '0',
                                                    ]);
                                                },
                                            ],
                                        ],
                                    ],
                                ]);
                                Pjax::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>