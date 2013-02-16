<?php

require_once '/usr/local/hdp/php/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins(
    		array('sfDoctrinePlugin',
    			  'sfSmartyPlugin',
    			  'ipfWebAppFrameworkPlugin'));
  }
}
