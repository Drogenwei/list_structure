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
        for ($i = 1; $i <= $index; $i++) {
            if ($prev->next != null) {
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

?>