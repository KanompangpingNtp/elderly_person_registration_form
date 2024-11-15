@extends('layout.users_account_layout')
@section('account_layout')

@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif


<div class="container">
    <a href="{{ route('userRecordForm')}}">กลับหน้าเดิม</a><br><br>
    <h2 class="text-center">แก้ไขฟอร์ม</h2><br>
    <form action="{{ route('updateUserForm', $traders->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_id" value="{{ $traders->id }}">

        <!-- ฟอร์ม traders -->
        <div class="card mb-4">
            <div class="card-header">
                ข้อมูลผู้ยื่นคำขอ (Traders)
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="trade_type" class="form-label">ประเภทผู้ยื่น</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="trade_type" value="option_1" id="trade_type_1" required {{ $traders->trade_type == 'option_1' ? 'checked' : '' }}>
                        <label for="trade_type_1">แจ้งด้วยตนเองผู้ยื่นคำขอฯ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="trade_type" value="option_2" id="trade_type_2" required {{ $traders->trade_type == 'option_2' ? 'checked' : '' }}>
                        <label for="trade_type_2">แทนตามหนังสือมอบอำนาจ</label>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="trade_condition" class="form-label">เงื่อนไข</label>
                    <input type="text" name="trade_condition" class="form-control" id="trade_condition" value="{{ $traders->trade_condition }}">
                </div>

                <div class="row">


                    <div class="mb-3 col-md-3">
                        <label for="elderly_name" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" name="elderly_name" class="form-control" id="elderly_name" value="{{ $traders->elderly_name }}" required>
                    </div>


                    {{-- <div class="mb-3 col-md-2">
                        <label for="trader_citizen_id" class="form-label">เลขบัตรประชาชน</label>
                        <input type="text" name="trader_citizen_id" class="form-control" id="trader_citizen_id" value="{{ $traders->citizen_id }}" required>
                </div> --}}
                <div class="mb-3 col-md-2">
                    <label for="trader_citizen_id" class="form-label">เลขบัตรประชาชน</label>
                    <input type="text" name="trader_citizen_id" class="form-control" id="trader_citizen_id" value="{{ $traders->citizen_id }}" maxlength="13" pattern="\d{13}" title="กรุณากรอกตัวเลขให้ครบ 13 หลัก" required>
                </div>


                <div class="mb-3 col-md-2">
                    <label for="trader_phone_number" class="form-label">เบอร์ติดต่อ</label>
                    <input type="text" name="trader_phone_number" class="form-control" id="trader_phone_number" value="{{ $traders->phone_number }}">
                </div>

                <div class="mb-3 col-md-5">
                    <label for="address" class="form-label">ที่อยู่</label>
                    <textarea name="address" class="form-control" id="address">{{ $traders->address }}</textarea>
                </div>
            </div>
        </div>
</div>

