<div class="full-post">


  <div class="full-post-content">
    <p>
      <?php echo $message ?>
    </p>

    <p>
      Перейти назад:
      <a href="<?php echo $post->getViewUrl() ?>" rel="bookmark" title="<?php echo $post->title ?>">
        <?php echo $post->title ?>
      </a>
    </p>
  </div>


</div>
