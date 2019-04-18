<?php
/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */

/* @var $this \yii\web\View */
/* @var $newDataProvider \yii\data\ArrayDataProvider */

$this->title = Yii::t('language', 'Optimise database');
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
                <h5 class="breadcrumbs-title mt-0 mb-0">Optimizer</h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item">
                  </li>
                  <li class="breadcrumb-item">
                  </li>
                  <li class="breadcrumb-item active">
                  </li>
                </ol>
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
                                    <div id="w2-info" class="alert-info alert fade in">
                                        <?= Yii::t('language', '{n, plural, =0{No entries} =1{One entry} other{# entries}} were removed!', ['n' => $newDataProvider->totalCount]) ?>
                                    </div>

                                    <?= $this->render('__scanNew', [
                                        'newDataProvider' => $newDataProvider,
                                    ]) ?>

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