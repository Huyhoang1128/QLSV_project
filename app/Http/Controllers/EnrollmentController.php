<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnrollmentController extends BaseController
{
    public function index()
    {
        return Enrollment::with(['student', 'subject'])->get();
    }

    public function store(EnrollmentRequest $request)
    {
        // Kiểm tra xem sinh viên đã đăng ký môn này chưa
        $exists = Enrollment::where('StudentID', $request->StudentID)
                            ->where('SubjectID', $request->SubjectID)
                            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Sinh viên đã đăng ký môn học này'], 400);
        }

        $enrollment = Enrollment::create([
            'StudentID' => $request->StudentID,
            'SubjectID' => $request->SubjectID
        ]);

        return response()->json($enrollment, 201);
    }

    public function update(EnrollmentRequest $request, $id)
    {
        $enrollment = Enrollment::find($id);
        if (!$enrollment) {
            return response()->json(['message' => 'Không tìm thấy đăng ký'], 404);
        }

        // Kiểm tra xem sinh viên đã đăng ký môn mới chưa
        $exists = Enrollment::where('StudentID', $request->StudentID)
                            ->where('SubjectID', $request->SubjectID)
                            ->where('id', '!=', $id) // Loại trừ chính nó
                            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Sinh viên đã đăng ký môn học này'], 400);
        }

        // Cập nhật môn học đã đăng ký
        $enrollment->update([
            'StudentID' => $request->StudentID,
            'SubjectID' => $request->SubjectID
        ]);

        return response()->json(['message' => 'Cập nhật đăng ký thành công', 'enrollment' => $enrollment]);
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::find($id);
        if (!$enrollment) {
            return response()->json(['message' => 'Không tìm thấy đăng ký'], 404);
        }

        $enrollment->delete();
        return response()->json(['message' => 'Hủy đăng ký thành công']);
    }
}
