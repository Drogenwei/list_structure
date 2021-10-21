<?php

require './SinglyLinkedList.php';
require './CircularLinkedList.php';

// $node = new SinglyLinkedList(111);
// $node->add(1, 555);
// $node->add(2, 666);
// $node->add(3, 121);
// $node->add(1, 1666);
// $node->add(1, 222);
// // $node->add(4, 333);
// $node->delete(3);
// $node->delete(3);
// $node->update(2, 321);
// $node->update(3, 777);


$node = new CircularLinkedList();
// $node->add(1, 555);
// $node->add(2, 666);
// $node->add(1, 777);
// $node->add(2, 312);

$node->push(1);
$node->push(2);
$node->push(3);
$node->push(4);
$node->push(1);
$node->push(2);
$node->push(3);
$node->pop();
$node->pop();
// $node->pop();
$node->push(4);
// $node->push(4);




print_r($node->showList());exit;