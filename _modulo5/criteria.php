<?php

require_once __DIR__ . "/classes/api/Criteria.php";

$criteria = new Criteria();
$criteria->add("idade", "<", 16);
$criteria->add("idade", ">", 60, "or");
echo $criteria->dump() . "<br> \n";

$criteria = new Criteria();
$criteria->add("idade", "IN", array(22,23,24) );
$criteria->add("idade", "NOT IN", array(10,17,23));
echo $criteria->dump() . " <br> \n";