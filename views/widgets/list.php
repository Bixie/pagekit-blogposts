<?php
/**
 * @var \Pagekit\View\View $view
 * @var \Pagekit\Widget\Model\Widget $widget
 * @var \Pagekit\Blog\Model\Post[] $posts
 */

?>

<div id="blogposts">

	<?php if ($posts) : ?>
		<ul class="uk-list uk-list-line">
			<?php foreach ($posts as $post) :
				$hasImage = ($post->get('image.src') && $widget->get('show_image'));
				$url = $view->url('@blog/id', ['id' => $post->id]);
				$grid1 = $widget->get('show_image') == 'top' ? 'uk-width-1-1 uk-margin-bottom' : 'uk-width-medium-1-4';
				$grid2 = !$hasImage || $widget->get('show_image') == 'top' ? 'uk-width-1-1' : 'uk-width-medium-3-4';
				?>
				<li>
					<article class="uk-grid uk-grid-match"<?=($widget->get('show_image') == 'side' ? ' data-uk-grid-margin': '')?>>
						<?php if ($hasImage): ?>
						<div class="<?= $grid1 ?> uk-flex-center uk-flex-middle">
							<img src="<?= $post->get('image.src') ?>" alt="<?= $post->get('image.alt') ?>">
						</div>
						<?php endif ?>
						<div class="<?= $grid2 ?><?= $hasImage ? ' uk-margin-top-small' : '' ?>">
							<h1 class="uk-h2">
								<a href="<?= $url ?>"><?= $post->title ?></a></h1>
							<?php if ($widget->get('show_meta')) : ?>
								<p class="uk-article-meta uk-margin-remove">
									<?= __('Written by %name% on %date%', ['%name%' => $post->user->name, '%date%' => '<time datetime="'.$post->date->format(\DateTime::ATOM).'" v-cloak>{{ "'.$post->date->format(\DateTime::ATOM).'" | date "longDate" }}</time>' ]) ?>
								</p>
							<?php endif; ?>
                            <?php if ($widget->get('show_content')) : ?>
                                <p>
                                    <?= $app['string.truncate'](($post->excerpt ? $post->excerpt : $post->content), $widget->get('content_length')) ?>
                                </p>
                            <?php endif; ?>
							<?php if ($widget->get('show_readmorelink')) : ?>
							<div class="uk-text-right">
								<a href="<?= $url ?>"><?= $widget->get('readmore_text', __('Read more')) ?></a>
							</div>
							<?php endif; ?>
						</div>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ($widget->get('show_bloglink')) : ?>
		<div class="uk-margin-top uk-text-right">
			<a href="<?= $view->url('@blog') ?>"><?= $widget->get('bloglink_text', __('All blog posts')) ?></a>
		</div>
	<?php endif; ?>

</div>
