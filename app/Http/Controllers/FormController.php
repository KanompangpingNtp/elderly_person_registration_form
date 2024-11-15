<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trader;
use App\Models\Person;
use App\Models\PersonsOption;
use App\Models\FormAttachment;

class FormController extends Controller
{
    //
    public function FormIndex()
    {
        return view('users_form.users_form');
    }

    public function FormCreate(Request $request)
    {
        // Validate ข้อมูลสำหรับ traders และ persons
        $request->validate([
            // Fields for traders table
            'trade_type' => 'required|in:option_1,option_2',
            'trade_condition' => 'nullable|string',
            'elderly_name' => 'required|string|max:255',
            'trader_citizen_id' => 'required|string', // citizen_id สำหรับ traders
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

        // dd($request);

        $userId = auth()->id();
        // dd($userId);

        // $userId = $userId ?: null; // กรณีไม่มีผู้ใช้ ให้เป็น null


        // สร้างข้อมูล Trader
        $trader = Trader::create([
            // 'user_id' => auth()->id(),
            'user_id' => $userId, // ตรวจสอบ user_id
            'trade_type' => $request->trade_type,
            'trade_condition' => $request->trade_condition,
            'elderly_name' => $request->elderly_name,
            'citizen_id' => $request->trader_citizen_id,
            'address' => $request->address,
            'phone_number' => $request->trader_phone_number,
            'status' => 1,
        ]);
        // if (auth()->check()) {
        //     $trader = Trader::create([
        //         'user_id' => auth()->id(),
        //         'trade_type' => $request->trade_type,
        //         'trade_condition' => $request->trade_condition,
        //         'elderly_name' => $request->elderly_name,
        //         'citizen_id' => $request->trader_citizen_id,
        //         'address' => $request->address,
        //         'phone_number' => $request->trader_phone_number,
        //         'status' => 1,
        //     ]);
        // } else {
        //     return redirect()->back()->with('error', 'กรุณาล็อกอินก่อน');
        // }

        // สร้างข้อมูล Person
        $person = Person::create([
            'trader_id' => $trader->id,
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
            'phone_number' => $request->person_phone_number, // phone_number ของ person
            'citizen_id' => $request->person_citizen_id, // citizen_id ของ person
            'marital_status' => $request->marital_status ?? 'other' // กรณีที่ไม่ได้เลือก marital_status
        ]);

        // สร้างข้อมูล PersonsOption
        PersonsOption::create([
            'trader_id' => $trader->id,
            'welfare_type' => $request->welfare_type ? implode(',', $request->welfare_type) : null,
            'welfare_other_types' => $request->welfare_other_types,
            'request_for_money_type' => $request->request_for_money_type,
            'document_type' => $request->document_type ? implode(',', $request->document_type) : null,
        ]);

        if ($request->hasFile('attachments')) {
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

        return redirect()->back()->with('success', 'ข้อมูลถูกบันทึกเรียบร้อยแล้ว');
    }
}
