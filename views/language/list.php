<?php
/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use sagarp1992\groovytrans\models\Language;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel sagarp1992\groovytrans\models\searches\LanguageSearch */

$this->title = Yii::t('language', 'List of languages');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Languages</h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html"></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"></a>
                  </li>
                  <li class="breadcrumb-item active">
                  </li>
                </ol>
              </div>
              <div class="col s2 m6 l6">
                <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="<?= Url::toRoute(['create'], $schema = true)?>">
                <i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Add</span>
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
                                <?php
                                    Pjax::begin([
                                        'id' => 'languages',
                                    ]);
                                    echo GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            'language_id',
                                            'name_ascii',
                                            [
                                                'format' => 'raw',
                                                'filter' => Language::getStatusNames(),
                                                'attribute' => 'status',
                                                'filterInputOptions' => ['class' => 'form-control', 'id' => 'status'],
                                                'label' => Yii::t('language', 'Status'),
                                                'content' => function ($language) {
                                                    return Html::activeDropDownList($language, 'status', Language::getStatusNames(), ['class' => 'status', 'id' => $language->language_id, 'data-url' => Yii::$app->urlManager->createUrl('/translatemanager/language/change-status')]);
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
                                                            'title' => Yii::t('language', 'Translate'),'class'=>'btn btn-lg btn-success',
                                                            'data-pjax' => '0',
                                                        ]);
                                                    },
                                                    'view'=>function ($url) {
                                                        return Html::a('<i class="material-icons">search</i>', $url, ['class'=>'btn btn-lg btn-blue']);
                                                    },
                                                    'update'=>function ($url) {
                                                        return Html::a('<i class="material-icons">edit</i>', $url, ['class'=>'btn btn-lg btn-warning']);
                                                    },
                                                    'delete' => function($url, $model) {
                                                        return Html::a('<i class="material-icons">delete</i>', ['delete', 'id' => $model->language_id], ['title' => 'Delete', 'class' => 'btn btn-lg btn-warning', 'data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.', 'method' => 'post', 'data-pjax' => false],]);
                                                    }
                                                ],
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