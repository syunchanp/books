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
	//- @param  $class_name ... ��������I�u�W�F�N�g�̖���
	//- @param  $_actions   ... sfActions�̎���
	//- @param  $_session   ... sfUser
	//- @param  $_args      ... sfConfig::get �Ŏ擾�������ʏ��
	//- @return instance    ... ���������C���X�^���X
	//- +---------------------------------------------------------------------+
	static public function getInstance($class_name, $_actions, $_session, $_args) {
		if (!isset(self::$instance[$class_name])) {
			try {
				$_obj = new $class($_actions, $_session);
				$_obj->valid_params();			//. �s���A�N�Z�X�ΏۂƂȂ�p�����[�^�̎��O�`�F�b�N
				$_obj->args($_args);			//. sfConfig::get���Ŏ擾����� scope�����肳���l�����߂�
				$retview = $_obj->execute();	//. �����̎���
				$_obj->setViewName($retview);	//. symfony�̖߂�l��ݒ�
				self::$instance[$class_name] = $_obj;
			}
			catch(sfStopException $_e) {
				throw $_e;						//. symfony���x���ł̃G���[
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






