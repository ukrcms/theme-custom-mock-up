<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr" lang="en-US">
  <head>
    <title><?php echo \Uc::app()->theme->getValue('seo_meta_title') ?></title>
    
    <meta name="description" content="<?php echo \Uc::app()->theme->getValue('seo_meta_description') ?>">
    <meta name="keywords" content="<?php echo \Uc::app()->theme->getValue('seo_meta_keywords') ?>">
    <meta name="author" content="Ivan Scherbak, HighWay-UA">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" type="text/css" media="all" 
        href="<?php echo \Uc::app()->theme->getUrl(); ?>/views/layouts/styles/style.css">
  </head>
  
  <body>
  <div id="global_container">
    <div id="leftcol">
      <!-- Список категорій -->
      <?php if ($categories = \Ub\Simpleblog\Categories\Table::instance()->getAllFromCache() and !empty($categories)) { ?>
        <h2>Категорії</h2>
          <ul>
            <?php foreach ($categories as $category) { ?>
              <?php
                  if ($category->status == \Ub\Simpleblog\Categories\Model::STATUS_DISABLED) {
                      continue;
                  }
              ?>
              <li>
                <a href="<?php echo $category->getViewUrl() ?>">
                  <?php echo $category->title ?>
                </a>
              </li>
            <?php } ?>
          </ul>
      <?php } ?>

      <!-- Сторінки сайту -->
      <?php if ($pages = \Ub\Site\Pages\Table::instance()->getAllFromCache() and !empty($pages)) { ?>
        <h2>Сторінки</h2>
          <ul>
            <?php foreach ($pages as $page) { ?>
                <li class="cat-item">
                  <a href="<?php echo $page->getViewUrl() ?>">
                    <?php echo $page->title ?>
                  </a>
                </li>
            <?php } ?>
          </ul>
      <?php } ?>
    </div>
	<div id="content">
      <!-- Назва сайту -->
      <h1>
        <a href="<?php echo \Uc::app()->url->create('/') ?>"><?php echo \Ub\Site\Settings\Table::instance()->get('blogTitle') ?></a>
      </h1>
    
      <!-- Слоган сайту -->
      <h2>
        <?php echo \Ub\Site\Settings\Table::get('slogan') ?>
      </h2>
      <hr>
    
      <!-- Дописи -->
      <?php echo $content ?>
      <hr>
    
      <!-- Підвал -->
      <span>Відладочна інформація: </span>
	  <?php list($time, $memory) = \Uc\App::getDebugInfo() ?>
      <span>
        <?php echo $time ?> с. / <?php echo $memory ?> мб.
      </span>
      <span>Сайт працює на системі <a href="http://ukrcms.com" title="Безкоштовна українська cms">UkrCms</a></span>
        </div>
    <div class="clearfix"></div>
  </div>
  </body>
</html>