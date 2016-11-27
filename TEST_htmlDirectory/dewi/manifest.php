<?php
   
   // connect to mongodb
   $m = new MongoClient();
   echo "Connection to database successfully";
	
	
	
   // select a database
   $db = $m->test;
   echo "Database test selected";
   
   $collection = $db->manifest;
  echo "Collection manifest selected successfully";

	$string = '{"manifests":[  
					  {  
						 "standardsVersion": "v0.0.1",
						 "id":"machine generated",
						 "creator":"Sasa Blabla",
						 "dateCreated":"machine generated",
						 "researchObject": "Dewi"
					  }
					  ] 
				}';
	
	
	

$json_a=json_decode($string,true);

//$json_o=json_decode($string);
// array method

foreach($json_a[manifests] as $p)
{

//echo 'Name: '.$p[name][first].' '.$p[name][last].' Age: '.$p[age].' ';

echo ' <br> Manifests: '.$p[standardsVersion]. '<br> id: '.$p[id]. '<br> creator: '.$p[creator]. '<br> dateCreated: '.$p[dateCreated]. '<br> researchObject: '.$p[researchObject];
}


	
   $collection->insert($string);
	echo "Document inserted successfully";
?>


