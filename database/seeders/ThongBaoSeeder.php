<?php

namespace Database\Seeders;

use App\Models\ThongBao;
use App\Models\User;
use Illuminate\Database\Seeder;

class ThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $giangvien = User::where("username", "giangvien")->first();

        $thongBaos = [
            [
                'tieuDe' => '📚 Tài liệu chuyên sâu: Next.js 15 & App Router',
                'noiDung' => 'Thầy đã cập nhật tài liệu cho chương Web hiện đại, bao gồm ebook, video hướng dẫn và source code mẫu. Các bạn cần đọc trước phần Server Components và chuẩn bị môi trường Node.js 20.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-01-15 08:30:00',
                'uuTien' => 3,
                'status' => true
            ],
            [
                'tieuDe' => '🧪 Thông báo Lab 02: RESTful API với Laravel',
                'noiDung' => 'Sinh viên cần hoàn thành API CRUD sản phẩm và nộp trước deadline. Lưu ý validate dữ liệu và xử lý lỗi đúng chuẩn HTTP status.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-02-10 10:00:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '📢 Cập nhật nội dung môn Công nghệ Web',
                'noiDung' => 'Đã bổ sung nội dung về JWT Authentication và Refresh Token. Sinh viên cần đọc trước để chuẩn bị cho buổi học tới.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-03-05 09:15:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '💻 Hướng dẫn cài đặt môi trường React',
                'noiDung' => 'Sinh viên cần cài Node.js >= 18, VSCode và các extension cần thiết để phục vụ cho phần frontend.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-04-01 14:20:00',
                'uuTien' => 1,
                'status' => true
            ],
            [
                'tieuDe' => '📊 Thông báo kiểm tra 15 phút',
                'noiDung' => 'Bài kiểm tra sẽ diễn ra đầu giờ học, nội dung xoay quanh REST API và HTTP methods.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-05-12 07:45:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '📦 Tài liệu Docker cơ bản',
                'noiDung' => 'Đã upload tài liệu hướng dẫn sử dụng Docker để deploy ứng dụng web. Sinh viên đọc trước phần container và image.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-06-20 11:00:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '🚀 Thông báo đồ án giữa kỳ',
                'noiDung' => 'Sinh viên cần nộp proposal đồ án gồm: mô tả hệ thống, database design và công nghệ sử dụng.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-07-10 16:30:00',
                'uuTien' => 3,
                'status' => true
            ],
            [
                'tieuDe' => '🔐 Học về Authentication & Authorization',
                'noiDung' => 'Buổi tới sẽ học về phân quyền RBAC và JWT. Sinh viên cần ôn lại session và cookie.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-08-03 13:00:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '📁 Upload tài liệu Git nâng cao',
                'noiDung' => 'Đã bổ sung tài liệu về Git rebase, merge conflict và workflow làm việc nhóm.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-09-18 09:40:00',
                'uuTien' => 1,
                'status' => true
            ],
            [
                'tieuDe' => '📝 Nhắc nhở nộp bài tập tuần',
                'noiDung' => 'Sinh viên cần nộp bài đúng hạn trên hệ thống LMS. Bài nộp trễ sẽ bị trừ điểm.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-10-02 18:00:00',
                'uuTien' => 2,
                'status' => true
            ],

            [
                'tieuDe' => '⚙️ Tài liệu NestJS cơ bản',
                'noiDung' => 'Đã cập nhật tài liệu về Controller, Service và Module trong NestJS.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-11-11 08:10:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '📌 Thông báo lịch demo đồ án',
                'noiDung' => 'Sinh viên chuẩn bị slide và demo sản phẩm trong vòng 10 phút.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2025-12-05 15:00:00',
                'uuTien' => 3,
                'status' => true
            ],
            [
                'tieuDe' => '🧠 Ôn tập cuối kỳ',
                'noiDung' => 'Các bạn ôn tập lại toàn bộ kiến thức về API, Database và Authentication.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2026-01-10 20:00:00',
                'uuTien' => 3,
                'status' => true
            ],
            [
                'tieuDe' => '📘 Tài liệu Clean Architecture',
                'noiDung' => 'Đã upload tài liệu về Clean Architecture áp dụng trong dự án thực tế.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2026-01-25 09:00:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '🔄 Cập nhật bài tập nhóm',
                'noiDung' => 'Sinh viên cần cập nhật tiến độ project lên GitHub và gửi link cho giảng viên.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2026-02-14 17:20:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '📡 Giới thiệu WebSocket',
                'noiDung' => 'Buổi học tới sẽ tìm hiểu WebSocket và real-time communication.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2026-02-28 10:10:00',
                'uuTien' => 1,
                'status' => true
            ],
            [
                'tieuDe' => '🧾 Thông báo điểm giữa kỳ',
                'noiDung' => 'Điểm đã được cập nhật trên hệ thống. Sinh viên kiểm tra và phản hồi nếu có sai sót.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2026-03-05 12:00:00',
                'uuTien' => 3,
                'status' => true
            ],
            [
                'tieuDe' => '📂 Tài liệu Microservices',
                'noiDung' => 'Đã cập nhật tài liệu về kiến trúc Microservices và giao tiếp giữa các service.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2026-03-15 08:50:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '⚡ Tối ưu hiệu suất API',
                'noiDung' => 'Sinh viên cần tìm hiểu caching và tối ưu query database.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2026-03-25 14:00:00',
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => '🎯 Tổng kết học phần',
                'noiDung' => 'Buổi cuối sẽ tổng kết và giải đáp thắc mắc. Sinh viên chuẩn bị câu hỏi.',
                'nguoiGuiId' => 2,
                'thoiGianGui' => '2026-04-01 09:30:00',
                'uuTien' => 3,
                'status' => true
            ],
        ];

        foreach ($thongBaos as $thongBao) {
            ThongBao::firstOrCreate(
                ['tieuDe' => $thongBao['tieuDe']],
                $thongBao
            );
        }
    }
}
