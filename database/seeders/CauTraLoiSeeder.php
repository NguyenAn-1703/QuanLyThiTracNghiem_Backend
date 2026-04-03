<?php

namespace Database\Seeders;

use App\Models\CauHoi;
use App\Models\CauTraLoi;
use Illuminate\Database\Seeder;

class CauTraLoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [

            // 1 → 25
            ['cauHoiId' => 1, 'noiDungLuaChon' => 'Lưu số nguyên', 'isCorrectAnswer' => true],
            ['cauHoiId' => 1, 'noiDungLuaChon' => 'Lưu số thực', 'isCorrectAnswer' => false],
            ['cauHoiId' => 1, 'noiDungLuaChon' => 'Lưu ký tự', 'isCorrectAnswer' => false],
            ['cauHoiId' => 1, 'noiDungLuaChon' => 'Lưu chuỗi', 'isCorrectAnswer' => false],

            ['cauHoiId' => 2, 'noiDungLuaChon' => 'Điểm bắt đầu chương trình', 'isCorrectAnswer' => true],
            ['cauHoiId' => 2, 'noiDungLuaChon' => 'Kết thúc chương trình', 'isCorrectAnswer' => false],
            ['cauHoiId' => 2, 'noiDungLuaChon' => 'In dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 2, 'noiDungLuaChon' => 'Nhập dữ liệu', 'isCorrectAnswer' => false],

            ['cauHoiId' => 3, 'noiDungLuaChon' => 'Tăng giá trị biến lên 1', 'isCorrectAnswer' => true],
            ['cauHoiId' => 3, 'noiDungLuaChon' => 'Giảm giá trị biến đi 1', 'isCorrectAnswer' => false],
            ['cauHoiId' => 3, 'noiDungLuaChon' => 'Nhân đôi giá trị', 'isCorrectAnswer' => false],
            ['cauHoiId' => 3, 'noiDungLuaChon' => 'Chia đôi giá trị', 'isCorrectAnswer' => false],

            ['cauHoiId' => 4, 'noiDungLuaChon' => 'Giảm giá trị biến đi 1', 'isCorrectAnswer' => true],
            ['cauHoiId' => 4, 'noiDungLuaChon' => 'Tăng giá trị biến lên 1', 'isCorrectAnswer' => false],
            ['cauHoiId' => 4, 'noiDungLuaChon' => 'Nhân giá trị', 'isCorrectAnswer' => false],
            ['cauHoiId' => 4, 'noiDungLuaChon' => 'Gán giá trị', 'isCorrectAnswer' => false],

            ['cauHoiId' => 5, 'noiDungLuaChon' => 'Rẽ nhánh theo điều kiện', 'isCorrectAnswer' => true],
            ['cauHoiId' => 5, 'noiDungLuaChon' => 'Lặp vô hạn', 'isCorrectAnswer' => false],
            ['cauHoiId' => 5, 'noiDungLuaChon' => 'Khai báo biến', 'isCorrectAnswer' => false],
            ['cauHoiId' => 5, 'noiDungLuaChon' => 'In dữ liệu', 'isCorrectAnswer' => false],

            ['cauHoiId' => 6, 'noiDungLuaChon' => 'Khi có nhiều lựa chọn theo giá trị', 'isCorrectAnswer' => true],
            ['cauHoiId' => 6, 'noiDungLuaChon' => 'Khi lặp vô hạn', 'isCorrectAnswer' => false],
            ['cauHoiId' => 6, 'noiDungLuaChon' => 'Khi nhập dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 6, 'noiDungLuaChon' => 'Khi in dữ liệu', 'isCorrectAnswer' => false],

            ['cauHoiId' => 7, 'noiDungLuaChon' => 'Khi biết trước số lần lặp', 'isCorrectAnswer' => true],
            ['cauHoiId' => 7, 'noiDungLuaChon' => 'Khi không biết số lần lặp', 'isCorrectAnswer' => false],
            ['cauHoiId' => 7, 'noiDungLuaChon' => 'Khi khai báo biến', 'isCorrectAnswer' => false],
            ['cauHoiId' => 7, 'noiDungLuaChon' => 'Khi so sánh', 'isCorrectAnswer' => false],

            ['cauHoiId' => 8, 'noiDungLuaChon' => 'do-while chạy ít nhất 1 lần', 'isCorrectAnswer' => true],
            ['cauHoiId' => 8, 'noiDungLuaChon' => 'while chạy ít nhất 1 lần', 'isCorrectAnswer' => false],
            ['cauHoiId' => 8, 'noiDungLuaChon' => 'Không có khác biệt', 'isCorrectAnswer' => false],
            ['cauHoiId' => 8, 'noiDungLuaChon' => 'while nhanh hơn', 'isCorrectAnswer' => false],

            ['cauHoiId' => 9, 'noiDungLuaChon' => 'Tập hợp phần tử cùng kiểu', 'isCorrectAnswer' => true],
            ['cauHoiId' => 9, 'noiDungLuaChon' => 'Một biến đơn', 'isCorrectAnswer' => false],
            ['cauHoiId' => 9, 'noiDungLuaChon' => 'Hàm xử lý dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 9, 'noiDungLuaChon' => 'Kiểu dữ liệu đặc biệt', 'isCorrectAnswer' => false],

            ['cauHoiId' => 10, 'noiDungLuaChon' => 'Bắt đầu từ 0', 'isCorrectAnswer' => true],
            ['cauHoiId' => 10, 'noiDungLuaChon' => 'Bắt đầu từ 1', 'isCorrectAnswer' => false],
            ['cauHoiId' => 10, 'noiDungLuaChon' => 'Bắt đầu từ -1', 'isCorrectAnswer' => false],
            ['cauHoiId' => 10, 'noiDungLuaChon' => 'Không cố định', 'isCorrectAnswer' => false],

            // 👉 11 → 25
            ['cauHoiId' => 11, 'noiDungLuaChon' => 'Biến lưu địa chỉ', 'isCorrectAnswer' => true],
            ['cauHoiId' => 11, 'noiDungLuaChon' => 'Biến lưu giá trị', 'isCorrectAnswer' => false],
            ['cauHoiId' => 11, 'noiDungLuaChon' => 'Hàm xử lý', 'isCorrectAnswer' => false],
            ['cauHoiId' => 11, 'noiDungLuaChon' => 'Kiểu dữ liệu số', 'isCorrectAnswer' => false],

            ['cauHoiId' => 12, 'noiDungLuaChon' => 'Lấy địa chỉ biến', 'isCorrectAnswer' => true],
            ['cauHoiId' => 12, 'noiDungLuaChon' => 'Lấy giá trị biến', 'isCorrectAnswer' => false],
            ['cauHoiId' => 12, 'noiDungLuaChon' => 'Tăng giá trị', 'isCorrectAnswer' => false],
            ['cauHoiId' => 12, 'noiDungLuaChon' => 'Giảm giá trị', 'isCorrectAnswer' => false],

            ['cauHoiId' => 13, 'noiDungLuaChon' => 'Truy cập giá trị tại địa chỉ', 'isCorrectAnswer' => true],
            ['cauHoiId' => 13, 'noiDungLuaChon' => 'Lấy địa chỉ biến', 'isCorrectAnswer' => false],
            ['cauHoiId' => 13, 'noiDungLuaChon' => 'Gán giá trị', 'isCorrectAnswer' => false],
            ['cauHoiId' => 13, 'noiDungLuaChon' => 'So sánh', 'isCorrectAnswer' => false],

            ['cauHoiId' => 14, 'noiDungLuaChon' => 'Cấp phát bộ nhớ động', 'isCorrectAnswer' => true],
            ['cauHoiId' => 14, 'noiDungLuaChon' => 'Giải phóng bộ nhớ', 'isCorrectAnswer' => false],
            ['cauHoiId' => 14, 'noiDungLuaChon' => 'In dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 14, 'noiDungLuaChon' => 'Nhập dữ liệu', 'isCorrectAnswer' => false],

            ['cauHoiId' => 15, 'noiDungLuaChon' => 'Giải phóng bộ nhớ', 'isCorrectAnswer' => true],
            ['cauHoiId' => 15, 'noiDungLuaChon' => 'Cấp phát bộ nhớ', 'isCorrectAnswer' => false],
            ['cauHoiId' => 15, 'noiDungLuaChon' => 'Tăng bộ nhớ', 'isCorrectAnswer' => false],
            ['cauHoiId' => 15, 'noiDungLuaChon' => 'Sao chép dữ liệu', 'isCorrectAnswer' => false],

            ['cauHoiId' => 16, 'noiDungLuaChon' => 'In ra màn hình', 'isCorrectAnswer' => true],
            ['cauHoiId' => 16, 'noiDungLuaChon' => 'Nhập dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 16, 'noiDungLuaChon' => 'Xóa dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 16, 'noiDungLuaChon' => 'Tính toán', 'isCorrectAnswer' => false],

            ['cauHoiId' => 17, 'noiDungLuaChon' => 'Nhập dữ liệu', 'isCorrectAnswer' => true],
            ['cauHoiId' => 17, 'noiDungLuaChon' => 'In dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 17, 'noiDungLuaChon' => 'Xóa dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 17, 'noiDungLuaChon' => 'So sánh', 'isCorrectAnswer' => false],

            ['cauHoiId' => 18, 'noiDungLuaChon' => 'Khai báo ngoài hàm', 'isCorrectAnswer' => true],
            ['cauHoiId' => 18, 'noiDungLuaChon' => 'Khai báo trong hàm', 'isCorrectAnswer' => false],
            ['cauHoiId' => 18, 'noiDungLuaChon' => 'Chỉ dùng trong vòng lặp', 'isCorrectAnswer' => false],
            ['cauHoiId' => 18, 'noiDungLuaChon' => 'Không cần khai báo', 'isCorrectAnswer' => false],

            ['cauHoiId' => 19, 'noiDungLuaChon' => 'Khai báo trong hàm', 'isCorrectAnswer' => true],
            ['cauHoiId' => 19, 'noiDungLuaChon' => 'Khai báo ngoài hàm', 'isCorrectAnswer' => false],
            ['cauHoiId' => 19, 'noiDungLuaChon' => 'Dùng toàn cục', 'isCorrectAnswer' => false],
            ['cauHoiId' => 19, 'noiDungLuaChon' => 'Không cần khai báo', 'isCorrectAnswer' => false],

            ['cauHoiId' => 20, 'noiDungLuaChon' => 'Trả về kết quả qua return', 'isCorrectAnswer' => true],
            ['cauHoiId' => 20, 'noiDungLuaChon' => 'Không trả về gì', 'isCorrectAnswer' => false],
            ['cauHoiId' => 20, 'noiDungLuaChon' => 'Chỉ in dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 20, 'noiDungLuaChon' => 'Chỉ nhập dữ liệu', 'isCorrectAnswer' => false],

            ['cauHoiId' => 21, 'noiDungLuaChon' => 'Lưu ký tự', 'isCorrectAnswer' => true],
            ['cauHoiId' => 21, 'noiDungLuaChon' => 'Lưu số nguyên', 'isCorrectAnswer' => false],
            ['cauHoiId' => 21, 'noiDungLuaChon' => 'Lưu số thực', 'isCorrectAnswer' => false],
            ['cauHoiId' => 21, 'noiDungLuaChon' => 'Lưu mảng', 'isCorrectAnswer' => false],

            ['cauHoiId' => 22, 'noiDungLuaChon' => 'Lưu số thực', 'isCorrectAnswer' => true],
            ['cauHoiId' => 22, 'noiDungLuaChon' => 'Lưu số nguyên', 'isCorrectAnswer' => false],
            ['cauHoiId' => 22, 'noiDungLuaChon' => 'Lưu ký tự', 'isCorrectAnswer' => false],
            ['cauHoiId' => 22, 'noiDungLuaChon' => 'Lưu chuỗi', 'isCorrectAnswer' => false],

            ['cauHoiId' => 23, 'noiDungLuaChon' => 'Độ chính xác cao hơn', 'isCorrectAnswer' => true],
            ['cauHoiId' => 23, 'noiDungLuaChon' => 'Dung lượng nhỏ hơn', 'isCorrectAnswer' => false],
            ['cauHoiId' => 23, 'noiDungLuaChon' => 'Nhanh hơn', 'isCorrectAnswer' => false],
            ['cauHoiId' => 23, 'noiDungLuaChon' => 'Ít bộ nhớ hơn', 'isCorrectAnswer' => false],

            ['cauHoiId' => 24, 'noiDungLuaChon' => 'Lấy kích thước dữ liệu', 'isCorrectAnswer' => true],
            ['cauHoiId' => 24, 'noiDungLuaChon' => 'Lấy giá trị dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 24, 'noiDungLuaChon' => 'Gán dữ liệu', 'isCorrectAnswer' => false],
            ['cauHoiId' => 24, 'noiDungLuaChon' => 'So sánh dữ liệu', 'isCorrectAnswer' => false],

            ['cauHoiId' => 25, 'noiDungLuaChon' => 'Giá trị không thay đổi', 'isCorrectAnswer' => true],
            ['cauHoiId' => 25, 'noiDungLuaChon' => 'Giá trị thay đổi liên tục', 'isCorrectAnswer' => false],
            ['cauHoiId' => 25, 'noiDungLuaChon' => 'Biến toàn cục', 'isCorrectAnswer' => false],
            ['cauHoiId' => 25, 'noiDungLuaChon' => 'Biến cục bộ', 'isCorrectAnswer' => false],


            ['noiDungLuaChon' => 'Cấu trúc LIFO', 'isCorrectAnswer' => true, 'cauHoiId' => 26],
            ['noiDungLuaChon' => 'Cấu trúc FIFO', 'isCorrectAnswer' => false, 'cauHoiId' => 26],
            ['noiDungLuaChon' => 'Cấu trúc cây', 'isCorrectAnswer' => false, 'cauHoiId' => 26],
            ['noiDungLuaChon' => 'Cấu trúc đồ thị', 'isCorrectAnswer' => false, 'cauHoiId' => 26],

            ['noiDungLuaChon' => 'Cấu trúc FIFO', 'isCorrectAnswer' => true, 'cauHoiId' => 27],
            ['noiDungLuaChon' => 'Cấu trúc LIFO', 'isCorrectAnswer' => false, 'cauHoiId' => 27],
            ['noiDungLuaChon' => 'Cấu trúc ngăn xếp', 'isCorrectAnswer' => false, 'cauHoiId' => 27],
            ['noiDungLuaChon' => 'Cấu trúc cây', 'isCorrectAnswer' => false, 'cauHoiId' => 27],

            ['noiDungLuaChon' => 'Các node liên kết', 'isCorrectAnswer' => true, 'cauHoiId' => 28],
            ['noiDungLuaChon' => 'Mảng liên tục', 'isCorrectAnswer' => false, 'cauHoiId' => 28],
            ['noiDungLuaChon' => 'Cấu trúc stack', 'isCorrectAnswer' => false, 'cauHoiId' => 28],
            ['noiDungLuaChon' => 'Cấu trúc queue', 'isCorrectAnswer' => false, 'cauHoiId' => 28],

            ['noiDungLuaChon' => 'Không liên tục bộ nhớ', 'isCorrectAnswer' => true, 'cauHoiId' => 29],
            ['noiDungLuaChon' => 'Luôn liên tục bộ nhớ', 'isCorrectAnswer' => false, 'cauHoiId' => 29],
            ['noiDungLuaChon' => 'Nhanh hơn mọi trường hợp', 'isCorrectAnswer' => false, 'cauHoiId' => 29],
            ['noiDungLuaChon' => 'Không lưu được dữ liệu', 'isCorrectAnswer' => false, 'cauHoiId' => 29],

            ['noiDungLuaChon' => 'Tìm kiếm chia đôi', 'isCorrectAnswer' => true, 'cauHoiId' => 30],
            ['noiDungLuaChon' => 'Tìm kiếm tuần tự', 'isCorrectAnswer' => false, 'cauHoiId' => 30],
            ['noiDungLuaChon' => 'Sắp xếp dữ liệu', 'isCorrectAnswer' => false, 'cauHoiId' => 30],
            ['noiDungLuaChon' => 'Xóa dữ liệu', 'isCorrectAnswer' => false, 'cauHoiId' => 30],

            ['noiDungLuaChon' => 'Tăng tuyến tính', 'isCorrectAnswer' => true, 'cauHoiId' => 31],
            ['noiDungLuaChon' => 'Tăng logarit', 'isCorrectAnswer' => false, 'cauHoiId' => 31],
            ['noiDungLuaChon' => 'Không tăng', 'isCorrectAnswer' => false, 'cauHoiId' => 31],
            ['noiDungLuaChon' => 'Giảm dần', 'isCorrectAnswer' => false, 'cauHoiId' => 31],

            ['noiDungLuaChon' => 'Sắp xếp nổi bọt', 'isCorrectAnswer' => true, 'cauHoiId' => 32],
            ['noiDungLuaChon' => 'Sắp xếp nhanh', 'isCorrectAnswer' => false, 'cauHoiId' => 32],
            ['noiDungLuaChon' => 'Sắp xếp chèn', 'isCorrectAnswer' => false, 'cauHoiId' => 32],
            ['noiDungLuaChon' => 'Sắp xếp trộn', 'isCorrectAnswer' => false, 'cauHoiId' => 32],

            ['noiDungLuaChon' => 'Chọn phần tử nhỏ nhất', 'isCorrectAnswer' => true, 'cauHoiId' => 33],
            ['noiDungLuaChon' => 'Chèn phần tử', 'isCorrectAnswer' => false, 'cauHoiId' => 33],
            ['noiDungLuaChon' => 'Đổi chỗ ngẫu nhiên', 'isCorrectAnswer' => false, 'cauHoiId' => 33],
            ['noiDungLuaChon' => 'Chia mảng', 'isCorrectAnswer' => false, 'cauHoiId' => 33],

            ['noiDungLuaChon' => 'Chèn phần tử vào đúng vị trí', 'isCorrectAnswer' => true, 'cauHoiId' => 34],
            ['noiDungLuaChon' => 'Đổi chỗ phần tử', 'isCorrectAnswer' => false, 'cauHoiId' => 34],
            ['noiDungLuaChon' => 'Chia mảng', 'isCorrectAnswer' => false, 'cauHoiId' => 34],
            ['noiDungLuaChon' => 'Chọn max', 'isCorrectAnswer' => false, 'cauHoiId' => 34],

            ['noiDungLuaChon' => 'O(n log n)', 'isCorrectAnswer' => true, 'cauHoiId' => 35],
            ['noiDungLuaChon' => 'O(n^2)', 'isCorrectAnswer' => false, 'cauHoiId' => 35],
            ['noiDungLuaChon' => 'O(n)', 'isCorrectAnswer' => false, 'cauHoiId' => 35],
            ['noiDungLuaChon' => 'O(log n)', 'isCorrectAnswer' => false, 'cauHoiId' => 35],

            ['noiDungLuaChon' => 'Chia để trị', 'isCorrectAnswer' => true, 'cauHoiId' => 36],
            ['noiDungLuaChon' => 'Sắp xếp nổi bọt', 'isCorrectAnswer' => false, 'cauHoiId' => 36],
            ['noiDungLuaChon' => 'Duyệt tuyến tính', 'isCorrectAnswer' => false, 'cauHoiId' => 36],
            ['noiDungLuaChon' => 'Tìm kiếm tuần tự', 'isCorrectAnswer' => false, 'cauHoiId' => 36],

            ['noiDungLuaChon' => 'Cây nhị phân đặc biệt', 'isCorrectAnswer' => true, 'cauHoiId' => 37],
            ['noiDungLuaChon' => 'Danh sách liên kết', 'isCorrectAnswer' => false, 'cauHoiId' => 37],
            ['noiDungLuaChon' => 'Mảng', 'isCorrectAnswer' => false, 'cauHoiId' => 37],
            ['noiDungLuaChon' => 'Đồ thị', 'isCorrectAnswer' => false, 'cauHoiId' => 37],

            ['noiDungLuaChon' => 'Mỗi node tối đa 2 con', 'isCorrectAnswer' => true, 'cauHoiId' => 38],
            ['noiDungLuaChon' => 'Mỗi node vô hạn con', 'isCorrectAnswer' => false, 'cauHoiId' => 38],
            ['noiDungLuaChon' => 'Không có node', 'isCorrectAnswer' => false, 'cauHoiId' => 38],
            ['noiDungLuaChon' => 'Chỉ có 1 node', 'isCorrectAnswer' => false, 'cauHoiId' => 38],

            ['noiDungLuaChon' => 'Duyệt sâu', 'isCorrectAnswer' => true, 'cauHoiId' => 39],
            ['noiDungLuaChon' => 'Duyệt rộng', 'isCorrectAnswer' => false, 'cauHoiId' => 39],
            ['noiDungLuaChon' => 'Sắp xếp', 'isCorrectAnswer' => false, 'cauHoiId' => 39],
            ['noiDungLuaChon' => 'Tìm kiếm nhị phân', 'isCorrectAnswer' => false, 'cauHoiId' => 39],

            ['noiDungLuaChon' => 'Duyệt rộng', 'isCorrectAnswer' => true, 'cauHoiId' => 40],
            ['noiDungLuaChon' => 'Duyệt sâu', 'isCorrectAnswer' => false, 'cauHoiId' => 40],
            ['noiDungLuaChon' => 'Sắp xếp', 'isCorrectAnswer' => false, 'cauHoiId' => 40],
            ['noiDungLuaChon' => 'Đệ quy', 'isCorrectAnswer' => false, 'cauHoiId' => 40],

            ['noiDungLuaChon' => 'Tập đỉnh và cạnh', 'isCorrectAnswer' => true, 'cauHoiId' => 41],
            ['noiDungLuaChon' => 'Danh sách số', 'isCorrectAnswer' => false, 'cauHoiId' => 41],
            ['noiDungLuaChon' => 'Mảng 2 chiều', 'isCorrectAnswer' => false, 'cauHoiId' => 41],
            ['noiDungLuaChon' => 'Cây', 'isCorrectAnswer' => false, 'cauHoiId' => 41],

            ['noiDungLuaChon' => 'Cạnh có hướng', 'isCorrectAnswer' => true, 'cauHoiId' => 42],
            ['noiDungLuaChon' => 'Không có cạnh', 'isCorrectAnswer' => false, 'cauHoiId' => 42],
            ['noiDungLuaChon' => 'Cạnh vô hướng', 'isCorrectAnswer' => false, 'cauHoiId' => 42],
            ['noiDungLuaChon' => 'Chỉ có node', 'isCorrectAnswer' => false, 'cauHoiId' => 42],

            ['noiDungLuaChon' => 'Cạnh không hướng', 'isCorrectAnswer' => true, 'cauHoiId' => 43],
            ['noiDungLuaChon' => 'Cạnh có hướng', 'isCorrectAnswer' => false, 'cauHoiId' => 43],
            ['noiDungLuaChon' => 'Không có cạnh', 'isCorrectAnswer' => false, 'cauHoiId' => 43],
            ['noiDungLuaChon' => 'Chỉ có node', 'isCorrectAnswer' => false, 'cauHoiId' => 43],

            ['noiDungLuaChon' => 'Tìm đường ngắn nhất', 'isCorrectAnswer' => true, 'cauHoiId' => 44],
            ['noiDungLuaChon' => 'Sắp xếp mảng', 'isCorrectAnswer' => false, 'cauHoiId' => 44],
            ['noiDungLuaChon' => 'Duyệt cây', 'isCorrectAnswer' => false, 'cauHoiId' => 44],
            ['noiDungLuaChon' => 'Tìm max', 'isCorrectAnswer' => false, 'cauHoiId' => 44],

            ['noiDungLuaChon' => 'Hàm gọi lại chính nó', 'isCorrectAnswer' => true, 'cauHoiId' => 45],
            ['noiDungLuaChon' => 'Hàm không trả về', 'isCorrectAnswer' => false, 'cauHoiId' => 45],
            ['noiDungLuaChon' => 'Hàm chỉ chạy 1 lần', 'isCorrectAnswer' => false, 'cauHoiId' => 45],
            ['noiDungLuaChon' => 'Hàm nhập dữ liệu', 'isCorrectAnswer' => false, 'cauHoiId' => 45],

            ['noiDungLuaChon' => 'Quay lui thử nghiệm', 'isCorrectAnswer' => true, 'cauHoiId' => 46],
            ['noiDungLuaChon' => 'Duyệt tuyến tính', 'isCorrectAnswer' => false, 'cauHoiId' => 46],
            ['noiDungLuaChon' => 'Sắp xếp nhanh', 'isCorrectAnswer' => false, 'cauHoiId' => 46],
            ['noiDungLuaChon' => 'Tìm kiếm nhị phân', 'isCorrectAnswer' => false, 'cauHoiId' => 46],

            ['noiDungLuaChon' => 'Chọn tối ưu cục bộ', 'isCorrectAnswer' => true, 'cauHoiId' => 47],
            ['noiDungLuaChon' => 'Thử tất cả', 'isCorrectAnswer' => false, 'cauHoiId' => 47],
            ['noiDungLuaChon' => 'Gọi đệ quy', 'isCorrectAnswer' => false, 'cauHoiId' => 47],
            ['noiDungLuaChon' => 'Lưu mảng', 'isCorrectAnswer' => false, 'cauHoiId' => 47],

            ['noiDungLuaChon' => 'Tối ưu bằng ghi nhớ', 'isCorrectAnswer' => true, 'cauHoiId' => 48],
            ['noiDungLuaChon' => 'Chạy ngẫu nhiên', 'isCorrectAnswer' => false, 'cauHoiId' => 48],
            ['noiDungLuaChon' => 'Không tối ưu', 'isCorrectAnswer' => false, 'cauHoiId' => 48],
            ['noiDungLuaChon' => 'Chỉ lặp', 'isCorrectAnswer' => false, 'cauHoiId' => 48],

            ['noiDungLuaChon' => 'Lưu dữ liệu bằng hash', 'isCorrectAnswer' => true, 'cauHoiId' => 49],
            ['noiDungLuaChon' => 'Lưu theo thứ tự', 'isCorrectAnswer' => false, 'cauHoiId' => 49],
            ['noiDungLuaChon' => 'Lưu dạng cây', 'isCorrectAnswer' => false, 'cauHoiId' => 49],
            ['noiDungLuaChon' => 'Lưu dạng mảng 2D', 'isCorrectAnswer' => false, 'cauHoiId' => 49],

            ['noiDungLuaChon' => 'Trùng giá trị hash', 'isCorrectAnswer' => true, 'cauHoiId' => 50],
            ['noiDungLuaChon' => 'Không có giá trị', 'isCorrectAnswer' => false, 'cauHoiId' => 50],
            ['noiDungLuaChon' => 'Sai kiểu dữ liệu', 'isCorrectAnswer' => false, 'cauHoiId' => 50],
            ['noiDungLuaChon' => 'Lỗi bộ nhớ', 'isCorrectAnswer' => false, 'cauHoiId' => 50],

        ];


        foreach ($answers as $answer) {
            CauTraLoi::firstOrCreate($answer);
        }
    }
}
