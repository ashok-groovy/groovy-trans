<?php
/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.3
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model lajax\translatemanager\models\Language */

$this->title = $model->name;
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
                <h5 class="breadcrumbs-title mt-0 mb-0"><?=$this->title;?></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item">
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
                                    <p>
                                        <?= Html::a(Yii::t('language', 'Update'), ['update', 'id' => $model->language_id], ['class' => 'btn btn-primary']) ?>
                                        <?=
                                        Html::a(Yii::t('language', 'Delete'), ['delete', 'id' => $model->language_id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => Yii::t('language', 'Are you sure you want to delete this item?'),
                                                'method' => 'post',
                                            ],
                                        ])
                                        ?>
                                    </p>

                                    <?=
                                    DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            'language_id',
                                            'language',
                                            'country',
                                            'name',
                                            'name_ascii',
                                            [
                                                'label' => Yii::t('language', 'Status'),
                                                'value' => $model->getStatusName(),
                                            ],
                                            [
                                                'label' => Yii::t('language', 'Translation status'),
                                                'value' => $model->getGridStatistic() . '%',
                                            ],
                                        ],
                                    ])
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
  