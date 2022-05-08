<?php

namespace App\Support;

class SeederSupport
{
    public static function getSeederRemaningLoops(int $count, int $chunk = 5000, int $targetCount = 1000000)
    {
        if ($count == 0) {
            return (int)round($targetCount / $chunk, 0);
        }

        if ($count >= $targetCount) {
            return 0;
        }

        if ($count > 0) {
            $diff = $targetCount - $count;

            return (int)round($diff / $chunk, 0);
        }

        return 1;
    }
}
