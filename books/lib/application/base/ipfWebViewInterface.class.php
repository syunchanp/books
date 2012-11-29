<?php 
/*
* This file is part of the symfony base application framework
* (c) 2012-2012 isao.ito <freesoftdev.isao@primo.repre.jp>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

/**
 * alternate sfActions is the base class for all symfony 
 * 
 * @package    integration platform framework
 * @subpackage lib/application/base
 * @author     isao.ito <freesoftdev.isao@primo.repre.jp>
 * @version    
 */
/*
 * @brief 
 *   this framework used exception class
 * @author 
 *   isao.ito <freesoftdev.isao@primo.repre.jp>
 * @version
 *   
 */
class ipfWebViewInterface extends ipfBaseInterface
{
	protected $next_actions_white_list = array();
	protected $next_actions_white_list = array();
	
    //=========================================================================
    //- static method
	//- 
	
    //=========================================================================
    //- public method
	//- 

    //=========================================================================
    //- protected method
	//- 
	
	/**
	 * @brief  setter args
	 * ------------------------------------------------------------------------
	 *  
	 */
	protected function process() {
		throw new ipfNotImplementException(__FUNCTION__, __LINE__);
	}
	
	/**
	 * @brief  setter args
	 * ------------------------------------------------------------------------
	 *  
	 */
	protected function args($_args) {
		
	}
	
	/**
	 * @brief session validator
	 * @memo  session valid checker / use session validator function
	 * ------------------------------------------------------------------------
	 */
	protected function valid_session() {
		$this->_session->validator();
	}
	
	/**
	 * @brief session validator
	 * @memo  session valid checker / use session validator function
	 * ------------------------------------------------------------------------
	 */
	protected function create_trans_token() {
	
	}
	
	/**
	 * @brief session validator
	 * @memo  session valid checker / use session validator function
	 * ------------------------------------------------------------------------
	 */
	protected function valid_trans_check_of_referrer() {
		
	}
	
	/**
	 * @brief session validator
	 * @memo  session valid checker / use session validator function
	 * ------------------------------------------------------------------------
	 */
	protected function valid_trans_check_of_action() {
	
	}
	
	/**
	 * @brief session validator
	 * @memo  session valid checker / use session validator function
	 * ------------------------------------------------------------------------
	 */
	protected function set_trans_check_of_action() {
	
	}
	
	/**
	 * @brief  must impliment function
	 * ------------------------------------------------------------------------
	 */
	protected function execute() {

		$retview = "";
		
		try {
			//- validator session
			$this->valid_session();
			
			//- check trans check by use referrer  
			$this->valid_trans_check_of_referrer();
			
			//- check trans check by use from action  
			$this->valid_trans_check_of_action();
			
			//- check trans check by use param token
			$this->create_trans_token();
			
			//- check trans check by use from action  
			$this->set_trans_check_of_action();
			
			//- execute businness logic  
			$retview = $this->process();

		}
		catch(sfStopException $_e) {
			throw $_e;
		}
		catch(ipfException $_e) {
			throw $_e;
		}
		catch(Exception $_e) {
			throw $_e;
		}
		
		return $retview;
	}
	
    //=========================================================================
    //- private method
	//- 
}






