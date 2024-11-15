<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Trader;
use App\Models\Person;
use App\Models\PersonsOption;
use App\Models\FormAttachment;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Reply;

class UserAccountController extends Controller
{
    //
    public function userAccountFormsIndex()
    {
        $user = User::with('userDetails')->find(Auth::id());

        return view('users_account.users_account', compact('user'));
    }

    public function userRecordForm()
    {
        $traders = Trader::with(['user', 'replies', 'attachments'])
            ->where('user_id', Auth::id())
            ->get();

        // ส่งข้อมูลไปยัง view
        return view('users_account_record.users_account_record', compact('traders'));
    }

    public function userShowFormEdit($id)
    {
        $traders = Trader::with('persons', 'personsOptions', 'attachments')->findOrFail($id); // ดึงข้อมูลฟอร์มพร้อมไฟล์แนบ

        return view('users_account_edit_form.users_account_edit_form', compact('traders')); // ส่งข้อมูลไปยัง view
    }

    public function updateUserForm(Request $request, $id)
    {
        $request->validate([
            // Fields for traders table
            'trade_type' => 'required|in:option_1,option_2',
            'trade_condition' => 'nullable|string',
            'elderly_name' => 'required|string|max:255',
            'trader_citizen_id' => 'required|string',
            'trader_phone_number' => 'nullable|string|max:20', // phone_number สำหรับ traders
            'address' => 'nullable|string',

            // Fields สำหรับ persons table
            'written_at' => 'required|string|max:255',
            'written_date' => 'required|date',
            'salutation' => 'required|string|max:50',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_day' => 'nullable|date',
            'age' => 'nullable|integer',
            'nationality' => 'nullable|string|max:100',
            'house_number' => 'nullable|string|max:255',
            'village' => 'nullable|string|max:255',
            'alley' => 'nullable|string|max:255',
            'road' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string',
            'person_phone_number' => 'nullable|string|max:20',
            'person_citizen_id' => 'required|string',
            'marital_status' => 'nullable|in:single,married,widowed,divorced,separated,other',

            // Fields สำหรับ persons_options table
            'welfare_type' => 'nullable|array',
            'welfare_type.*' => 'string|in:option1,option2,option3',
            'welfare_other_types' => 'nullable|string|required_if:welfare_type.*,ย้ายภูมิลําเนาเข้ามาอยู่ใหม่',
            'request_for_money_type' => 'required|string|in:option1,option2,option3,option4',
            'document_type' => 'nullable|array',
            'document_type.*' => 'string|in:option1,option2,option3,option4',

            'attachments.*' => 'nullable|file|mimes:jpeg,png,pdf,docx|max:10240',
        ]);

        $trader = Trader::findOrFail($id);
        $trader->update([
            'trade_type' => $request->trade_type,
            'trade_condition' => $request->trade_condition,
            'elderly_name' => $request->elderly_name,
            'citizen_id' => $request->trader_citizen_id,
            'address' => $request->address,
            'phone_number' => $request->trader_phone_number,
            'status' => 1,
        ]);

        $person = Person::where('trader_id', $id)->firstOrFail();
        $person->update([
            'written_at' => $request->written_at,
            'written_date' => $request->written_date,
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_day' => $request->birth_day,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'house_number' => $request->house_number,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->person_phone_number,
            'citizen_id' => $request->person_citizen_id,
            'marital_status' => $request->marital_status ?? 'other',
        ]);

        $personsOption = PersonsOption::where('trader_id', $id)->firstOrFail();
        $personsOption->update([
            'welfare_type' => $request->welfare_type ? implode(',', $request->welfare_type) : null,
            'welfare_other_types' => $request->welfare_other_types,
            'request_for_money_type' => $request->request_for_money_type,
            'document_type' => $request->document_type ? implode(',', $request->document_type) : null,
        ]);

        if ($request->hasFile('attachments')) {
            $oldAttachments = FormAttachment::where('trader_id', $trader->id)->get();

            foreach ($oldAttachments as $attachment) {
                Storage::disk('public')->delete($attachment->file_path);
                $attachment->delete();
            }

            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                FormAttachment::create([
                    'trader_id' => $trader->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกอัปเดตเรียบร้อยแล้ว!');
    }

    public function exportUserPDF($id)
    {
        $trader = Trader::with('persons', 'personsOptions',)->find($id);

        $pdf = Pdf::loadView('admin_export_pdf.admin_export_pdf', compact('trader'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('แบบคำขอร้องทั่วไป' . $trader->id . '.pdf');
    }

    public function userReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // dd($request);
        // dd(auth()->id());

        Reply::create([
            'trader_id' => $formId,
            'user_id' => auth()->id(),
            'reply_text' => $request->message,
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }
}
