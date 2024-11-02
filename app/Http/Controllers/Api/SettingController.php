<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Get Setting
     */
    public function index()
    {
        $setting = Setting::first();
        if ($setting) {
            return response()->json([
                'success' => true,
                'message' => 'Sukses menampilkan data',
                'data' => $setting
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Setting not found',
            'data' => null
        ], 404);
    }
}
