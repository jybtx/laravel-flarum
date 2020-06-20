<?php

namespace App\Observers;

use App\Models\Link;
use Maatwebsite\Excel\Classes\Cache;

class LinkObserver
{
    public function saved(Link $link)
    {
        Cache::forget($link->cache_key);
    }
}
