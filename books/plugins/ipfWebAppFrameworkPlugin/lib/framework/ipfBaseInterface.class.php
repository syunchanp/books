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
class ipfBaseInterface
{
	static $instance = array();
	
	protected $v_i = array();
	protected $view_name = sfView::NONE;
	protected $_actions  = "";
	protected $_request  = "";
	protected $_response = "";
	
    //=========================================================================
    //- static method
	//- 
	//- +---------------------------------------------------------------------+
	//- @param  $class_name ... 生成するオブジェクトの名称
	//- @param  $_actions   ... sfActionsの実体
	//- @param  $_session   ... sfUser
	//- @param  $_args      ... sfConfig::get で取得した共通情報
	//- @return instance    ... 生成したインスタンス
	//- +---------------------------------------------------------------------+
	static public function getInstance($class_name, $_actions, $_session, $_args) {
		if (!isset(self::$instance[$class_name])) {
			try {
				$_obj = new $class($_actions, $_session);
				$_obj->valid_params();			//. 不正アクセス対象となるパラメータの事前チェック
				$_obj->args($_args);			//. sfConfig::get等で取得される scopeが限定される値を決める
				$retview = $_obj->execute();	//. 処理の実態
				$_obj->setViewName($retview);	//. symfonyの戻り値を設定
				self::$instance[$class_name] = $_obj;
			}
			catch(sfStopException $_e) {
				throw $_e;						//. symfonyレベルでのエラー
			}
			catch(Exception $_e) {
				$_actions->forward('common', 'error404');
			}
		}

		return self::$instance[$class_name];
	}


    //=========================================================================
    //- public method
	//- 

	/**
	 * @brief  bring out use of templates data
	 * ------------------------------------------------------------------------
	 * @memo   must use function
	 * @throws ipfNotImplementException
	 */
	public function getData() {
		throw new ipfNotImplementException(__FUNCTION__, __LINE__);
	}

	/**
	 * @brief  symfony use return value
	 * ------------------------------------------------------------------------
	 * @return sfView::NONE sfView::SUCCESS sfView::ERROR other
	 */
	public function getViewName() {
		return $this->view_name;
	}
	
	/**
	 * @brief  settter symfony use return value
	 * ------------------------------------------------------------------------
	 * @param  $view_name   
	 */
	public function setViewName($view_name) {
		$this->view_name = $view_name;
	}
	
	
    //=========================================================================
    //- protected method
	//- 
	
	/**
	 * @brief  constructor
	 *         parameter setter
	 * ------------------------------------------------------------------------
	 */
	protected function __construct($_actions, $_session) {
		$this->_actions = $_actions;
		$this->_session = $_session;
	}
	
	/**
	 * @brief  parameter validator
	 * ------------------------------------------------------------------------
	 */
	protected function valid_params() {
		
	}
	
	/**
	 * @brief  parameter validator
	 * ------------------------------------------------------------------------
	 */
	protected function args($_args) {
		
	}
	
	/**
	 * @brief  must impliment function
	 * ------------------------------------------------------------------------
	 */
	protected function execute() {
		throw new ipfNotImplementException(__FUNCTION__, __LINE__);
	}
	
    //=========================================================================
    //- private method
	//- 
}






