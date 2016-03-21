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
				$grid1 = $widget->get('show_image') == 'top' ? 'uk-width-1-1' : 'uk-width-medium-1-4';
				$grid2 = $widget->get('show_image') == 'top' ? 'uk-width-1-1 uk-margin-top-small' : 'uk-width-medium-3-4';
				?>
				<li>
					<article class="uk-grid uk-grid-match"<?=($widget->get('show_image') == 'side' ? ' data-uk-grid-margin': '')?>>
						<?php if ($hasImage): ?>
						<div class="<?= $grid1 ?> uk-flex-center uk-flex-middle">
								<img src="<?= $post->get('image.src') ?>" alt="<?= $post->get('image.alt') ?>">
						</div>
						<?php endif ?>
						<div class="<?= $grid2 ?>">
							<h1 class="uk-h2 uk-margin-small-bottom">
								<a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><?= $post->title ?></a></h1>
							<p class="uk-margin-small-top">
								<?= $app['string.truncate'](($post->excerpt ? $post->excerpt : $post->content), $widget->get('content_length')) ?>
							</p>
						</div>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

</div>
