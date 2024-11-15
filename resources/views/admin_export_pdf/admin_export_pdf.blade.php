<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: 'sarabun', sans-serif;
            font-size: 16px;
            margin-left: 100px;
            margin-right: 20px;
            line-height: 5px;
        }

        h3 {
            text-align: center;
            margin-top: 0;
        }

        .right {
            text-align: right;
        }

        .underline {
            text-decoration: underline;
            display: inline-block;
            width: auto;
        }

        .content-section {
            margin-bottom: 20px;
        }

        .content-section p {
            line-height: 2;
            margin: 0;
        }

        .signature-section {
            margin-top: 30px;
        }

        .signature-line {
            display: inline-block;
            width: 300px;
            border-bottom: 1px solid #000;
            margin-top: 20px;
        }

        .note {
            margin-top: 50px;
        }

        .note p {
            margin: 5px 0;
        }

        .officer-note {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .officer-note-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .dotted-line {
            border-bottom: 1px dotted #000;
            width: 100%;
            height: 20px;
            margin-bottom: 5px;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
        }

        .column {
            width: 48%;
        }

        .column p {
            margin: 10px 0;
        }

        span.fullname {
            border-bottom: 1px dashed;
            padding-left: 20px;
            padding-right: 100px;
            color: blue;
        }

        span.fullname_2 {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.age {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.occupation {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.house_no {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.village {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.alley {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 40px;
            color: blue;
        }

        span.road {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.sub_district {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.district {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 90px;
            color: blue;
        }

        span.province {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 90px;
            color: blue;
        }

        span.address {
            width: 100%;
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 100px;
            /* ลดขนาด padding */
            color: blue;
            word-break: break-all;
            /* ใช้ break-all แทน */
        }

        span.phone {
            display: inline;
            /* ใช้ inline แทน */
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            /* ลดขนาด padding */
            color: blue;
        }

        span.written_at {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 80px;
            color: blue;
        }

        span.first_name {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.last_name {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.birth_day {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.nationality {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.house_number {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.subdistrict {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.postal_code {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 90px;
            color: blue;
        }

        span.phone_number {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 90px;
            color: blue;
        }

        span.citizen_id {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        input[type="checkbox"] {
            vertical-align: middle;
            margin: 0 5px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .column {
            width: 48%;
            border: 1px solid black;
            padding: 10px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group input {
            margin-right: 5px;
        }

        .signature-area {
            margin-top: 20px;
        }

        .signature-area div {
            margin-top: 40px;
            text-align: center;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        .custom-td {
            vertical-align: top;
            padding: 10px;
            border: 1px solid black;
        }

        .checkbox-group {
            margin-top: 10px;
        }

        .signature-area {
            margin-top: 20px;
            text-align: center;
        }

        .line {
            border-bottom: 1px dotted black;
            display: inline-block;
            width: 100%;
            height: 1px;
            margin: 0 2px;
        }

        span.day {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.month {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.year {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

    </style>
    <title>PDF Report</title>
</head>
<body>

    @php
    $citizen_id = $trader->persons->first()->citizen_id;
    $formatted_id = substr($citizen_id, 0, 1) . '-' .
    substr($citizen_id, 1, 4) . '-' .
    substr($citizen_id, 5, 5) . '-' .
    substr($citizen_id, 10, 2) . '-' .
    substr($citizen_id, 12, 1);

    // จัดรูปแบบ citizen_id ของ $trader->citizen_id
    $trader_citizen_id = $trader->citizen_id;
    $formatted_trader_citizen_id = substr($trader_citizen_id, 0, 1) . '-' .
    substr($trader_citizen_id, 1, 4) . '-' .
    substr($trader_citizen_id, 5, 5) . '-' .
    substr($trader_citizen_id, 10, 2) . '-' .
    substr($trader_citizen_id, 12, 1);

    use Carbon\Carbon;
    $date = Carbon::parse($trader->persons->first()->written_date);
    $day = $date->day;
    $month = $date->locale('th')->translatedFormat('F'); // เดือนเป็นภาษาไทย
    $year = $date->year + 543; // เปลี่ยน ค.ศ. เป็น พ.ศ.
    @endphp

    <div class="container">
        <br>
        <br>
        <h3>แบบฟอร์มการขึ้นทะเบียนผู้สูงอายุ</h3>
        <p class="right">ทะเบียนเลขที่ .........................../</p>
        <p style="text-align: center;">แบบคำชี้ขึ้นทะเบียนรับเงินเบี้ยยังชีพผู้สูงอายุ ประจำปีงบประมาณ พ.ศ.</p>
        <p><span>หมายเหตุ</span> ให้ขีดเส้นข้อความที่ไม่ต้องการออก และทำเครื่องหมาย / ในช่อง <input type="checkbox"> หน้าข้อความที่ต้องการ</p>
        <p> ผู้ยื่นคำขอฯ&nbsp;
            @if(in_array('option_1', explode(',', $trader->trade_type )))
            <input type="checkbox" checked disabled> แจ้งด้วยตนเองผู้ยื่นคำขอฯ
            @else
            <input type="checkbox" disabled> แจ้งด้วยตนเองผู้ยื่นคำขอฯ
            @endif

            @if(in_array('option_2', explode(',', $trader->trade_type )))
            <input type="checkbox" checked disabled> แทนตามหนังสือมอบอำนาจ
            @else
            <input type="checkbox" disabled> แทนตามหนังสือมอบอำนาจ
            @endif

            เกี่ยวข้องเป็น <span class="submission">{{$trader->trade_condition}}</span>
        </p>
        <p>กับผู้สูงอายุที่ขอขึ้นทะเบียน ชื่อ-นามสกุล <span class="fullname">{{$trader->elderly_name}}</span>เลขประจำตัวประชาชนผู้รับมอบอำนาจ</p>
        <p><span class="citizen_id">{{$formatted_trader_citizen_id}}</span> ที่อยู่ <span class="address">{{$trader->address}}</span></p>
        <p>โทรศัพท์ <span class="phone">{{$trader->phone_number}}</span></p>

        <p class="right">เขียนที่ <span class="written_at">{{$trader->persons->first()->written_at}}</span></p>
        <p class="right">วัน<span class="day">{{ $day }}</span>เดือน<span class="month">{{ $month }}</span>พ.ศ. <span class="year">{{ $year }}</span></p>

        <p style="margin-left: 55px;">ด้วยข้าพเจ้า ชื่อ <span class="first_name">{{$trader->persons->first()->salutation}}{{$trader->persons->first()->first_name}}</span>นามสกุล<span class="last_name">{{$trader->persons->first()->last_name}} </span></p>
        <p>เกิดวันที่ <span class="birth_day">{{$trader->persons->first()->birth_day}}</span>อายุ<span class="age">{{$trader->persons->first()->age}}</span>ปี สัญชาติ<span class="nationality">{{$trader->persons->first()->nationality}}</span>มีชื่ออยู่ในสําเนา </p>
        <p>ทะเบียนบ้านเลขท <span class="house_number">{{$trader->persons->first()->house_number}}</span>หมู่ที่/ชุมชน<span class="village">{{$trader->persons->first()->village}}</span>ตรอก/ซอย<span class="alley">{{$trader->persons->first()->alley}}</span>ถนน<span class="road">{{$trader->persons->first()->road}}</span></p>
        <p>ตําบล/แขวง <span class="subdistrict">{{$trader->persons->first()->subdistrict}}</span>อําเภอ/เขต <span class="district">{{$trader->persons->first()->district}}</span>จังหวัด<span class="province">{{$trader->persons->first()->province}}</span></p>
        <p>รหัสไปรษณีย<span class="postal_code">{{$trader->persons->first()->postal_code}}</span>โทรศัพท์<span class="phone_number">{{$trader->persons->first()->phone_number}}</span>หมายเลขบัตรประจําตัวประชาชนของ</p>
        <p>ผู้ยื่นคําขอ <span class="citizen_id">{{$formatted_id}}</span></p>

        <p> สถานะภาพ&nbsp;
            @if(in_array('single', explode(',', $trader->persons->first()->marital_status)))
            <input type="checkbox" checked disabled> โสด
            @else
            <input type="checkbox"  disabled> โสด
            @endif
            &nbsp;
            @if(in_array('married', explode(',', $trader->persons->first()->marital_status)))
            <input type="checkbox" checked disabled> แต่งงาน
            @else
            <input type="checkbox" disabled> แต่งงาน
            @endif
            &nbsp;
            @if(in_array('widowed', explode(',', $trader->persons->first()->marital_status)))
            <input type="checkbox" checked disabled> หม้าย
            @else
            <input type="checkbox" disabled> หม้าย
            @endif
            &nbsp;
            @if(in_array('divorced', explode(',', $trader->persons->first()->marital_status)))
            <input type="checkbox" checked disabled> หย่าร้าง
            @else
            <input type="checkbox" disabled> หย่าร้าง
            @endif
            &nbsp;
            @if(in_array('separated', explode(',', $trader->persons->first()->marital_status)))
            <input type="checkbox" checked disabled> แยกกันอยู่
            @else
            <input type="checkbox" disabled> แยกกันอยู่
            @endif
            &nbsp;
            @if(in_array('other', explode(',', $trader->persons->first()->marital_status)))
            <input type="checkbox" checked disabled> อื่นๆ
            @else
            <input type="checkbox" disabled> อื่นๆ
            @endif
        </p>

        <p> @if(in_array('option1', explode(',', $trader->personsOptions->first()->welfare_type)))
            <input type="checkbox" checked disabled> ได้รับการสงเคราะห์เบี้ยยังชีพผู้ป่วยเอดส์
            @else
            <input type="checkbox" disabled> ได้รับการสงเคราะห์เบี้ยยังชีพผู้ป่วยเอดส์
            @endif
            &nbsp;
            @if(in_array('option2', explode(',', $trader->personsOptions->first()->welfare_type)))
            <input type="checkbox" checked disabled> ได้รับการสงเคราะห์เบี้ยความพิการ
            @else
            <input type="checkbox" disabled> ได้รับการสงเคราะห์เบี้ยความพิการ
            @endif
            &nbsp;
            <br>
            @if(in_array('option3', explode(',', $trader->personsOptions->first()->welfare_type)))
            <input type="checkbox" checked disabled> ย้ายภูมิลําเนาเข้ามาอยู่ใหม
            @else
            <input type="checkbox" disabled> ย้ายภูมิลําเนาเข้ามาอยู่ใหม
            @endif
            &nbsp;
            อื่นๆ
            <span class="welfare_other_types">
                @if(!empty($trader->personsOptions->first()->welfare_other_types))
                {{ $trader->personsOptions->first()->welfare_other_types }}
                @else
                .......................................................
                @endif
            </span>
        </p>

        <p style="margin-left: 55px;">มีความประสงค์ขอรับเงินเบี้ยยังชีพผู้สูงอายุ ประจําปีงบประมาณ พ.ศ. โดยวิธีดังต่อไปนี้ (เลือก 1 วิธี) </p>
        <p>
            @if(in_array('option1', explode(',', $trader->personsOptions->first()->request_for_money_type)))
            <input type="checkbox" checked disabled> รับเงินสดด้วยตนเอง
            @else
            <input type="checkbox" disabled> รับเงินสดด้วยตนเอง
            @endif
            &nbsp;
            @if(in_array('option2', explode(',', $trader->personsOptions->first()->request_for_money_type)))
            <input type="checkbox" checked disabled> รับเงินสดโดยบุคคลที่ได้รับมอบอํานาจจากผู้มีสิทธิ
            @else
            <input type="checkbox" disabled> รับเงินสดโดยบุคคลที่ได้รับมอบอํานาจจากผู้มีสิทธิ
            @endif
            &nbsp;

            <br>
            @if(in_array('option3', explode(',', $trader->personsOptions->first()->request_for_money_type)))
            <input type="checkbox" checked disabled> โอนเงินเข้าบัญชีเงินฝากธนาคารในนามผู้มีสิทธิ
            @else
            <input type="checkbox" disabled> โอนเงินเข้าบัญชีเงินฝากธนาคารในนามผู้มีสิทธิ
            @endif
            &nbsp;
            @if(in_array('option4', explode(',', $trader->personsOptions->first()->request_for_money_type)))
            <input type="checkbox" checked disabled> โอนเงินเข้าบัญชีเงินฝากธนาคารในนามผู้มีสิทธิ
            @else
            <input type="checkbox" disabled> โอนเงินเข้าบัญชีเงินฝากธนาคารในนามผู้มีสิทธิ
            @endif
        </p>

        <p style="margin-top: 30px;">พร้อมแนบเอกสารดังนี้</p>
        <p>
            @if(in_array('option1', explode(',', $trader->personsOptions->first()->document_type)))
            <input type="checkbox" checked disabled> สําเนาบัตรประจําตัวประชาชน หรือสําเนาบัตรอื่น ที่ออกโดยหน่วยงานของรัฐที่มีรูปถ่าย
            @else
            <input type="checkbox" disabled> สําเนาบัตรประจําตัวประชาชน หรือสําเนาบัตรอื่น ที่ออกโดยหน่วยงานของรัฐที่มีรูปถ่าย
            @endif
            &nbsp;
            @if(in_array('option2', explode(',', $trader->personsOptions->first()->document_type)))
            <input type="checkbox" checked disabled> สําเนาทะเบียนบ้าน
            @else
            <input type="checkbox" disabled> สําเนาทะเบียนบ้าน
            @endif
            &nbsp;

            <br>
            @if(in_array('option3', explode(',', $trader->personsOptions->first()->document_type)))
            <input type="checkbox" checked disabled> สําเนาสมุดบัญชีเงินฝากธนาคาร ( ในกรณีผู้ขอรับเบี้ยยังชีพผู้สูงอายุประสงค์ขอรับเงินเบี้ยยังชีพผู้สูงอายุผ่านธนาคาร )
            @else
            <input type="checkbox" disabled> สําเนาสมุดบัญชีเงินฝากธนาคาร ( ในกรณีผู้ขอรับเบี้ยยังชีพผู้สูงอายุประสงค์ขอรับเงินเบี้ยยังชีพผู้สูงอายุผ่านธนาคาร )
            @endif
            &nbsp;
            <br>
            @if(in_array('option4', explode(',', $trader->personsOptions->first()->document_type)))
            <input type="checkbox" checked disabled> หนังสือมอบอํานาจพร้อมสําเนาบัตรประจําตัวประชาชนของผู้มอบอํานาจและผู้รับมอบอํานาจ
            @else
            <input type="checkbox" disabled> หนังสือมอบอํานาจพร้อมสําเนาบัตรประจําตัวประชาชนของผู้มอบอํานาจและผู้รับมอบอํานาจ
            @endif
        </p>
        <br>

        <p style="margin-left: 70px;">ข้าพเจ้าขอรับรองว่าข้าพเจ้าเป็นผู้มีคุณสมบัติครบถ้วน ไม่ได้เป็นผู้รับบํานาญหรือสวัสดิการเป็นราย</p>
        <p>เดือนจากหน่วยงานของรัฐ รัฐวิสาหกิจ หรือองค์กรปกครองส่วนท้องถิ่น และขอรับรองว่าข้อความดังกล่าวข้างต้น </p>
        <p>เป็นความจริงทุกประการ</p>

        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <!-- คอลัมน์ซ้าย -->
                <td style="width: 50%; vertical-align: top;">
                    <div style="text-align: center;">
                        <p>(ลายมือลงชื่อ)...................................................ผู้ยื่นคำขอ</p>
                        <p>(.................................................)</p>
                    </div>
                </td>

                <!-- คอลัมน์ขวา -->
                <td style="width: 50%; vertical-align: top;">
                    <div style="text-align: center;">
                        <p>(ลายมือลงชื่อ)...................................................</p>
                        <p>(.................................................)</p>
                        <p> เจ้าหน้าที่ผู้รับจดทะเบียน </p>
                    </div>
                </td>
            </tr>
        </table>

        <div style="page-break-before: always;"></div>

        <br>
        <p style="text-align: center;">-2-</p>

        <table class="custom-table">
            <tr>
                <!-- คอลัมน์ซ้าย -->
                <td class="custom-td" style="width: 50%;">
                    <p><strong>ความเห็นเจ้าหน้าที่ผู้รับลงทะเบียน</strong></p>
                    <p>เรียน คณะกรรมการตรวจสอบคุณสมบัติ</p>
                    <p style="margin-left: 25px;"> ได้ตรวจสอบคุณสมบัติหมายเลขบัตรประจําตัวประชาชน </p>
                    <p>.................................................................................. ของ</p>
                    <p>นาย/นาง/นางสาว.....................................................................แล้ว</p>
                    <div class="checkbox-group">
                        <input type="checkbox"> เป็นผู้มีคุณสมบัติครบถ้วน <input type="checkbox"> เป็นผู้ที่ขาดคุณสมบัติ
                    </div>

                    <p>ดังนี้..........................................................................................</p>

                    <div class="signature-area">
                        <p>(ลงชื่อ) ............................................................</p>
                        <p>(............................................................)</p>
                        <p>เจ้าหน้าที่ผู้รับลงทะเบียน</p>
                    </div>
                </td>

                <!-- คอลัมน์ขวา -->
                <td class="custom-td" style="width: 50%;">
                    <p><strong>ความเห็นเจ้าหน้าที่ผู้รับลงทะเบียน</strong></p>
                    <p>เรียน คณะกรรมการตรวจสอบคุณสมบัติได้ตรวจสอบแล้ว</p>
                    <p>มีความเห็นดังนี้</p>
                    <div class="checkbox-group">
                        <input type="checkbox"> สมควรรับลงทะเบียน <input type="checkbox"> ไม่สมควรรับลงทะเบียน
                    </div>
                    <p>กรรมการ (ลงชื่อ) ............................................................</p>
                    <p style="margin-left: 60px;">(............................................................)</p>
                    <p>กรรมการ (ลงชื่อ) ............................................................</p>
                    <p style="margin-left: 60px;">(............................................................)</p>
                    <p>กรรมการ (ลงชื่อ) ............................................................</p>
                    <p style="margin-left: 60px;">(............................................................)</p>
                </td>
            </tr>

            <!-- แถวคำสั่ง -->
            <tr>
                <td class="custom-td" colspan="2">
                    <p><strong>คำสั่ง</strong></p>
                    <div class="checkbox-group">
                        <input type="checkbox"> รับลงทะเบียน
                        <input type="checkbox"> ไม่รับลงทะเบียน
                        <input type="checkbox"> อื่น ๆ .......................................................................................................
                    </div>
                    <div class="signature-area">
                        <p>(ลงชื่อ) ............................................................</p>
                        <p>............................................................</p>
                        <p>วัน/เดือน/ปี ............................................................</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>


</html>
