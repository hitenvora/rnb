<?php

namespace App\Console\Commands;

use App\Models\Admin\AdminLogin;
use App\Models\admin\Role;
use App\Models\Master\Master;
use App\Models\Notification\Notification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        info("Cron Job running at " . now());
        // code here
        $Masters = Master::get();
        foreach ($Masters as $Master) {
            if ($Master->bes_follow_up_date != '' || $Master->bes_follow_up_date != null) {
                $bes_follow_up_dates = explode(',', $Master->bes_follow_up_date);
                foreach ($bes_follow_up_dates as $key => $date) {
                    $follow_up_date = Carbon::createFromDate($date)->addDays(8)->format('d-m-Y');
                    $now_date = Carbon::now()->format('d-m-Y');
                    if ($follow_up_date == $now_date) {
                        // notification table ma entry
                        $admins = AdminLogin::whereIn('role_id', [1, 2])->get();
                        foreach ($admins as $admin) {
                            // Create notification entry for admin
                            Notification::create([
                                'master_id' => $Master->id,
                                'admin_id' => $admin->id,
                                'role_id' => $admin->role_id,
                                'message' => 'Your Follow Up date Issued.',
                            ]);
                        }
                    }
                }
            }
        }
        $Masters = Master::get();
        foreach ($Masters as $Master) {
            $do_deposit_letter_date = $Master->do_deposit_letter_date;

            if ($do_deposit_letter_date) {
                info("do_deposit_letter_date: " . $do_deposit_letter_date); // Log the date for debugging

                $follow_up_date = Carbon::createFromDate($do_deposit_letter_date)->addDays(8)->format('d-m-Y');
                $now_date = Carbon::now()->format('d-m-Y');

                if ($follow_up_date == $now_date) {
                    // notification table ma entry
                    $admins = AdminLogin::whereIn('role_id', [1, 4])->get();
                    foreach ($admins as $admin) {
                        // Create notification entry for admin
                        Notification::create([
                            'master_id' => $Master->id,
                            'admin_id' => $admin->id,
                            'role_id' => $admin->role_id,
                            'message' => 'Your Deposit Issued Letter Date Issued.',
                        ]);
                    }
                }
            }
        }
        $Masters = Master::get();
        foreach ($Masters as $Master) {
            if ($Master->dtp_f_date != '' || $Master->dtp_f_date != null) {
                $dtp_f_dates = explode(',', $Master->dtp_f_date);
                foreach ($dtp_f_dates as $key => $date) {
                    $follow_up_date = Carbon::createFromDate($date)->addDays(8)->format('d-m-Y');
                    $now_date = Carbon::now()->format('d-m-Y');
                    if ($follow_up_date == $now_date) {
                        // notification table ma entry
                        $admins = AdminLogin::whereIn('role_id', [1, 4])->get();
                        foreach ($admins as $admin) {
                            // Create notification entry for admin
                            Notification::create([
                                'master_id' => $Master->id,
                                'admin_id' => $admin->id,
                                'role_id' => $admin->role_id,
                                'message' => 'Your Dtp Approval Date Issued',
                            ]);
                        }
                    }
                }
            }
        }
    }
}
