<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

// Set your CSV feed
$feed = "https://docs.google.com/spreadsheets/d/e/2PACX-1vS2DCUg0uXAw52fT2RrgGe6oHj3m2uaJn0npunh7tg1I3QPYewPQNMLGYUBJ_9vV3OgNMqi5POj86vD/pub?gid=1678756013&single=true&output=csv";

// Arrays we'll use later
$keys = array();
$newArray = array();

// Function to convert CSV into associative array
function csvToArray($file, $delimiter) {
  if (($handle = fopen($file, 'r')) !== FALSE) {
    $i = 0;
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) {
      for ($j = 0; $j < count($lineArray); $j++) {
        $arr[$i][$j] = $lineArray[$j];
      }
      $i++;
    }
    fclose($handle);
  }
  return $arr;
}

// Do it
$data = csvToArray($feed, ',');

// Set number of elements (minus 1 because we shift off the first row)
$count = count($data) - 1;

//Use first row for names
$labels = array_shift($data);

foreach ($labels as $label) {
  $keys[] = $label;
}

// Bring it all together
for ($j = 0; $j < $count; $j++) {
  $d = array_combine($keys, $data[$j]);
  $newArray[$j] = $d;
}

// Print it out as JSON
echo json_encode($newArray);

?>