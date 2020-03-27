<?php
/**
 *
 * The content is generated by using TextMate, and edited by yuhari.
 *
 *
 * 具体消息内容
 *
 *
 * @author 	   yuhari
 * @maintainer yuhari
 * @version    1.0.0
 * @modified   2020/03/25 14:16:58
 *
 */
namespace UPush\context ;

class Payload extends Base {
	
	protected $params = array(
		'display_type' => 'notification' ,
	) ;
	
	public function getParams() {
		$t = array() ;
		if (isset($this->params['display_type'])) {
			$t['display_type'] = $this->params['display_type'] ;
			unset($this->params['display_type']) ;
		}
		
		if (isset($this->params['extra'])) {
			$t['extra'] = $this->params['extra'] ;
			unset($this->params['extra']) ;
		}
		
		$t['body'] = $this->params ;
		
		return $t ;
	}
	
	// 设置消息类型
	public function setDisplayType($type) {
		// 必填，消息类型: notification(通知)、message(消息)
		$this->set('display_type', $type) ;
	}
	
	// 设置推送内容
	// message 由 title、subtitle、body 组成
	public function setMessage($message) {
		// 必填，通知栏提示文字
		$this->set('ticker', $message['subtitle']) ;
		// 必填，通知标题
		$this->set('title', $message['title']) ;
		// 必填，通知文字描述 
		$this->set('text', $message['body']) ;
	}
	
	// 设置图标
	public function setIcon($icon) {
		if (is_string($icon)) {
			// 可选，状态栏图标ID，R.drawable.[smallIcon]，
			$this->set('icon', $icon) ;
		}elseif(is_array($icon)) {
			// 可选，状态栏图标ID，R.drawable.[smallIcon]，
			$this->set('icon', $icon['icon_id']) ;
			// 可选，通知栏拉开后左侧图标ID，R.drawable.[largeIcon]，
			$this->set('largeIcon', $icon['big_icon_id']) ;
			// 可选，通知栏大图标的URL链接。该字段的优先级大于largeIcon。
			$this->set('img', $icon['big_icon_url']) ;
		}
	}
	
	// 设置声音
	public function setSound($sound) {
		// 可选，通知声音，R.raw.[sound]。
		$this->set('sound', $sound) ;
	}
	
	// 设置到达提醒方式
	public function setPlayWay($way) {
		if (!empty($way['builder_id'])) {
			// 可选，默认为0，用于标识该通知采用的样式。使用该参数时，开发者必须在SDK里面实现自定义通知栏样式。
			$this->set('builder_id', $way['builder_id']) ;
		}
		
		// 可选，收到通知是否震动，默认为"true"
		$this->set('play_vibrate', $way['vibrate'] === false ? "false" : "true") ;
		// 可选，收到通知是否闪灯，默认为"true"
		$this->set('play_lights', $way['lights'] === false ? "false" : "true") ;
		// 可选，收到通知是否发出声音，默认为"true"
		$this->set('play_sound', $way['sound'] === false ? "false" : "true") ;
	}
	
	// 设置打开行为
	public function setOpenBehavior($behavior) {
		$method = $behavior['method'] ;
		// 可选，默认为"go_app"，值可以为: go_app, go_url, go_activity, go_custom
		$this->set('after_open', $method) ;
		
		if ($method == 'go_url') {
			// 通知栏点击后跳转的URL，要求以http或者https开头
			$this->set('url', $behavior['link']) ;
		}
		
		if ($method == 'go_activity') {
			// 通知栏点击后打开的Activity
			$this->set('activity', $behavior['link']) ;
		}
		
		if ($method == 'go_custom') {
			// 用户自定义内容，可以为字符串或者JSON格式。
			$this->set('custom', $behavior['link']) ;
		}
	}
	
	// 设置用户自定义参数
	public function setExtraArgs($args) {
		$this->set('extra', $args) ;
	}
}
