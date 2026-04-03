<?php

namespace Database\Seeders;

use App\Models\CauHoi;
use App\Models\MonHoc;
use App\Models\User;
use Illuminate\Database\Seeder;

class CauHoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lấy dữ liệu liên quan
        $teacher = User::where('username', 'giangvien')->first();
        $monLapTrinhC = MonHoc::where('tenMonHoc', 'Lập trình C')->first();
        $monCTDL = MonHoc::where('tenMonHoc', 'Cấu trúc dữ liệu và giải thuật')->first();

        $cauHois = [

            // ===== MÔN 1: LẬP TRÌNH C (25 câu) =====
            ['noiDungCauHoi' => 'Kiểu dữ liệu int trong C dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'int dùng để lưu số nguyên.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Hàm main() trong C có vai trò gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Là điểm bắt đầu chương trình.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Toán tử ++ trong C có ý nghĩa gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Tăng giá trị biến lên 1.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Toán tử -- trong C có ý nghĩa gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Giảm giá trị biến đi 1.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Câu lệnh if dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Rẽ nhánh theo điều kiện.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            ['noiDungCauHoi' => 'Câu lệnh switch-case dùng khi nào?', 'monHocId' => 1, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Khi có nhiều lựa chọn theo giá trị.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Vòng lặp for dùng khi nào?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Khi biết trước số lần lặp.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Vòng lặp while khác gì do-while?', 'monHocId' => 1, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'do-while chạy ít nhất 1 lần.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Mảng là gì trong C?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Tập hợp phần tử cùng kiểu.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Chỉ số mảng bắt đầu từ đâu?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Bắt đầu từ 0.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            ['noiDungCauHoi' => 'Con trỏ là gì?', 'monHocId' => 1, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Biến lưu địa chỉ.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Toán tử & dùng làm gì?', 'monHocId' => 1, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Lấy địa chỉ biến.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Toán tử * trong con trỏ có ý nghĩa gì?', 'monHocId' => 1, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Truy cập giá trị tại địa chỉ.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'malloc dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Cấp phát bộ nhớ động.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'free() dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Giải phóng bộ nhớ.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            ['noiDungCauHoi' => 'Hàm printf dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'In ra màn hình.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Hàm scanf dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Nhập dữ liệu.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Biến toàn cục là gì?', 'monHocId' => 1, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Khai báo ngoài hàm.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Biến cục bộ là gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Khai báo trong hàm.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Hàm có giá trị trả về là gì?', 'monHocId' => 1, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Trả về kết quả qua return.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            ['noiDungCauHoi' => 'Kiểu char dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Lưu ký tự.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Kiểu float dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Lưu số thực.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Kiểu double khác float ở điểm nào?', 'monHocId' => 1, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Độ chính xác cao hơn.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'sizeof dùng để làm gì?', 'monHocId' => 1, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Lấy kích thước dữ liệu.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Hằng số là gì?', 'monHocId' => 1, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Giá trị không thay đổi.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            // ===== MÔN 2: CTDL & GT (25 câu) =====
            ['noiDungCauHoi' => 'Stack là gì?', 'monHocId' => 2, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Cấu trúc LIFO.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Queue là gì?', 'monHocId' => 2, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Cấu trúc FIFO.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Danh sách liên kết là gì?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Các node liên kết.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Linked list khác mảng thế nào?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Không liên tục bộ nhớ.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Binary Search là gì?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Tìm kiếm chia đôi.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            ['noiDungCauHoi' => 'Độ phức tạp O(n) là gì?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Tăng tuyến tính.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Bubble Sort là gì?', 'monHocId' => 2, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Sắp xếp nổi bọt.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Selection Sort là gì?', 'monHocId' => 2, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Chọn phần tử nhỏ nhất.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Insertion Sort là gì?', 'monHocId' => 2, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Chèn phần tử vào đúng vị trí.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Quick Sort trung bình là bao nhiêu?', 'monHocId' => 2, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'O(n log n).', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            ['noiDungCauHoi' => 'Merge Sort là gì?', 'monHocId' => 2, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Chia để trị.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Heap là gì?', 'monHocId' => 2, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Cây nhị phân đặc biệt.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Cây nhị phân là gì?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Mỗi node tối đa 2 con.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'DFS là gì?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Duyệt sâu.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'BFS là gì?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Duyệt rộng.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            ['noiDungCauHoi' => 'Đồ thị là gì?', 'monHocId' => 2, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Tập đỉnh và cạnh.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Đồ thị có hướng là gì?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Cạnh có hướng.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Đồ thị vô hướng là gì?', 'monHocId' => 2, 'doKhoId' => 1, 'imageUrl' => null, 'giaiThichDapAn' => 'Cạnh không hướng.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Thuật toán Dijkstra dùng để làm gì?', 'monHocId' => 2, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Tìm đường ngắn nhất.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Đệ quy là gì?', 'monHocId' => 2, 'doKhoId' => 2, 'imageUrl' => null, 'giaiThichDapAn' => 'Hàm gọi lại chính nó.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],

            ['noiDungCauHoi' => 'Backtracking là gì?', 'monHocId' => 2, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Quay lui thử nghiệm.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Greedy là gì?', 'monHocId' => 2, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Chọn tối ưu cục bộ.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Dynamic Programming là gì?', 'monHocId' => 2, 'doKhoId' => 4, 'imageUrl' => null, 'giaiThichDapAn' => 'Tối ưu bằng ghi nhớ.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Hash table là gì?', 'monHocId' => 2, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Lưu dữ liệu bằng hash.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
            ['noiDungCauHoi' => 'Collision trong hash là gì?', 'monHocId' => 2, 'doKhoId' => 3, 'imageUrl' => null, 'giaiThichDapAn' => 'Trùng giá trị hash.', 'diemMacDinh' => 1, 'nguoiTaoId' => 2, 'soLuotSuDung' => 0, 'status' => 'public', 'isDeleted' => false],
        ];

        foreach ($cauHois as $cauHoi) {
            CauHoi::firstOrCreate($cauHoi);
        }
    }
}
