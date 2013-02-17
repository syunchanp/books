<?php
/**
 * sfMobileJPFilter
 *
 * @synopsis
 *  <code>
 *  filters.yml
 *  --
 *  mobile:
 *      class: sfMobileJPFilter
 *
 *  actions.class.php
 *  --
 *  $agent = $this->getRequest()->getAttribute('agent');
 *  </code>
 *
 * @author Masahiro Funakoshi <mfunakoshi@gmail.com>
 */

class ipfModuleTimer extends sfFilter
{
	private $elapsed_time = null;

    public function execute($filterChain)
    {

        if ($this->isFirstCall()) {
        	$this->elapsed_time = sfTimerManager::getTimer("module_timer");
        }

        $filterChain->execute($filterChain);
      	$this->elapsed_time->addTime();

        //- microsec
        $s = $this->elapsed_time->getElapsedTime();
        $m = sprintf('%06f', $s);
        sfContext::getInstance()->getLogger()->info("elapsed = $m us");
    }
}

