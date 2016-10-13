<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use app\assets\BootstrapAsset;
use app\assets\FontAwesomeAsset;
use app\modules\college\models\JICollegeList;

AppAsset::register($this);

$this->title = Yii::$app->params['app_name'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-Frame-Options" content="deny">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Url::to(['/site/index']) ?>"><?= Yii::$app->params['brand_name']?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                         <li><a href="#"><?= Yii::$app->params['app_name'] ?></a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (!Yii::$app->user->isGuest) { ?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header"><?= Yii::$app->user->identity->email; ?></li>
                                    <li role="separator" class="divider"></li>
                                    <li><?= Html::a('Change Password', ['/site/reset-password']) ?></li>
                                    <li role="separator" class="divider"></li>
                                    <li> <a href="<?= Url::to(['/site/logout']); ?>" data-method="post">Logout</a></li>
                                </ul>
                            </li>

                        <?php } else {
                            ?>
                            <li class="jui-2line-li"><a href=<?= Url::to(['/site/login']) ?>>Login</a></li>

                        <?php }
                        ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <?php
                if (Yii::$app->session->hasFlash('message')) {
                    ?>
                    <div class="alert alert-success alert-dismissible no-print" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <em> <?= Yii::$app->session->getFlash('message') ?> </em>
                    </div> 
                <?php } ?>
                <?php
                if (Yii::$app->session->hasFlash('success')) {
                    ?>
                    <div class="alert alert-success alert-dismissible no-print" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <em> <?= Yii::$app->session->getFlash('success') ?> </em>
                    </div> 
                <?php } ?>
                <?php
                if (Yii::$app->session->hasFlash('warning')) {
                    ?>
                    <div class="alert alert-warning alert-dismissible no-print" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <em> <?= Yii::$app->session->getFlash('warning') ?> </em>
                    </div> 
                <?php } ?>
                <?php
                if (Yii::$app->session->hasFlash('danger')) {
                    ?>
                    <div class="alert alert-danger alert-dismissible no-print" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <em> <?= Yii::$app->session->getFlash('danger') ?> </em>
                    </div> 
                <?php } ?>
                <?= $content ?>
                <div id="overlay"></div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6"><p>&copy; <a href="<?= Yii::$app->params['brand_url'] ?>" target="_blank"> <?= Yii::$app->params['brand_name']?></a> <?= date('Y') ?></p></div>
                   </div>  
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
