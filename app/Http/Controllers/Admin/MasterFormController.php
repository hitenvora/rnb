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
        $notifications = Notification::all();

        // return($notifications);
        return view('admin.master_form', compact('user', 'role', 'notifications'));
    }

    public function delete(Request $request, $id)
    {
        // Find the notification by ID
        $notification = Notification::find($id);

        if ($notification) {
            // Delete the notification
            $notification->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Notification not found']);
    }

 
}
