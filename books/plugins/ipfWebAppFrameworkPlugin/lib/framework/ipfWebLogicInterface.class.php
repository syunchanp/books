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
class ipfWebLogicInterface extends ipfBaseInterface
{
	protected $v_i = array();
	
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
	protected function valid_trans_token() {
	
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
	 * @brief session validator
	 * @memo  session valid checker / use session validator function
	 * ------------------------------------------------------------------------
	 */
	protected function get_trans_url($host, $dir, $action, $result) {
		return $redirect_url;
	}
	
	
	/**
	 * @brief  must impliment function
	 * ------------------------------------------------------------------------
	 */
	protected function execute() {
		
		$trans_url = "";
		
		$this->v_i = array();
		
		try {
			//- validator session
			$this->valid_session();
			
			//- check trans check by use referrer  
			$this->valid_trans_check_of_referrer();
			
			//- check trans check by use from action  
			$this->valid_trans_check_of_action();
			
			//- check trans check by use param token
			$this->valid_trans_token();

			//- check trans check by use from action
			$this->set_trans_check_of_action();
				
			//- execute businness logic  
			$has_error = $this->process();
			
			//- get next trans url 
			$trans_url = $this->get_trans_url();
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
		
		return $trans_url;
	}
	
    //=========================================================================
    //- private method
	//- 
}






