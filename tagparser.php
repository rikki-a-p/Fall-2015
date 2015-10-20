<html>
<body>
<?php

echo "<pre>";

#open file for reading 
	
$fh = fopen("listofcodes.txt", 'r') or
die("Could not open file for reading");

$frequencies = array();

while ($line = fgets($fh)) {
	#echo $line."<br>";
	$lineArray = explode(',', $line);
	foreach ($lineArray as $value) {
		# clean up each tag for storage
		$lcValue = trim(strtolower($value));
		#print "A value is: $lcValue<br>";
		# put in associative array
		if (isset($frequencies[$lcValue])) {
			$frequencies[$lcValue]++;
		}  else {
			$frequencies[$lcValue]=1;
		}
	}

}

ksort($frequencies);

fclose($fh);

#  open a file for writing
$fhw = fopen("tagparser.txt", 'w') or die("Failed to create file");

# loop through $frequencies array to print out the key and value, separated by a tab, one key/tab/value per line

foreach ($frequencies as $value => $line){
	
$text = $value."\t".$line."\n";
fwrite($fhw, $text) or die("Could not write to file");
}

# in your loop, write each of those lines to the writing file, slide 19 has an output file example
# with a line like this fwrite($fhw, $text) or die("Could not write to file");

# end the loop
# close file
fclose($fhw);

echo "File 'tagparser.txt' written successfully";
echo "</pre>";

?>
</body>
</html>
