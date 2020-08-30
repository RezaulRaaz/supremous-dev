<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;

class DashboardController extends Controller
{
    public function Dashboard(){
        return view('admin/dashboard');
    }

    public function item()
    {
        return view('admin/pages/item');
    }

    public function brands()
    {
        return view('admin/pages/brand');
    }

    public function categories()
    {
        return view('admin/pages/category');
    }

    public function products()
    {
        return view('admin/pages/Product/product_list');
    }

    public function variations()
    {
        return view('admin/pages/variations');
    }

    public function menu()
    {
        return view('admin/pages/menu');
    }

    public function setting()
    {
        $setting=Setting::orderBy('id', 'DESC')->first();
        return view('admin/pages/settings',compact('setting'));
    }

    public function profile()
    {
        return view('admin/pages/profile/profile');
    }
}
