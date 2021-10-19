<?php
/**
 * 节点类
 */
Class Node
{
	// 当前节点的值
	public $data;

	// 下一节点的指针（PHP中其实是引用对象）
	public $next;

	public function __construct($data = null, $next = null)
	{
		$this->data = $data;
		$this->next = $next;
	}
}

?>