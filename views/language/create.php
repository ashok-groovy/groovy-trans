<?php
/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.3
 */

/* @var $this yii\web\View */
/* @var $model lajax\translatemanager\models\Language */

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('language', 'Create {modelClass}', [
    'modelClass' => 'Language',
]);
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
        </div>
    </div>
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
        <?= $this->render('_form', [
            'model' => $model
        ]) ?>
    </div>
</div>