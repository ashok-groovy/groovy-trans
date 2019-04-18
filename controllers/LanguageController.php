<?php

namespace sagarp1992\groovytrans\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use sagarp1992\groovytrans\models\Language;

/**
 * Controller for managing multilinguality.
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
class LanguageController extends Controller
{
    public $enableCsrfValidation = false; 
    /**
     * @var \sagarp1992\groovytrans\Module TranslateManager module
     */
    public $module;

    /**
     * @inheritdoc
     */
    public $defaultAction = 'list';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['list', 'change-status', 'optimizer', 'scan', 'translate', 'save', 'dialog', 'message', 'view', 'create', 'update', 'delete', 'delete-source', 'import', 'export'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['list', 'change-status', 'optimizer', 'scan', 'translate', 'save', 'dialog', 'message', 'view', 'create', 'update', 'delete', 'delete-source', 'import', 'export'],
                        'roles' =>['@']
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'list' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\ListAction',
            ],
            'change-status' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\ChangeStatusAction',
            ],
            'optimizer' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\OptimizerAction',
            ],
            'scan' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\ScanAction',
            ],
            'translate' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\TranslateAction',
            ],
            'save' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\SaveAction',
            ],
            'dialog' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\DialogAction',
            ],
            'message' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\MessageAction',
            ],
            'view' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\ViewAction',
            ],
            'create' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\CreateAction',
            ],
            'update' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\UpdateAction',
            ],
            'delete' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\DeleteAction',
            ],
            'delete-source' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\DeleteSourceAction',
            ],
            'import' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\ImportAction',
            ],
            'export' => [
                'class' => 'sagarp1992\groovytrans\controllers\actions\ExportAction',
            ],
        ];
    }

    /**
     * Finds the Language model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $id
     *
     * @return Language the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Language::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Returns an ArrayDataProvider consisting of language elements.
     *
     * @param array $languageSources
     *
     * @return ArrayDataProvider
     */
    public function createLanguageSourceDataProvider($languageSources)
    {
        $data = [];
        foreach ($languageSources as $category => $messages) {
            foreach ($messages as $message => $boolean) {
                $data[] = [
                    'category' => $category,
                    'message' => $message,
                ];
            }
        }

        return new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => false,
        ]);
    }
}
