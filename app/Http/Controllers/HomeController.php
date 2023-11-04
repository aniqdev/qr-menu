<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use App\Models\{Company, User};
use App\Services\StatisticsService;

class HomeController extends Controller
{
    public function dashboardIframeStatistic()
    {
        return view('admin.dashboard.statistic');
    }

    public function statistics(Request $request)
    {
        // dd(StatisticsService::getLastVisits()->toArray());
        return view('admin.statistics', [
            'online' => StatisticsService::getOnline(),
            'visits' => StatisticsService::getVisits(),
            'reviews' => 0, // in developing
            'chartData' => StatisticsService::getChartData(),
            'lastVisits' => StatisticsService::getLastVisits(),
        ]);
    }

    public function landing()
    {
        return view('landing.index');
    }

    public function landingPageList()
    {
        return view('landing.page-list');
    }

    public function runCommand(Request $request)
    {
        abort_if(!auth()->user()->isSuperAdmin(), 401);

        $result = Process::run($request->command);
// debug(mb_detect_encoding($result->errorOutput(), 'auto'));
        $output = $request->output . PHP_EOL . $request->command . ' -> ' . $result->output();

        return [
            // 'message' => 'Success',
            'request' => $request->all(),
            'jquery' => [
                ['element' => '.output-textarea', 'method' => 'text', 'args' => [trim($output)]],
                ['element' => '.command-input', 'method' => 'val', 'args' => ['']],
            ]
        ];
    }

    public function dashboard()
    {
        if (request('become-admin-of-company') && auth()->user()->isSuperAdmin()) {
            auth()->user()->update(['company_id' => +request('become-admin-of-company')]);
        }

        $companies = Company::paginate(20);

        $users = User::paginate(20);

        return view('admin.dashboard', [
            'companies' => $companies,
            'users' => $users
        ]);
    }

    public function qrsaas()
    {
        $availableLanguages = [
            "EN" => "English",
            "IT" => "Italian",
            "FR" => "French",
            "DE" => "German",
            "ES" => "Spanish",
            "RU" => "Russian",
            "PT" => "Portuguese",
            "TR" => "Turkish",
            "ar" => "Arabic",
        ];

        $pages = json_decode(file_get_contents(public_path('data/pages.json')));

        // dd($pages);

        return view('qrsaas.home', [
            'availableLanguages' => $availableLanguages,
            'locale' => 'EN',
            'features' => json_decode(file_get_contents(public_path('data/features.json')), true),
            'plans' => json_decode(file_get_contents(public_path('data/plans.json')), true),
            'pages' => $pages,
            'col' => 4,
        ]);
    }
}
