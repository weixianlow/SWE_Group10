<?php

$m = new MongoClient();
echo "Connection to database successfully"

$db = $m -> test;

echo "database selected"
$collection = $db -> testcase;
echo "collection selected"

$collection->update(array("title" => "MongoDB"),
	array("$set'=>array("title"=>"MongoDB Tutorial")));
echo "document updated successfully";

$cursor = $collecton->find();

echo "updated document";

foreach($cursor as $document){
	echo $document["title"] . "\n";
	}
?>
