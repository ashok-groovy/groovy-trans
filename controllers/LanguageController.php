<?php

namespace lajax\translatemanagercontrollers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use lajax\translatemanagermodels\Language;

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
     * @var \lajax\translatemanagerModule TranslateManager module
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
                'class' => 'lajax\translatemanagercontrollers\actions\ListAction',
            ],
            'change-status' => [
                'class' => 'lajax\translatemanagercontrollers\actions\ChangeStatusAction',
            ],
            'optimizer' => [
                'class' => 'lajax\translatemanagercontrollers\actions\OptimizerAction',
            ],
            'scan' => [
                'class' => 'lajax\translatemanagercontrollers\actions\ScanAction',
            ],
            'translate' => [
                'class' => 'lajax\translatemanagercontrollers\actions\TranslateAction',
            ],
            'save' => [
                'class' => 'lajax\translatemanagercontrollers\actions\SaveAction',
            ],
            'dialog' => [
                'class' => 'lajax\translatemanagercontrollers\actions\DialogAction',
            ],
            'message' => [
                'class' => 'lajax\translatemanagercontrollers\actions\MessageAction',
            ],
            'view' => [
                'class' => 'lajax\translatemanagercontrollers\actions\ViewAction',
            ],
            'create' => [
                'class' => 'lajax\translatemanagercontrollers\actions\CreateAction',
            ],
            'update' => [
                'class' => 'lajax\translatemanagercontrollers\actions\UpdateAction',
            ],
            'delete' => [
                'class' => 'lajax\translatemanagercontrollers\actions\DeleteAction',
            ],
            'delete-source' => [
                'class' => 'lajax\translatemanagercontrollers\actions\DeleteSourceAction',
            ],
            'import' => [
                'class' => 'lajax\translatemanagercontrollers\actions\ImportAction',
            ],
            'export' => [
                'class' => 'lajax\translatemanagercontrollers\actions\ExportAction',
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
