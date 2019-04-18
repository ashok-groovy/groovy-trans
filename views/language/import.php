<?php

use sagarp1992\groovytrans\models\ImportForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ImportForm */

$this->title = Yii::t('language', 'Import');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Import Translation</h5>
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
                                            <?php $form = ActiveForm::begin([
                                                'options' => [
                                                    'enctype' => 'multipart/form-data',
                                                ],
                                            ]); ?>

                                            <?= $form->field($model, 'importFile')->fileInput() ?>

                                            <div class="form-group">
                                                <?= Html::submitButton(Yii::t('language', 'Import'), ['class' => 'btn btn-primary']) ?>
                                            </div>

                                            <?php ActiveForm::end(); ?>
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