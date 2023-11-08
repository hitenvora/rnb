<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminLogin;
use App\Models\Master\Master;
use App\Models\Notification\Notification;
use App\Notifications\CustomNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Http;

class MasterFormController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        // $notifications = Notification::with('rolename')->where('id', '=', $user->id)->first();
        $notifications = Notification::where('master_id', $user->id)
        ->where('role_id', $role->role_id)
        ->get();
        return view('admin.master_form', compact('user', 'role','notifications'));
    }


    // public function schedule(Schedule $schedule)
    // {
    //     $schedule->call(function () {
    //         // add this function in CRON job
    //         info("Cron Job running at " . now());

    //         $Masters = Master::get();
    //         foreach ($Masters as $Master) {
    //             if ($Master->bes_follow_up_date != '' || $Master->bes_follow_up_date != null) {
    //                 $bes_follow_up_dates = explode(',', $Master->bes_follow_up_date);
    //                 foreach ($bes_follow_up_dates as $key => $date) {
    //                     $follow_up_date = Carbon::createFromDate($date)->addDays(5)->format('d-m-Y');
    //                     $now_date = Carbon::now()->format('d-m-Y');
    //                     if ($follow_up_date == $follow_up_date) {
    //                         // notification table ma entry
    //                         Notification::create([
    //                             'name' => $date['name']

    //                         ]);
    //                     }
    //                 }
    //             }
    //         }

    //         $eightDaysFromNow = Carbon::now()->addDays(2);
    //         $usersWithUpcomingDates = Master::where('bes_follow_up_date', '=', $eightDaysFromNow)->get();
    //         foreach ($usersWithUpcomingDates as $user) {
    //             $user->notify(new CustomNotification);
    //         }
    //     })->daily();
    // }
}
