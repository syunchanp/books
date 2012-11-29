<?php 
/*
* This file is part of the symfony base application framework
* (c) 2012-2012 isao.ito <freesoftdev.isao@primo.repre.jp>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

/**
 * sfException is the base class for all symfony related exceptions and
 * provides an additional method for printing up a detailed view of an
 * exception.
 *
 * @package    integration platform framework
 * @subpackage exception
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
class ipfException extends sfException 
{
	const ID_UNKNOWN_ERROR = 90000001;
	const ID_NOT_IMPLEMENT = 90000002;	
	
    //=========================================================================
    //- public method
	//- 
	
	/*
	 * @brief
	 * ------------------------------------------------------------------------
	 * @param  $message
	 * @param  $code
	 * @return none 
	 */
	public function __construct($message, $code=0) {
		parent::__construct($message, $code);
	}


	/**
	 * @brief message setter
	 * ------------------------------------------------------------------------
	 * @param 
	 * @return 
	 * 
	 */
	public function setMessage($message) {
		
	}
	
	/**
	 * @brief code setter
	 * ------------------------------------------------------------------------
	 * @param 
	 * @return
	 */
	public function setCode($code) {
		
	}
	
}






