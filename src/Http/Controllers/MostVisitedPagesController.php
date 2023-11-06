<?php

namespace MinSolutions\Ga4Analytics\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use AkkiIo\LaravelGoogleAnalytics\Facades\LaravelGoogleAnalytics;

class MostVisitedPagesController extends Controller
{
    public function __invoke()
    {
        return $this->mostVisitedPages();
    }

    private function mostVisitedPages()
    {
        return LaravelGoogleAnalytics::getMostViewsByPage(\AkkiIo\LaravelGoogleAnalytics\Period::days(7), $count = 15);

    }
}

