<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/control_administracion_exportacion.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


/* @var $this yii\web\View */
/* @var $model app\models\PerfilUsuario */
/* @var $form yii\widgets\ActiveForm */


if($model->isNewRecord){
    $editando = false;
}else{
    $editando = true;
}

?>
<div class="panel panel-primary" id="panel-primary-mpc">
    <div class="panel-heading" id="panel-heading-mpc">Datos de usuario</div>
    <div class="panel-body">
        <div class="perfil-usuario-form">

            <?php $form = ActiveForm::begin(); ?>

            <div id="errores_val" class="<?=strlen($msg)>0 ? 'alert alert-danger' : ''?> help-block"><?=$msg?></div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'c01_id')->widget(\kartik\widgets\Select2::className(),[
                        'data' => \app\models\Ganaderos::getAllGanaderos(),
                        'options' => ['placeholder' => 'Seleccionar un Productor...', 'onchange'=>'cambioproductor()', 'disabled'=>$editando],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'minimumInputLength' => 5,
                        ],
                    ]) ?>
                </div>
            </div>
               <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($modelUser, "username" )->textInput(['maxlength' => true , Yii::$app->user->can('/admin/*')? "":'readonly'=>true])?>
                    </div>
                   <div class="col-md-4">
                       <?= $form->field($modelUser, "password")->input("password") ?>
                   </div>

                   <div class="col-md-4">
                       <?= $form->field($modelUser, "password_repeat")->input("password") ?>
                   </div>
               </div>

                <div class="clearfix visible-sm-block"></div>

            <div class="row" >
                <div class="col-md-12">
                    <div class="panel panel-info" style="display: block">
                        <div class="panel-heading" id="panel-info-header">Datos de productor</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <?= $form->field($model, 'a02_nombre')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($model, 'a02_apaterno')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($model, 'a02_amaterno')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <?= $form->field($modelUser, 'email')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($model, 'a02_telfono')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'a02_direccion')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row <?= Yii::$app->user->can('/admin/*')? "":(Yii::$app->user->can('/perfilusuario/update')?"":"hidden") ?>">
                <div class="col-md-4">
                    <?= $form->field($model, 'a02_activo')->dropDownList(['1'=>'ACTIVO', '0'=>'INACTIVO'], ['autofocus'=>true]) ?>
                </div>
                <div class="col-md-4">
                    <label for="sesion">Tipo de sesión</label>
                    <?= $form->field($model, 'a02_idproductor')->dropDownList(['1'=>'EXPORTADOR'], ['autofocus'=>true])->label(false)  ?>
                </div>
                <div class="col-md-4">
                    <label for="medico">Médico de cabecera</label>
                    <?= $form->field($model, 'c05_id')->widget(\kartik\widgets\Select2::className(),[
                        'data' => \app\models\Medicos::getAllMedicos(),
                        'options' => ['placeholder' => 'Seleccionar un médico...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'minimumInputLength' => 5,
                        ],
                    ])->label(false) ?>

                </div>
            </div>
            <br>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-primary button_crear' : 'btn btn-primary button_crear']) ?>
            </div>


            <?php ActiveForm::end(); ?>


        </div>

    </div>
</div>
