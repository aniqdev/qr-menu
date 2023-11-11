<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Services\ImportService;

class ImportController extends Controller
{
    public function importItemsFromGoogleTable()
    {
        if (!auth()->user()->isSuperAdmin()) {
            return [
                'message' => 'No permission',
            ];
        }

        $company = auth()->user()->company;

        return ImportService::importItemsFromGoogleTable($company);
    }
}
