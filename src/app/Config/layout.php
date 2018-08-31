<?php declare(strict_types=1);

use Lib\Controller\ViewController;

$viewTemplateSetting = new ViewController();

/**
 * You can set customized header
 * (ex. $viewTemplateSetting->setHeader(myheader.php);)
 */
$viewTemplateSetting->setHeader();

/**
 * You can set customized footer
 * (ex. $viewTemplateSetting->setFooter(myfooter.php);)
 */
$viewTemplateSetting->setFooter();


