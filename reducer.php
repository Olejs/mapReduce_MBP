#!/usr/bin/php
<?php
    $last_key = NULL;
    $running_total = 0;
    $running_average = 0;
    $number_of_items = 0;

    // iterate through lines
    while($line = fgets(STDIN)) {
        // remove leading and trailing
        $line = ltrim($line);
        $line = rtrim($line);

        // split line into key and count
        list($key,$count) = explode("\t", $line);

        // if the last key retrieved is the same
        // as the current key that have been received
        if ($last_key === $key) {
            // increase number of items
            $number_of_items++;
            // increase running total of the key
            $running_total += $count;
            // (re)calculate average for that key
            $running_average = $running_total / $number_of_items;
        } else {
            if ($last_key != NULL)
                // output previous key and its running average
                printf("%s\t%.4f\n", $last_key, $running_average);
            // reset key, running total, running average
            // and number of items
            $last_key = $key;
            $number_of_items = 1;
            $running_total   = $count;
            $running_average = $count;
        }
    }

    if ($last_key != NULL)
        // output previous key and its running average
        printf("%s\t%.3f\n", $last_key, $running_average);
?>
