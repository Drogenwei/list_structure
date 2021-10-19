<?php

require './SinglyLinkedList.php';

$node = new SinglyLinkedList(111);
$node->add(2, 555);
$node->add(3, 666);
// $node->add(1, 1666);
// $node->add(2, 121);
// $node->delete(3);
// $node->delete(3);


print_r($node->showList());exit;