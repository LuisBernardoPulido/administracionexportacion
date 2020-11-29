<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilUsuario */

$this->title = "Ver detalles de: ".$model->a02_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['list']];
$this->params['breadcrumbs'][] = $model->a02_nombre;
$this->beginBlock('content-header');
?>

<?php //$this->endBlock(); ?>

<div class="panel panel-primary" id="panel-primary-mpc">
    <div class="panel-heading" id="panel-heading-mpc">Detalles de <?=$model->a02_nombre?></div>
    <div class="panel-body">



<div class="perfil-usuario-view">
    <div class="buttonCont">
        <a href="<?= Url::toRoute(['update', 'id' => $model->a02_id]) ?>" class="textButtonEdit <?= Yii::$app->user->can('/perfilusuario/*')? "":(Yii::$app->user->can('/perfilusuario/update')?"":"hidden") ?>"><label src="" class="fa fa-pencil btn-edit"></label>
            Editar</a>
    </div>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'a02_id',
            //'a01_id',
            [
                'attribute'=>'a01_id',
                'value' => app\models\Users::findIdentityUser($model->a01_id)->username
            ],
            'a02_nombre',
            'a02_apaterno',
            'a02_amaterno',
            'a02_email:email',
            'a02_telfono',
            [
                'attribute'=>'a02_usuAlta',
                'value' =>'Pedro Loyola 544, Zona Centro',
            ],

            [
                'attribute'=>'a02_fecAlta',
                'value' => $model->a02_fecAlta,
            ],

            [
                'attribute'=>'a02_usuMod',
                'value' => !$model->a02_usuMod ? '': app\models\Users::findIdentity($model->a02_usuMod)->username
            ],
            [
                'attribute'=>'a02_fecMod',
                'value' => $model->a02_fecMod,
            ],
        ],
    ]) ?>

    <div class="panel panel-primary" id="panel-primary-mpc">
        <div class="panel-heading" id="panel-heading-mpc">Unidades</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <?php \yii\widgets\Pjax::begin([ 'id' => 'grid-productos']);?>
                    <?= \yii\grid\GridView::widget([
                        'dataProvider' => $unidades,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'label'=>'Clave UPP',
                                'value'=>function($unidades){
                                    $model=\app\models\Upp::findOne($unidades->r01_id);
                                    return strtoupper($model->r01_clave);
                                },
                                'format' => 'raw'
                            ],

                            [
                                'label'=>'Nombre de la UPP',
                                'value'=>function($unidades){
                                    $model=\app\models\Upp::findOne($unidades->r01_id);

                                    return strtoupper($model->r01_nombre);

                                },
                                'format' => 'raw'
                            ],

                        ],
                    ]); ?>


                </div>
            </div>
        </div>
    </div>
</div>


    </div>
</div>

