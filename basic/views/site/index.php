<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$categories = Category::find()->all();
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">

            <?php
            /** @var $articles /yii/basic/controllers/SiteController.php */
            foreach ($articles as $article):?>
                <div class="col-md-8">
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><img
                                        src="<?= $article->getImage(); ?>" alt=""></a>

                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"
                               class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">View Post</div>
                            </a>
                        </div>

                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6>
                                    <a href="<?= Url::toRoute(['site/category', 'id' => $article->getCategory()->one()]) ?>"><?= $article->getCategory()->one() ?></a>
                                </h6>
                                <h1 class="entry-title"><a href="#"<?= $article->title ?></a></h1>
                            </header>
                            <div class="entry-content">
                                <p><?= $article->description ?></p>
                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"
                                       class="more-link">Continue Reading</a>
                                </div>
                            </div>
                            <div class="social-share">
                                <?php if ($article->author !== null): ?>
                                    <span class="social-share-title pull-left text-capitalize">By <?= $article->author->name ?> On <?= $article->getDate(); ?></span>
                                <?php endif; ?>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a>
                                    </li><?= (int)$article->viewed; ?>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <?php
                    /** @var $pagination /yii/basic/controllers/SiteController.php */
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]) ?>
                </div>
                <?= $this->render('/partials/sidebar', [
                    'popular' => $popular,
                    'recent' => $recent,
                    'categories' => $categories
                ]); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>


