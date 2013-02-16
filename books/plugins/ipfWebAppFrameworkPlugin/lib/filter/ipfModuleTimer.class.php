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

        $elapsed = $this->elapsed_time->getElapsedTime();
        sfContent::getInstance()->getLogger()->info("elapsed = $elapsed");
    }
}

