<?php
  // SUPER SECRET SPY AWARD :)

  // Original JSON Data
  $people = '{"data":[{"first_name":"matt","last_name":"stauffer","age":31,"email":"matt@stauffer.com","secret":"VXNlIHRoaXMgc2VjcmV0IHBocmFzZSBzb21ld2hlcmUgaW4geW91ciBjb2RlJ3MgY29tbWVudHM="},{"first_name":"dan","last_name":"sheetz","age":99,"email": "dan@sheetz.com","secret":"YWxidXF1ZXJxdWUuIHNub3JrZWwu"},]}';

  // Unfortunately, the JSON specification does not allow a trailing comma: http://www.json.org/
  $people = preg_replace('/,]/', ']', $people);

  // Decode JSON
  $people = json_decode($people, true);

  // Initialize comma-separated email variable
  $emails = [];

  // Loop through data
  for ($i=0; $i<count($people['data']); $i++) {

  	// Store Email
    $emails[] = $people['data'][$i]['email'];

    // Create new field "name"
    $people['data'][$i]['name'] = $people['data'][$i]['first_name'] . ' ' . $people['data'][$i]['last_name'];
  }

  // Separate by comma
  $emails = implode(',', $emails);

  // Sort by age decending
  uasort($people['data'], function($a, $b){
  	if ($a['age'] < $b['age']) {
    	return 1;
    } elseif ($a['age'] > $b['age']) {
    	return -1;
    } else {
    	return 0;
    }
  });

  // Two variables "emails" and "people"
  var_dump($emails, json_encode($people));