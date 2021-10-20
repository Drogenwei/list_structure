<?php

require './SinglyLinkedList.php';

$node = new SinglyLinkedList(111);
$node->add(1, 555);
$node->add(2, 666);
$node->add(3, 121);
$node->add(1, 1666);
$node->add(1, 222);
// $node->add(4, 333);
$node->delete(3);
$node->delete(3);


print_r($node->showList());exit;