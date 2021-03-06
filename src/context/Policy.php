<?php
/**
 *
 * The content is generated by using TextMate, and edited by yuhari.
 *
 *
 * 发送策略
 *
 *
 * @author 	   yuhari
 * @maintainer yuhari
 * @version    1.0.0
 * @modified   2020/03/25 15:36:02
 *
 */
namespace UPush\context ;

class Policy extends Base {
	
	// 设置定时发送
	public function setStartTime($stime) {
		//可选，定时发送时，若不填写表示立即发送。格式: "yyyy-MM-dd HH:mm:ss"
		$this->set('start_time', $stime) ;
	}
	
	// 设置消息过期时间
	public function setExpireTime($etime) {
		// 可选，消息过期时间,如果不填写此参数，默认为3天后过期。格式同start_time
		$this->set('expire_time', $etime) ;
	}
	
	// 设置发送限速
	public function setMaxSend($num) {
		// 可选，发送限速，每秒发送的最大条数。最小值1000
		$this->set('max_sned_num', $num) ;
	}
	
	// 设置消息标识
	public function setTag($tag) {
		// 可选，开发者对消息的唯一标识，服务器会根据这个标识避免重复发送。
		$this->set('out_biz_no', $tag) ;
	}
}
