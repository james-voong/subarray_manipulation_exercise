<?php

/**
 * This is the solution function.
 *
 * @param array $array
 * @param int $length1
 * @param int $length2
 *
 * @return int
 */
function solution(array $array, int $length1, int $length2) : int {

    // Impossible to get 2 disjoint intervals.
    if (count($array) < $length1 + $length2) {
        return -1;
    }

    // Find the max value for $length1.
    $length1_values = find_subset_max($array, $length1);
    $length1_max = $length1_values['current_max'];

    // Replace the used sequence (with NULL) from the array to prevent overlap when calculating $length2.
    array_splice($array, $length1_values['indexstart'], $length1, [NULL]);

    // Find the max value for $length2.
    $length2_values = find_subset_max($array, $length2);
    $length2_max = $length2_values['current_max'];

    return $length1_max + $length2_max;

}

/**
 * Takes an array, finds the longest consecutive chain of $length,
 * and returns an array containing the sum and the index that this chain starts at.
 *
 * @param array $array
 * @param int $length
 *
 * @return array associative array containing the max value and the index which the sequence starts at
 */
function find_subset_max(array $array, int $length) : array {

    $current_max = 0;
    $sliceindexstart = NULL;

    for ($i = 0; $i < count($array); $i++) {

        // Take a slice of the array of size $length.
        $slice = array_slice($array, $i, $length);

        // If NULL is present in the array, it means we have already removed a sequence from the array.
        if (in_array(NULL, $slice, TRUE)) {

            // Since NULL was in the slice, we need to take the next value.
            $slice[] = $array[$i + $length + 1];
        }

        if (array_sum($slice) > $current_max) {
            $current_max = array_sum($slice);
            $sliceindexstart = $i;
        }
    }

    return ['current_max' => $current_max, 'indexstart' => $sliceindexstart];
}
