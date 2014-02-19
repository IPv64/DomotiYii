<?php

class ActionsController extends Controller {

    /**
     * Lists all actions.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria();

        $model = new Actions('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Actions'])) {
            $model->attributes = $_GET['Actions'];

            if (!empty($model->id))
                $criteria->addCondition('id = "' . $model->id . '"');
            if (!empty($model->name))
                $criteria->addCondition('name = "' . $model->name . '"');
            if (!empty($model->description))
                $criteria->addCondition('description = "' . $model->description . '"');
            if (!empty($model->type))
                $criteria->addCondition('type = "' . $model->type . '"');
        }
        $this->render('index', array('model' => $model));
    }

    public function actionView($id) {
        $model = Actions::model()->findByPk($id);
        if (isset($_GET['AJAXMODAL'])) {
            echo $this->renderPartial('_form', array('model' => $model, 'readonly' => 1), TRUE, true);
        } else {
            $this->render('view', array('model' => $model));
        }
    }

    public function actionUpdate($id) {
        $model = Actions::model()->findByPk($id);
        if (isset($_POST['Actions'])) {
            $model->attributes = $_POST['Actions'];
            if ($model->validate()) {
                // form inputs are valid, do something here
                $this->do_save($model);
            }
        }
        if (isset($_GET['Actions'])) { //if GET used its from ajax
            $model->attributes = $_GET['Actions'];
            if ($model->validate()) {
                // form inputs are valid, do something here
                echo $this->do_save_fromajax($model);
            } else echo Yii::t('app', 'Action save failed!');
            return;
        }
        if (isset($_GET['AJAXMODAL'])) {
            echo $this->renderPartial('_form', array('model' => $model), TRUE, true);
        } else {
            $this->render('update', array(
                'model' => $model,
            ));
        }
    }

    public function actionDelete($id) {
        // delete the entry from the "actions" table
        $model = Actions::model()->findByPk($id);
        $this->do_delete($model);
    }

    public function actionCreate() {
        $model = new Actions;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Actions'])) {
            $model->attributes = $_POST['Actions'];
            if ($model->validate()) {
                $this->do_save($model);
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */

    protected function do_save($model) {
        if ($model->save() === false) {
            Yii::app()->user->setFlash('error', Yii::t('app', 'Action save failed!'));
        } else {
            Yii::app()->user->setFlash('success', Yii::t('app', 'Action saved.'));
        }
    }
    protected function do_save_fromajax($model) {
        if ($model->save() === false) {
            return Yii::t('app', 'Action save failed!');
        } else {
            return Yii::t('app', 'Action saved.');
        }
    }

    protected function do_delete($model) {

        if ($model->delete() === false) {
            Yii::app()->user->setFlash('error', Yii::t('app', 'Action delete failed!'));
        } else {
            Yii::app()->user->setFlash('success', Yii::t('app', 'Action deleted.'));
            $this->redirect(array('index'));
        }
    }

}
