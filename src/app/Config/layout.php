<?php declare(strict_types=1);

use Lib\Controller\ViewController;

$viewTemplateSetting = new ViewController();

/**
 * The current header can be found at app/View/Common/header.php
 * You can set customized header
 * (ex. $viewTemplateSetting->setHeader(myheader.php);)
 */
$viewTemplateSetting->setHeader();

/**
 * The current footer can be found at app/View/Common/footer.php
 * You can set customized footer
 * (ex. $viewTemplateSetting->setFooter(myfooter.php);)
 */
$viewTemplateSetting->setFooter();


