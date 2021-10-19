<?php

require "./Node.php";
/**
 * 单向链表
 */
Class SinglyLinkedList
{
	// 头部的虚拟节点
	public $head;

	// 链表长度
	public $size = 0;

	/**
	 * 初始化首节点
	 */
	public function __construct($data)
	{
		$this->head = new Node($data);
		$this->size = 1;
	}

	/**
	 * 指定节点插入
	 */
	public function add($index, $data)
	{
		print_r($this->size);
		if ($index > $this->size + 1) {
			throw new Exception("超过链表长度");
		}

		$prev = $this->head;

		for ($i = 0; $i <= $index; $i++) {
			if ($i == $index) {
				$prev->data = $data;
				print_r($prev);
			}
			if ($prev->next != null) {
				$prev = $prev->next;
			}
			if( $i==$index ) {
				// $prev->data = $data;
				// $prev = $prev->next;
			}
            // $prev = $prev->next;
		}
		
		if ($index > $this->size) {
			$prev->next = new Node($data, $prev->next);
			$this->size++;
		}
	}

	/**
	 * 删除节点元素
	 */
	public function delete($index)
	{
		if ($index > $this->size) {
			throw new Exception("超过链表长度");
		}

		$prev = $this->head;
		// prev已经取出了第一个，循环直接从第二个开始
		for ($i = 2; $i < $index; $i++) {
			if ($prev->next != null) {
				$prev = $prev->next;
			}
		}

		$prev->next = $prev->next->next;
		$this->size--;
	}

	public function showList()
	{
		$data = [];
		$prev = $this->head;
		for ($i = 0; $i < $this->size; $i++) {
			$data[] = $prev->data;
			if ($prev->next != null) {
				$prev = $prev->next;
			}
		}

		return $data;
	}
}

?>