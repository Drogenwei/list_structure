<?php

/**
 * 循环链表
 */
Class CircularLinkedList
{
	// 头部的虚拟节点
    public $head;

    // 链表长度
    public $size = 0;

    // 头节点位置
    public $head_node = 0;

    // 尾节点位置
    public $tail_node = 0;

    // 链表的长度
    public $linked_list_size = 8;


    /**
     * 初始化首节点
     */
    public function __construct()
    {

    }

    public function addFirst($data)
    {
        $this->head = new Node($data);
        $this->head->next = $this->head;
        $this->size++;
    }

    /**
     * 指定节点插入
     */
    public function add($index, $data)
    {
        if ($index > $this->size + 1) {
            throw new Exception("超过链表长度");
        }

        $prev = $this->head;
        for ($i = 0; $i < $index; $i++) {
            if ($prev->next != null) {
                // 如果下一个位置是想要插入的位置
                if ($i + 1 == $index) {
                    continue;
                }
                $prev = $prev->next;
            }
        }
    
        $prev->next = new Node($data, $prev->next);
        $this->size++; 
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

    /**
     * 修改链表中某个元素的值
     */
    public function update($index, $data)
    {
        if ($index > $this->size) {
            throw new Exception("超过链表长度");
        }

        $prev = $this->head;
        for ($i = 1; $i <= $index; $i++) {
            if ($i == $index) {
                $prev->data = $data;
                continue;
            }
            if ($prev->next != null) {
                $prev = $prev->next;
            }
        }
    }

    public function push($val)
    {
        // 判断是否队空
        if ($this->head_node == $this->tail_node) {
            $this->addFirst($val);
            $this->tail_node++;
            return;
        }
        // 判断队列是否满了 - 公式 （tail + 1） % linked_list_size == head
        if (($this->tail_node + 1) % $this->linked_list_size == $this->head_node) {
            throw new Exception("队列已满，请等待");
        }

        $this->add($this->size, $val);
        $this->tail_node++;
    }

    public function pop()
    {
        // 判断是否队空
        if ($this->head_node == $this->tail_node) {
            return null;
        }

        $return = $this->head->data;
        $this->head = $this->head->next;
        $this->size--;
        $this->head_node++;
        return $return;
    }

    /**
     * 查询链表中的所有元素 时间复杂度：On
     */
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