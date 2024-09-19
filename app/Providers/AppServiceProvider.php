<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\VisitCountModel;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        if (Schema::hasTable('visit_count_data')) {
            $userIp = $request->ip();

            // Check if the user IP exists in the database
            $existingIp = VisitCountModel::where('ip', $userIp)->first();

            if ($existingIp) {
                $lastAddedTime = strtotime($existingIp->created_at);
                $twoHoursAgo = strtotime('-2 hours');

                if ($lastAddedTime < $twoHoursAgo) {
                    VisitCountModel::create(['ip' => $userIp]);
                }
            } else {
                VisitCountModel::create(['ip' => $userIp]);
            }

            // Get the total count of visitors
            $totalVisitors = VisitCountModel::count();

            // Share the total visitor count globally
            View::share('totalVisitors', $totalVisitors);
        }
    }
}