<!-- ฟอร์ม persons -->
<div class="card mb-4">
    <div class="card-header">
        ข้อมูลบุคคล (Persons)
    </div>
    <div class="card-body">
        <div class="mb-3 col-md-3">
            <label for="written_at" class="form-label">เขียนที่</label>
            <input type="text" name="written_at" class="form-control" id="written_at" value="{{ old('written_at', $traders->persons->first()->written_at ?? '') }}" required>
        </div>

        <div class="mb-3 col-md-3">
            <label for="written_date" class="form-label">วันที่เขียน</label>
            <input type="date" name="written_date" class="form-control" id="written_date" value="{{ old('written_date', $traders->persons->first()->written_date ?? '') }}" required>
        </div>

        <div class="row">
            <div class="mb-3 col-md-2">
                <label for="salutation" class="form-label">คำนำหน้า</label>
                <input type="text" name="salutation" class="form-control" id="salutation" value="{{ old('salutation', $traders->persons->first()->salutation ?? '') }}" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="first_name" class="form-label">ชื่อ</label>
                <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name', $traders->persons->first()->first_name ?? '') }}" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="last_name" class="form-label">นามสกุล</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name', $traders->persons->first()->last_name ?? '') }}" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="birth_day" class="form-label">วันเกิด</label>
                <input type="date" name="birth_day" class="form-control" id="birth_day" value="{{ old('birth_day', $traders->persons->first()->birth_day ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="age" class="form-label">อายุ</label>
                <input type="number" name="age" class="form-control" id="age" value="{{ old('age', $traders->persons->first()->age ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="nationality" class="form-label">สัญชาติ</label>
                <input type="text" name="nationality" class="form-control" id="nationality" value="{{ old('nationality', $traders->persons->first()->nationality ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="house_number" class="form-label">บ้านเลขที่</label>
                <input type="text" name="house_number" class="form-control" id="house_number" value="{{ old('house_number', $traders->persons->first()->house_number ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="village" class="form-label">หมู่บ้าน</label>
                <input type="text" name="village" class="form-control" id="village" value="{{ old('village', $traders->persons->first()->village ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="alley" class="form-label">ซอย</label>
                <input type="text" name="alley" class="form-control" id="alley" value="{{ old('alley', $traders->persons->first()->alley ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="road" class="form-label">ถนน</label>
                <input type="text" name="road" class="form-control" id="road" value="{{ old('road', $traders->persons->first()->road ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="subdistrict" class="form-label">ตำบล</label>
                <input type="text" name="subdistrict" class="form-control" id="subdistrict" value="{{ old('subdistrict', $traders->persons->first()->subdistrict ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="district" class="form-label">อำเภอ</label>
                <input type="text" name="district" class="form-control" id="district" value="{{ old('district', $traders->persons->first()->district ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="province" class="form-label">จังหวัด</label>
                <input type="text" name="province" class="form-control" id="province" value="{{ old('province', $traders->persons->first()->province ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="postal_code" class="form-label">รหัสไปรษณีย์</label>
                <input type="text" name="postal_code" class="form-control" id="postal_code" value="{{ old('postal_code', $traders->persons->first()->postal_code ?? '') }}">
            </div>

            <div class="mb-3 col-md-3">
                <label for="person_phone_number" class="form-label">เบอร์ติดต่อ</label>
                <input type="text" name="person_phone_number" class="form-control" id="person_phone_number" value="{{ old('phone_number', $traders->persons->first()->phone_number ?? '') }}">
            </div>

            {{-- <div class="mb-3 col-md-3">
                <label for="person_citizen_id" class="form-label">เลขบัตรประชาชน</label>
                <input type="text" name="person_citizen_id" class="form-control" id="person_citizen_id" value="{{ old('citizen_id', $traders->persons->first()->citizen_id ?? '') }}" required>
        </div> --}}
        <div class="mb-3 col-md-3">
            <label for="person_citizen_id" class="form-label">เลขบัตรประชาชน</label>
            <input type="text" name="person_citizen_id" class="form-control" id="person_citizen_id" value="{{ old('citizen_id', $traders->persons->first()->citizen_id ?? '') }}" maxlength="13" pattern="\d{13}" title="กรุณากรอกตัวเลขให้ครบ 13 หลัก" required>
        </div>


        <div class="mb-3 col-md-12">
            <label class="form-label">สถานะภาพ</label>
            <div class="d-flex flex-wrap">
                <div class="form-check form-check-inline">
                    <input type="radio" name="marital_status" id="marital_status_single" value="single" required class="form-check-input" {{ old('marital_status', $traders->persons->first()->marital_status ?? '') == 'single' ? 'checked' : '' }}>
                    <label for="marital_status_single" class="form-check-label">โสด</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="marital_status" id="marital_status_married" value="married" required class="form-check-input" {{ old('marital_status', $traders->persons->first()->marital_status ?? '') == 'married' ? 'checked' : '' }}>
                    <label for="marital_status_married" class="form-check-label">แต่งงาน</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="marital_status" id="marital_status_widowed" value="widowed" required class="form-check-input" {{ old('marital_status', $traders->persons->first()->marital_status ?? '') == 'widowed' ? 'checked' : '' }}>
                    <label for="marital_status_widowed" class="form-check-label">หม้าย</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="marital_status" id="marital_status_divorced" value="divorced" required class="form-check-input" {{ old('marital_status', $traders->persons->first()->marital_status ?? '') == 'divorced' ? 'checked' : '' }}>
                    <label for="marital_status_divorced" class="form-check-label">หย่าร้าง</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="marital_status" id="marital_status_separated" value="separated" required class="form-check-input" {{ old('marital_status', $traders->persons->first()->marital_status ?? '') == 'separated' ? 'checked' : '' }}>
                    <label for="marital_status_separated" class="form-check-label">แยกกันอยู่</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="marital_status" id="marital_status_other" value="other" required class="form-check-input" {{ old('marital_status', $traders->persons->first()->marital_status ?? '') == 'other' ? 'checked' : '' }}>
                    <label for="marital_status_other" class="form-check-label">อื่นๆ</label>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<div class="card mb-4">
    <div class="card-header">
        persons_options
    </div>
    <div class="card-body">
        <!-- welfare_type checkboxes -->
        <div class="mb-3">
            <label class="form-label">ประเภทสวัสดิการ</label>
            <div>
                <input type="checkbox" name="welfare_type[]" id="welfare_type_aid" value="option1" {{ in_array('option1', explode(',', old('welfare_type', $traders->personsOptions->first()->welfare_type ?? ''))) ? 'checked' : '' }}>
                <label for="welfare_type_aid">ได้รับการสงเคราะห์เบี้ยยังชีพผู้ป่วยเอดส</label>
            </div>
            <div>
                <input type="checkbox" name="welfare_type[]" id="welfare_type_disability" value="option2" {{ in_array('option2', explode(',', old('welfare_type', $traders->personsOptions->first()->welfare_type ?? ''))) ? 'checked' : '' }}>
                <label for="welfare_type_disability">ได้รับการสงเคราะห์เบี้ยความพิการ</label>
            </div>
            <div>
                <input type="checkbox" name="welfare_type[]" id="welfare_type_relocation" value="option3" {{ in_array('option3', explode(',', old('welfare_type', $traders->personsOptions->first()->welfare_type ?? ''))) ? 'checked' : '' }}>
                <label for="welfare_type_relocation">ย้ายภูมิลําเนาเข้ามาอยู่ใหม่</label>
            </div>
        </div>


        <!-- welfare_other_types input (visible when 'ย้ายภูมิลําเนาเข้ามาอยู่ใหม่' is checked) -->
        <div class="mb-3" id="welfare_other_types_div" style="display: none;">
            <label for="welfare_other_types" class="form-label">รายละเอียดอื่นๆ</label>
            <input type="text" class="form-control" id="welfare_other_types" name="welfare_other_types" placeholder="กรอกข้อมูลเพิ่มเติม">
        </div>

        <!-- request_for_money_type radio buttons -->
        <div class="mb-3">
            <label class="form-label">ประเภทการรับเงิน</label>
            <div>
                <input type="radio" name="request_for_money_type" id="money_type_option1" value="option1" {{ old('request_for_money_type', $traders->personsOptions->first()->request_for_money_type ?? '') == 'option1' ? 'checked' : '' }} required>
                <label for="money_type_option1">รับเงินสดด้วยตนเอง</label>
            </div>
            <div>
                <input type="radio" name="request_for_money_type" id="money_type_option2" value="option2" {{ old('request_for_money_type', $traders->personsOptions->first()->request_for_money_type ?? '') == 'option2' ? 'checked' : '' }}>
                <label for="money_type_option2">รับเงินสดโดยบุคคลที่ได้รับมอบอํานาจจากผู้มีสิทธิ</label>
            </div>
            <div>
                <input type="radio" name="request_for_money_type" id="money_type_option3" value="option3" {{ old('request_for_money_type', $traders->personsOptions->first()->request_for_money_type ?? '') == 'option3' ? 'checked' : '' }}>
                <label for="money_type_option3">โอนเงินเข้าบัญชีเงินฝากธนาคารในนามผู้มีสิทธิ</label>
            </div>
            <div>
                <input type="radio" name="request_for_money_type" id="money_type_option4" value="option4" {{ old('request_for_money_type', $traders->personsOptions->first()->request_for_money_type ?? '') == 'option4' ? 'checked' : '' }}>
                <label for="money_type_option4">โอนเงินเข้าบัญชีเงินฝากธนาคารในนามบุคลที่ได้รับมอบอํานาจจากผู้มีสิทธิ</label>
            </div>
        </div>


        <!-- document_type checkboxes -->
        <div class="mb-3">
            <label class="form-label">ประเภทเอกสารที่แนบ</label>
            <div>
                <input type="checkbox" name="document_type[]" id="document_type_id_card" value="option1" {{ in_array('option1', explode(',', old('document_type', $traders->personsOptions->first()->document_type ?? ''))) ? 'checked' : '' }}>
                <label for="document_type_id_card">สำเนาบัตรประจำตัวประชาชน</label>
            </div>
            <div>
                <input type="checkbox" name="document_type[]" id="document_type_house_reg" value="option2" {{ in_array('option2', explode(',', old('document_type', $traders->personsOptions->first()->document_type ?? ''))) ? 'checked' : '' }}>
                <label for="document_type_house_reg">สำเนาทะเบียนบ้าน</label>
            </div>
            <div>
                <input type="checkbox" name="document_type[]" id="document_type_bank_book" value="option3" {{ in_array('option3', explode(',', old('document_type', $traders->personsOptions->first()->document_type ?? ''))) ? 'checked' : '' }}>
                <label for="document_type_bank_book">สำเนาสมุดบัญชีเงินฝากธนาคาร</label>
            </div>
            <div>
                <input type="checkbox" name="document_type[]" id="document_type_auth_letter" value="option4" {{ in_array('option4', explode(',', old('document_type', $traders->personsOptions->first()->document_type ?? ''))) ? 'checked' : '' }}>
                <label for="document_type_auth_letter">หนังสือมอบอํานาจพร้อมสำเนาบัตรประจำตัวประชาชนของผู้มอบอำนาจและผู้รับมอบอำนาจ</label>
            </div>
        </div>

    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        แนบไฟล์ (ถ้ามี)
        <button type="button" class="btn btn-secondary btn-sm float-end" id="add-file">เพิ่มไฟล์</button>
    </div>
    <div class="card-body">
        <div class="form-group col-md-5" id="attachments-container">
            <label for="attachments">แนบไฟล์ (ภาพหรือเอกสาร)</label>
            <div id="attachments">
                <input type="file" class="form-control mb-3" name="attachments[]" multiple>
            </div>
        </div>
        <div class="mb-3 col-md-8">
            <label>ไฟล์ที่แนบไว้แล้ว:</label>
            @foreach ($traders->attachments as $attachment)
            <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">{{ basename($attachment->file_path) }}</a>
            @endforeach
        </div>
    </div>
</div>

<!-- ปุ่มส่งข้อมูล -->
<div class="text-center mt-4">
    <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
</div>
</form>
</div>

<script>
    document.getElementById('add-file').addEventListener('click', function() {
        var attachmentsContainer = document.getElementById('attachments');
        var currentFiles = attachmentsContainer.getElementsByTagName('input').length;

        // จำกัดจำนวนไฟล์สูงสุดเป็น 4
        if (currentFiles < 4) {
            var newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'attachments[]';
            newInput.classList.add('form-control', 'mb-3'); // เพิ่มคลาส mb-4 ที่นี่

            // เพิ่ม input ใหม่ไปที่ container
            attachmentsContainer.appendChild(newInput);
        } else {
            alert('คุณสามารถเพิ่มไฟล์ได้สูงสุด 4 ไฟล์เท่านั้น');
        }
    });

</script>

@endsection
