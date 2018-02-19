<?php

namespace app\controllers;

use app\models\User;
use yii\filters\AccessControl;
use Yii;
use yii\filters\VerbFilter;
use app\models\MgroupTasks;
use DateTime;

class TasksController extends \yii\web\Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }



    public function actionIndex()
    {

        $userTasks = new MgroupTasks();
        $userId = Yii::$app->getUser()->id;


        $listTasks = $userTasks->find()->select(['text_task', 'date_task', 'id'])
            ->where(['user_id'=>$userId])->orderBy('date_task')
            ->asArray()->all();



        return $this->render('index', ['tasks'=>$userTasks, 'listTasks'=>$listTasks]);
    }

    public function actionAdd(){

        $task = new MgroupTasks();
        $userId = Yii::$app->getUser()->id;
        $request = Yii::$app->request;


        if($request->isPost && $request->isAjax){


            $post = $request->post();
            $task->user_id = $userId;

            if($task->load($post) && $task->validate()){
               
                
                $date = new DateTime($task->date_task);
                $myDate = $date->format('Y-m-d H-i');
                $task->date_task = $myDate;
                
                if($task->save()){
                    $listTasks = $task->find()
                                ->select(['text_task', 'date_task', 'id'])
                                ->where(['user_id'=>$userId])
                                ->orderBy('date_task')
                                ->asArray()->all();

                    return $listTasks ? $this->renderPartial('listTasks', ['listTasks'=>$listTasks]) : -1;
                }


            }


        }

        return -1;


    }

    public  function actionRemove(){

        $request = Yii::$app->request;

        if($request->isAjax && $request->isPost){


            $task = MgroupTasks::findOne($request->post('id'));

            return $task->delete() ? 1 : -1;
        }

    }

}
