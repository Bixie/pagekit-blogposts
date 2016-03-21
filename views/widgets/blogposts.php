<?php
/**
 * @var \Pagekit\View\View $view
 * @var \Pagekit\Widget\Model\Widget $widget
 * @var \Pagekit\Blog\Model\Post[] $posts
 */

use Bixie\Blogposts\StringHelper;

?>

<div id="blogposts">

	<?php if ($posts) : ?>
		<ul class="uk-list uk-list-line">
			<?php foreach ($posts as $post) : ?>
				<li>
					<article class="uk-grid uk-grid-match" data-uk-grid-margin>
						<div class="uk-width-medium-1-4 uk-flex-center uk-flex-middle">
							<?php if ($image = $post->get('image.src')): ?>
								<img src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>">
							<?php endif ?>
						</div>
						<div class="uk-width-medium-3-4">
							<h1 class="uk-h2 uk-text-special uk-margin-small-bottom">
								<a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><?= $post->title ?></a></h1>
							<div class="uk-text-secondary uk-text-bold">
								<?= StringHelper::truncate(($post->excerpt ? $post->excerpt : $post->content), $widget->get('content_length')) ?>
							</div>
						</div>
					</article>

				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

</div>
