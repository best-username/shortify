<?php Yii::app()->bootstrap->register(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->pageTitle;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="/css/main.css" rel="stylesheet" />
		<script src="/js/main.js" type="text/javascript"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>

        <?php $this->widget('application.widgets.Navigation'); ?>
		
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="span12">
						<?php
							$this->widget('bootstrap.widgets.TbBreadcrumb', array(
								'homeLabel' => 'Главная',
								'homeUrl' => '/backend/',
								'links' => $this->breadcrumbs
							));
						?>
						<?php $this->widget('bootstrap.widgets.TbAlert'); ?>
						
                        <?php echo $content; ?>
                    </div>				
                </div>
            </div>
        </div>

        <div class="b-footer">
			<div class="container">
				&copy; shortify <?php echo date('Y');?>
			</div>
        </div>
    </body>
</html>
