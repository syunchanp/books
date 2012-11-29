<?php 
/*
* This file is part of the symfony base application framework
* (c) 2012-2012 isao.ito <freesoftdev.isao@primo.repre.jp>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

/**
 * ipfException is the base class for all symfony related exceptions and
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
class ipfNotImplementException extends ipfException 
{
    //=========================================================================
    //- public method
	//- 
	
	public function __construct($function, $line) {
		parent::__construct("NOT USE FUNCTION(" . $function . ") LINE(" . $line . ") ", ipfException::ID_NOT_IMPLEMENT );
	}
	
}






