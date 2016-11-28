 
<?php
// connect to mongodb
$m = new MongoClient();
echo "Connection to database successfully";
          
// select a database
$db = $m->SWE;
echo "Database mydb selected";
$collection = $db->manifest;
echo "Collection selected succsessfully";

$cursor = $collection->findOne(array('_id' => new MongoId("583b409e913e4afe39964f81")));
foreach ($cursor as $doc) {
    var_dump($doc);
}

$collection->remove(array('_id' => new MongoId("583b409e913e4afe39964f81")));
echo "deleted";

?>