<?php
use billboardmanager\frontend\assets\FrontendAssets;
/* @var $this yii\web\View */

FrontendAssets::register($this);

$this->title = Yii::$app->name;
?>

    <div class="site-index">
        <div class="jumbotron">
            <h1><?= Yii::$app->name ?></h1>
            <p class="lead">Billboard Manager</p>
        </div>
        <form id="form-zone" name="form-zone" class="form-zone" action="/billboard/show/zone" method="get">
            <div class="row">
                <div class="col-sm-offset-4 col-md-4">
                    <select id="id" name="id" class="form-control">
                        <option value="">Select Zone</option>
                        <?php
                        foreach ($zones as $zone){
                            ?>
                            <option value="<?= $zone->id ?>"><?= $zone->name ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-4 col-md-4">
                    <button type="submit" class="btn btn-primary btn-start">Start</button>
                </div>
            </div>
        </form>
    </div>

