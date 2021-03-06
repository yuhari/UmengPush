<?php
/**
 *
 * The content is generated by using TextMate, and edited by yuhari.
 *
 *
 * base class
 *
 *
 * @author 	   yuhari
 * @maintainer yuhari
 * @version    1.0.0
 * @modified   2020/03/25 14:08:08
 *
 */
namespace UPush\context ;

abstract class Base {
	
	protected $params = array() ;
	
	protected function set($key, $val) {
		$this->params[$key] = $val ;
		return $this ;
	}
	
	public function getParams($platform = 'android') {
		return $this->params ;
	}
}
