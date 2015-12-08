<?php
/**
 * Index utility
 *
 * @author  Tim Lochmüller
 */

namespace HDNET\Calendarize\Utility;

use HDNET\Calendarize\Domain\Model\Index;

/**
 * Index utility
 */
class IndexUtility
{

    /**
     * Check if the Index is part of the range
     *
     * @param Index     $index
     * @param \DateTime $rangeStart
     * @param \DateTime $rangeEnd
     *
     * @see IndexRepository::addTimeFrameConstraints
     *
     * @return bool
     */
    static public function isIndexInRange($index, \DateTime $rangeStart, \DateTime $rangeEnd)
    {
        $indexStart = $index->getStartDateComplete();
        $indexEnd = $index->getEndDateComplete();

        // start in
        if ($indexStart >= $rangeStart && $indexStart <= $rangeEnd) {
            return true;
        }

        // end in
        if ($indexEnd >= $rangeStart && $indexEnd <= $rangeEnd) {
            return true;
        }

        // around range
        if ($indexStart <= $rangeStart && $indexEnd >= $rangeEnd) {
            return true;
        }

        return false;
    }

}