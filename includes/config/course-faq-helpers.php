<?php

/**
 * Returns true only when every FAQ row has non-empty question and answer.
 * Used to hide the FAQ block entirely when content is incomplete.
 */
function course_faq_is_complete(array $items) {
    if ($items === []) {
        return false;
    }
    foreach ($items as $row) {
        if (!is_array($row)) {
            return false;
        }
        $q = isset($row['q']) ? trim((string) $row['q']) : '';
        $a = isset($row['a']) ? trim((string) $row['a']) : '';
        if ($q === '' || $a === '') {
            return false;
        }
    }
    return true;
}
