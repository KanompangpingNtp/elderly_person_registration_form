@extends('layout.users_account_layout')
@section('account_layout')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif

@php
$thaiMonths = [
'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
];
@endphp

<div class="container">
    <h2 class="text-center">ข้อมูลฟอร์มที่ส่งมา</h2><br>

    <table class="table table-bordered table-striped" id="data_table">
        <thead class="text-center">
            <tr>
                <th>วันที่ส่ง</th>
                <th>ชื่อผู้ส่งฟอร์ม</th>
                <th>ผู้กดรับฟอร์ม</th>
                <th>สถานะ</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($traders as $trader)
            <tr>
                @php
                    $day = $trader->created_at->format('d');
                    $month = $thaiMonths[$trader->created_at->format('n') - 1];
                    $year = $trader->created_at->format('Y') + 543;
                @endphp
                <td>{{ $day }} {{ $month }} {{ $year }}</td>
                <td>{{ $trader->user ? $trader->user->name : 'ผู้ใช้งานทั่วไป' }}</td>
                <td>{{ $trader->admin_name_verifier}}</td>
                <td>
                    @if($trader->status == 1)
                    <p> - </p>
                    @elseif($trader->status == 2)
                    <p style="font-size: 20px; color:blue;"><i class="bi bi-check-circle"></i></p>
                    @endif
                </td>
                <td>
                    <a href="{{ route('userShowFormEdit', $trader->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#submitModal-{{ $trader->id }}">
                        <i class="bi bi-filetype-pdf"></i>
                    </button>
                    @if(!is_null($trader->user_id))
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal-{{ $trader->id }}">
                        <i class="bi bi-reply"></i>
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($traders as $trader)
    <div class="modal fade" id="submitModal-{{ $trader->id }}" tabindex="-1" aria-labelledby="submitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="submitModalLabel">แสดงข้อมูล</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span style="color: black;">preview</span>
                    <a href="{{ route('exportUserPDF', $trader->id) }}" class="btn btn-danger btn-sm" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                    <br>
                    <br>
                    <span style="color: black;">ไฟล์แนบ </span>
                    @foreach($trader->attachments as $attachment)
                    <span class="d-inline me-2">
                        @if(in_array($attachment->file_type, ['jpg', 'jpeg', 'png', 'gif']))
                        <!-- ตรวจสอบว่าเป็นไฟล์รูปภาพหรือไม่ -->
                        <img src="{{ asset('storage/' . $attachment->file_path) }}" alt="{{ basename($attachment->file_path) }}" class="img-thumbnail" style="max-width: 200px;">
                        @else
                        <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">{{ basename($attachment->file_path) }}</a>
                        @endif
                    </span>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="replyModal-{{ $trader->id }}" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">ตอบกลับฟอร์ม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><span style="color: black;">ชื่อผู้ส่งฟอร์ม : </span>{{ $trader->user ? $trader->user->name : 'ผู้ใช้งานทั่วไป' }}</p>
                    <p>ข้อความตอบกลับก่อนหน้า</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>ผู้ตอบกลับ</th>
                                <th>วันที่ตอบกลับ</th>
                                <th>ข้อความที่ตอบกลับ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($trader->replies as $reply)
                            <tr>
                                <td>{{ $reply->user->name ?? 'Unknown User' }}</td>
                                <td class="text-center">
                                    {{ $reply->created_at->timezone('Asia/Bangkok')->translatedFormat('d F') }} {{ $reply->created_at->year + 543 }}
                                    {{ $reply->created_at->format('H:i') }} น.
                                </td>
                                <td class="text-center">{{ $reply->reply_text }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">ยังไม่มีการตอบกลับ</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <form action="{{ route('userReply', $trader->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="message" class="form-label">ข้อความตอบกลับ</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary">ส่งตอบกลับ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

<script src="{{asset('js/admin_show_form.js')}}"></script>


@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
