<?php

namespace Database\Seeders;

use App\Models\Chuong;
use Illuminate\Database\Seeder;

class ChuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chuongs = [
            ['tenChuong' => 'Cú pháp cơ bản và kiểu dữ liệu trong C', 'monHocId' => 1, 'isDeleted' => false],
            ['tenChuong' => 'Con trỏ và quản lý bộ nhớ trong C', 'monHocId' => 1, 'isDeleted' => false],

            ['tenChuong' => 'Danh sách, ngăn xếp và hàng đợi', 'monHocId' => 2, 'isDeleted' => false],
            ['tenChuong' => 'Thuật toán sắp xếp và tìm kiếm', 'monHocId' => 2, 'isDeleted' => false],

            ['tenChuong' => 'Nguyên lý lập trình hướng đối tượng', 'monHocId' => 3, 'isDeleted' => false],
            ['tenChuong' => 'Kế thừa, đa hình và đóng gói', 'monHocId' => 3, 'isDeleted' => false],

            ['tenChuong' => 'Mô hình dữ liệu và thiết kế CSDL', 'monHocId' => 4, 'isDeleted' => false],
            ['tenChuong' => 'Ngôn ngữ SQL và truy vấn dữ liệu', 'monHocId' => 4, 'isDeleted' => false],

            ['tenChuong' => 'Quản lý tiến trình và luồng', 'monHocId' => 5, 'isDeleted' => false],
            ['tenChuong' => 'Quản lý bộ nhớ và hệ thống tập tin', 'monHocId' => 5, 'isDeleted' => false],

            ['tenChuong' => 'Mô hình OSI và TCP/IP', 'monHocId' => 6, 'isDeleted' => false],
            ['tenChuong' => 'Giao thức mạng và định tuyến', 'monHocId' => 6, 'isDeleted' => false],

            ['tenChuong' => 'Thu thập và phân tích yêu cầu', 'monHocId' => 7, 'isDeleted' => false],
            ['tenChuong' => 'Thiết kế hệ thống và UML', 'monHocId' => 7, 'isDeleted' => false],

            ['tenChuong' => 'Cú pháp và cấu trúc chương trình Java', 'monHocId' => 8, 'isDeleted' => false],
            ['tenChuong' => 'Xử lý ngoại lệ và làm việc với file', 'monHocId' => 8, 'isDeleted' => false],

            ['tenChuong' => 'HTML, CSS và JavaScript cơ bản', 'monHocId' => 9, 'isDeleted' => false],
            ['tenChuong' => 'DOM, sự kiện và gọi API', 'monHocId' => 9, 'isDeleted' => false],

            ['tenChuong' => 'Kiến trúc ứng dụng Web (MVC)', 'monHocId' => 10, 'isDeleted' => false],
            ['tenChuong' => 'Xây dựng RESTful API', 'monHocId' => 10, 'isDeleted' => false],

            ['tenChuong' => 'Quy trình phát triển phần mềm', 'monHocId' => 11, 'isDeleted' => false],
            ['tenChuong' => 'Mô hình Agile và Scrum', 'monHocId' => 11, 'isDeleted' => false],

            ['tenChuong' => 'Giới thiệu kiểm thử phần mềm', 'monHocId' => 12, 'isDeleted' => false],
            ['tenChuong' => 'Kiểm thử tự động và test case', 'monHocId' => 12, 'isDeleted' => false],

            ['tenChuong' => 'Các nguyên lý an toàn thông tin', 'monHocId' => 13, 'isDeleted' => false],
            ['tenChuong' => 'Mã hóa và bảo mật hệ thống', 'monHocId' => 13, 'isDeleted' => false],

            ['tenChuong' => 'Tìm kiếm và suy luận trong AI', 'monHocId' => 14, 'isDeleted' => false],
            ['tenChuong' => 'Học có giám sát và không giám sát', 'monHocId' => 14, 'isDeleted' => false],

            ['tenChuong' => 'Thuật toán học máy cơ bản', 'monHocId' => 15, 'isDeleted' => false],
            ['tenChuong' => 'Đánh giá mô hình và tối ưu', 'monHocId' => 15, 'isDeleted' => false],

            ['tenChuong' => 'Tiền xử lý dữ liệu', 'monHocId' => 16, 'isDeleted' => false],
            ['tenChuong' => 'Khai phá luật kết hợp và phân cụm', 'monHocId' => 16, 'isDeleted' => false],

            ['tenChuong' => 'Biểu diễn và xử lý ảnh số', 'monHocId' => 17, 'isDeleted' => false],
            ['tenChuong' => 'Phát hiện biên và nhận dạng ảnh', 'monHocId' => 17, 'isDeleted' => false],

            ['tenChuong' => 'Giới thiệu lập trình Android', 'monHocId' => 18, 'isDeleted' => false],
            ['tenChuong' => 'Xây dựng giao diện và xử lý sự kiện', 'monHocId' => 18, 'isDeleted' => false],

            ['tenChuong' => 'Kiến trúc ứng dụng Android', 'monHocId' => 19, 'isDeleted' => false],
            ['tenChuong' => 'Kết nối API và lưu trữ dữ liệu', 'monHocId' => 19, 'isDeleted' => false],

            ['tenChuong' => 'Tổng quan điện toán đám mây', 'monHocId' => 20, 'isDeleted' => false],
            ['tenChuong' => 'Triển khai ứng dụng trên Cloud', 'monHocId' => 20, 'isDeleted' => false],
        ];

        foreach ($chuongs as $chuong) {
            Chuong::firstOrCreate(
                ['tenChuong' => $chuong['tenChuong'], 'monHocId' => $chuong['monHocId']],
                $chuong
            );
        }
    }
}
