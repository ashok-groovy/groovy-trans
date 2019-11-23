<?php
/**
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */

/* @var $this yii\web\View */
/* @var $newDataProvider \yii\data\ArrayDataProvider */
/* @var $oldDataProvider \yii\data\ArrayDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('language', 'Scanning project');
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
                            <div class="alert alert-success fade show" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">
                                    <?= Yii::t('language', '{n, plural, =0{No new entries} =1{One new entry} other{# new entries}} were added!', ['n' => $newDataProvider->totalCount]) ?>
                                </div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                    </button>
                                </div>
                            </div>

                            <?= $this->render('__scanNew', [
                                'newDataProvider' => $newDataProvider,
                            ]) ?>

                            <div class="alert alert-danger fade show" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">
                                <?= Yii::t('language', '{n, plural, =0{No entries} =1{One entry} other{# entries}} remove!', ['n' => $oldDataProvider->totalCount]) ?>
                                </div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                    </button>
                                </div>
                            </div>

                            <?= $this->render('__scanOld', [
                                'oldDataProvider' => $oldDataProvider,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>