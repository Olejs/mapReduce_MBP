#!/usr/bin/php
<?php
    // iterate through lines
    while($line = fgets(STDIN)){
        // remove leading and trailing
        $line = ltrim($line);
        $line = rtrim($line);

        // regular expression to capture year and gold value
        preg_match("/^(.*?)\-(?:.*),(.*)$/", $line, $matches);

        if ($matches) {
            // key: year, value: gold price
            printf("%s\t%.3f\n", $matches[1], $matches[2]);
        }
    }
?>
