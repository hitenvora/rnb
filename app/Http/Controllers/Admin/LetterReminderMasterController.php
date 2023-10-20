<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminLogin;
use App\Models\Admin\LetterReminderMasters;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class LetterReminderMasterController extends Controller
{


    public function storeImage($img, $path)
    {
        $path = public_path($path);
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $img->extension();
        $img->move($path, $imageName);
        return $imageName;
    }


    public function index()
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('admin.letter_reminder_master', compact('user', 'role'));
    }

    public function insert(Request $request)
    {




        if ($request->letter_reminder_id != '') {
            $letter_reminder = LetterReminderMasters::find($request->letter_reminder_id);
            if (!$letter_reminder) {
                return response()->json(['status' => 400, 'msg' => 'Sub division not found!']);
            }
            $letter_reminder->is_active = $request->is_active;
        } else {
            $letter_reminder = new LetterReminderMasters();
        }
        $letter_reminder->date = $request->input('date');
        $letter_reminder->subject = $request->input('subject');
        if (isset($request->upload_img)) {
            $letter_reminder->upload_img = $this->storeImage($request->upload_img, 'upload/Letter-reminder/');
        }

        $letter_reminder->submit_to = $request->input('submit_to');
        $letter_reminder->expire_date = $request->input('expire_date');
        $letter_reminder->is_active = $request->input('is_active');
        $letter_reminder->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_letter_reminder(Request $request)
    {
        $letter_reminder = LetterReminderMasters::orderBy('id', 'desc')->get();

        foreach ($letter_reminder as $key => $record) {
            $id = $record->id;
            if ($record->is_active == 0) {
                $letter_reminder[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $letter_reminder[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            $letter_reminder[$key]['eye_icon'] =  '<a href="upload/Letter-reminder/' . $record->upload_img . '" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/829/829117.png" alt="map" style="height: 20px; width: 20px; "></a>';
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editsubdivision(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $letter_reminder[$key]['action'] =  $action;
        }
        return Datatables::of($letter_reminder)
            ->addIndexColumn()
            ->rawColumns(['action', 'active_button', 'eye_icon'])
            ->make(true);
    }

    public function letter_reminder_edit($id)
    {
        $letter_reminder = LetterReminderMasters::where('id', '=', $id)->first();
        if ($letter_reminder) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $letter_reminder]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $letter_reminder = LetterReminderMasters::find($id);
        $letter_reminder->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
