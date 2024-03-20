-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2024 lúc 07:33 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `singedshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `idBill` int(11) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `totalQuanty` int(11) DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `totalPrice` double DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`idBill`, `phone`, `email`, `totalQuanty`, `orderDate`, `status`, `totalPrice`, `address`) VALUES
(27, '0703200286', 'bestleague07072002@gmail.com', 3, '2024-01-25', 'Confirmed', 552.6, '83/1b Ấp Tây Lân , Bà Điểm , Hóc Môn'),
(31, '0909582399', 'huynhminhquan07072002@gmail.com', 2, '2024-01-12', 'Pending confirmation', 372.6, '83/1b Ấp Tây Lân , Bà Điểm , Hóc Môn'),
(32, '0703200286', 'bestleague07072002@gmail.com', 4, '2024-12-24', 'Pending confirmation', 745.2, '83/1b Ấp Tây Lân , Bà Điểm , Hóc Môn'),
(33, '0909582399', 'bestleague07072002@gmail.com', 2, '2024-11-11', 'Pending confirmation', 372.6, '83/1b Ấp Tây Lân , Bà Điểm , Hóc Môn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetail`
--

CREATE TABLE `billdetail` (
  `idBillDetail` int(11) NOT NULL,
  `quanty` int(11) DEFAULT NULL,
  `totalPrice` decimal(10,2) DEFAULT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `nameProduct` varchar(200) DEFAULT NULL,
  `idBill` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `billdetail`
--

INSERT INTO `billdetail` (`idBillDetail`, `quanty`, `totalPrice`, `idProduct`, `idCategory`, `nameProduct`, `idBill`, `image`) VALUES
(1, 1, 180.00, 6, 1, 'Áo thun Original', 27, 'hinh6.jpg'),
(2, 1, 180.00, 9, 1, 'Áo Polo Tee', 27, 'hinh9.webp'),
(3, 1, 192.60, 12, 1, 'Áo sơ mi xanh đen', 27, 'hinh12.jpg'),
(4, 1, 180.00, 9, 1, 'Áo Polo Tee', 31, 'hinh9.webp'),
(5, 1, 192.60, 12, 1, 'Áo sơ mi xanh đen', 31, 'hinh12.jpg'),
(6, 2, 360.00, 9, 1, 'Áo Polo Tee', 32, 'hinh9.webp'),
(7, 2, 385.20, 12, 1, 'Áo sơ mi xanh đen', 32, 'hinh12.jpg'),
(8, 1, 180.00, 9, 1, 'Áo Polo Tee', 33, 'hinh9.webp'),
(9, 1, 192.60, 12, 1, 'Áo sơ mi xanh đen', 33, 'hinh12.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `IDLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`IDLoai`, `TenLoai`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colorproduct`
--

CREATE TABLE `colorproduct` (
  `IDMau` int(11) NOT NULL,
  `TenMau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `colorproduct`
--

INSERT INTO `colorproduct` (`IDMau`, `TenMau`) VALUES
(1, 'Đen'),
(2, 'Trắng'),
(3, 'Xám'),
(4, 'Đỏ'),
(5, 'Xanh dương'),
(6, 'Xanh lá'),
(7, 'Vàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `material`
--

CREATE TABLE `material` (
  `idMaterial` int(11) NOT NULL,
  `nameMaterial` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `nameProduct` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `oldPrice` double DEFAULT NULL,
  `describe` text DEFAULT NULL,
  `idStyle` int(11) DEFAULT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `idMaterial` int(11) DEFAULT NULL,
  `blob` varchar(50) DEFAULT NULL,
  `purchases` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Sale` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`idProduct`, `nameProduct`, `quantity`, `price`, `oldPrice`, `describe`, `idStyle`, `idCategory`, `idMaterial`, `blob`, `purchases`, `Date`, `Sale`) VALUES
(1, 'Simple Hoodie', 40, 630, 700, 'Vật liệu: Polyester Chiều dài tay áo: Tay áo dài Thương hiệu: ChArmkpR Độ dày: Vừa phải Mùa: Mùa đông Yếu tố thiết kế: Túi, dây rút Loại phù hợp: Lỏng lẻo', 3, 1, NULL, 'hinh1.jpg', 2, '2023-04-14', 0.1),
(2, 'Sơ mi đi biển', 23, 345.6, 384, 'Chiếc áo sơ mi có họa tiết trái cây, rau và lá, rất phù hợp cho kỳ nghỉ. Kết hợp nó với quần jean để có một vẻ n;ài mùa hè sang trọng và giản dị.', 4, 1, NULL, 'hinh2.webp', 4, '2023-04-12', 0.1),
(3, 'Áo Polo đơn giản', 42, 1100.7, 1223, 'Áo polo vải cotton dệt kim. Cổ ve lật, cài khuy phía trước. Cộc tay. Cổ tay và gấu bo viền bằng vải gân.', 2, 1, NULL, 'hinh3.jpg', 5, '2023-04-02', 0.1),
(4, 'Áo Blazer khóa kéo', 21, 3599.1, 3999, 'Áo khoác blazer chất liệu pha len, dáng relaxed fit. Cổ ve lật, ve áo kiểu chữ K, dài tay, có các khuy cài ở cổ tay. Có túi có nắp hai bên hông. Một túi ở lớp vải lót bên trong. Gấu áo xẻ chính giữa phía sau. Cài phía trước', 1, 1, NULL, 'hinh4.jpg', 5, '2023-03-11', 0.1),
(5, 'Áo len đơn giản', 42, 720, 800, 'Áo len dáng rộng, cổ tròn, dài tay. Bo viền bằng vải gân.', 5, 1, NULL, 'hinh5.jpg', 6, '2023-04-14', 0.1),
(6, 'Áo thun Original', 23, 180, 200, 'Chất liệu: Cotton Compact 2C Thành phần: 100% Cotton - Thân thiện - Thấm hút thoát ẩm - Mềm mại - Kiểm soát mùi - Điều hòa nhiệt', 1, 1, NULL, 'hinh6.jpg', 6, '2023-04-11', 0.1),
(7, 'Hoodie tay ngắn', 12, 370.8, 412, 'Vải kaki. Thiết kế đơn giản, tay ngắn, mũ chụp', 5, 1, NULL, 'hinh7.jpg', 5, '2023-04-14', 0.1),
(8, 'Hoodie Sweatshirt', 14, 720, 800, 'Áo khoác hoodie pullover của BDG với màu sắc ombre. Áo len nỉ cotton poly với kiểu dáng rộng và có mũ điều chỉnh. Đây là sản phẩm độc quyền của Urban Outfitters.', 5, 1, NULL, 'hinh8.webp', 7, '2023-04-14', 0.1),
(9, 'Áo Polo Tee', 124, 180, 200, 'Áo thun cổ áo của Vans được làm từ vải cotton. Áo cổ áo tay ngắn nút cài phần mở ở phía trước và cổ áo polo sọc.', 1, 1, NULL, 'hinh9.webp', 9, '2023-04-05', 0.1),
(10, 'Áo Sơ mi sọc nhăn Standard Cloth Liam.', 52, 450, 500, 'Áo sơ mi cổ áo không nhăn, tay ngắn của Standard Cloth. Có hoa văn sọc trên toàn bộ áo. Kiểu áo cài nút, có túi ngực bên trái và cổ áo có phần nhọn. Đây là sản phẩm độc quyền của Urban Outfitters.', 4, 1, NULL, 'hinh10.webp', 2, '2023-04-11', 0.1),
(11, 'Áo khoác nam có cổ Retro Túi nút', 42, 811.8, 902, 'Quần áo nữ Quần áo nam Quần áo trẻ em Khác Climbing123---Để trở nên chuyên nghiệp hơn Mô tả Sản phẩm Nhãn hiệu Áo khoác mẫu mã Dòng sản phẩm Áo khoác kiểu nhà máy Loại Kích thước Mẫu thông thường In Quốc gia/Khu vực sản xuất Trung Quốc Các tính hợp Thoáng khí, Có cổ, Túi Chủ đề Đại học, Điểm nhấn n;ài trời Loại nút Áo khoác Nút đóng Chăm sóc hàng may mặc Bộ phận có thể giặt bằng máy Nam Chất liệu cách nhiệt Polyester Dịp thông thường Chất liệu vỏ n;ài', 2, 1, NULL, 'hinh11.jpg', 2, '2023-06-21', 0.1),
(12, 'Áo sơ mi xanh đen', 21, 192.6, 214, 'Quần áo nữ Quần áo nam Quần áo trẻ em Khác Climbing123---Để trở nên chuyên nghiệp hơn Mô tả Sản phẩm Nhãn hiệu Áo khoác mẫu mã Dòng sản phẩm Áo khoác kiểu nhà máy Loại Kích thước Mẫu thông thường In Quốc gia/Khu vực sản xuất Trung Quốc Các tính hợp Thoáng khí, Có cổ, Túi Chủ đề Đại học, Điểm nhấn n;ài trời Loại nút Áo khoác Nút đóng Chăm sóc hàng may mặc Bộ phận có thể giặt bằng máy Nam Chất liệu cách nhiệt Polyester Dịp thông thường Chất liệu vỏ n;ài', 1, 1, NULL, 'hinh12.jpg', 2, '2023-06-21', 0.1),
(13, 'Áo sơ mi bụi tay dài', 50, 127.8, 139, 'Chưa có bình luận nào! Thêm một để bắt đầu cuộc trò chuyện.', 1, 1, NULL, 'hinh13.jpg', 2, '2023-06-21', 0.1),
(14, 'Áo sơ mi Long-Sleved', 24, 125.1, 142, 'Các phong cách độc đáo thường xuyên được thêm vào! Lấy cảm hứng! Không chắc chắn về sự phù hợp? Ghé thăm hướng dẫn định cỡ của chúng tôi', 1, 1, NULL, 'hinh14.jpg', 2, '2023-06-21', 0.1),
(15, 'Áo sơ mi trắng', 124, 111.6, 124, 'Tốt !', 1, 1, NULL, 'hinh15.jpg', 2, '2023-06-21', 0.1),
(16, 'Áo thun xám xanh huyền bí', 21, 270, 300, 'Tối giản, nhanh gọn lẹ, tự tin và năng động, đem lại 1 nguồn năng lượng mới!', 3, 1, NULL, 'hinh16.jpg', 2, '2023-06-21', 0.1),
(17, 'Áo sơ mi đen phong cách Nhật', 23, 130.5, 145, 'Tối giản, nhanh gọn lẹ, tự tin và năng động, đem lại 1 nguồn năng lượng mới!', 1, 1, NULL, 'hinh17.jpg', 2, '2023-06-21', 0.1),
(18, 'Áo sơ mi sọc xanh trơn', 24, 110.7, 123, 'Tối giản, nhanh gọn lẹ, tự tin và năng động, đem lại 1 nguồn năng lượng mới!', 1, 1, NULL, 'hinh18.jpg', 2, '2023-06-21', 0.1),
(19, 'Áo sơ mi họa tiết ô vuông', 51, 20.7, 23, 'Tối giản, nhanh gọn lẹ, tự tin và năng động, đem lại 1 nguồn năng lượng mới!', 1, 1, NULL, 'hinh19.jpg', 2, '2023-06-21', 0.1),
(20, 'Áo sơ mi họa tiết ô xám', 536, 40.5, 45, 'Tối giản, nhanh gọn lẹ, tự tin và năng động, đem lại 1 nguồn năng lượng mới!', 1, 1, NULL, 'hinh20.jpg', 2, '2023-06-21', 0.1),
(21, 'Áo sơ mi xanh đen', 23, 200.7, 223, 'Tối giản, nhanh gọn lẹ, tự tin và năng động, đem lại 1 nguồn năng lượng mới!', 1, 1, NULL, 'hinh21.jpg', 2, '2023-06-21', 0.1),
(22, 'Quần Jean ống lửng', 525, 566.1, 629, 'Quần jeans dáng relaxed fit. Có 5 túi. Kiểu bạc màu. Ống lửng cắt cúp. Cài khóa kéo và khuy phía trước.', 1, 2, NULL, 'hinh22.jpg', 2, '2023-04-14', 0.1),
(23, 'Quần Jogger basic', 211, 360, 400, 'Quần cạp co giãn, có dây rút để điều chỉnh. Có hai túi phía trước và một túi đáp phía sau. Bo gấu bằng vải gân.', 3, 2, NULL, 'hinh23.jpg', 4, '2023-04-08', 0.1),
(24, 'Quần Jean ống lửng', 52, 566.1, 629, 'Quần jeans dáng relaxed fit. Có 5 túi. Kiểu bạc màu. Ống lửng cắt cúp. Cài khóa kéo và khuy phía trước.', 4, 2, NULL, 'hinh24.jpg', 5, '2023-04-10', 0.1),
(25, 'Quần thể thao basic', 52, 1260, 1400, 'Quần dáng straight fit. Có hai túi phía trước và hai túi may viền phía sau. Cài khóa kéo và khuy phía trước.', 3, 2, NULL, 'hinh25.jpg', 6, '2023-04-13', 0.1),
(26, 'Quần Baggy bạc màu', 12, 379.8, 422, 'Quần Âu dáng slim fit. Có hai túi phía trước và hai túi may viền phía sau. Cài phía trước bằng khóa kéo và khuy.', 5, 2, NULL, 'hinh26.jpg', 7, '2023-04-09', 0.1),
(27, 'Quần Tây Âu vải hoa văn', 14, 1529.1, 1699, 'Quần jeans dáng straight fit. Có hai túi phía trước và hai túi đáp phía sau. Có túi đáp có nắp hai bên ống quần. Kiểu bạc màu. Cài khóa kéo và khuy phía trước.', 2, 2, NULL, 'hinh27.jpg', 2, '2023-04-14', 0.1),
(28, 'Quần Tây Âu dáng Slim', 124, 1169.1, 1299, 'Quần short bermuda dáng relaxed fit. Cạp có chi tiết xếp li phía trước. Có hai túi phía trước và hai túi phía sau. Cài khóa kéo và khuy phía trước', 2, 2, NULL, 'hinh28.jpg', 3, '2023-04-10', 0.1),
(29, 'Quần Jean dáng Straight', 6, 1110.6, 1234, 'Vải cotton Ý 430 gr Thành phần: 98% cotton và 2% elastane mang lại cảm giác thoải mái hơn Màu sắc: Khaki Quần cạp cao với phom vừa vặn Đai buộc bản to bản dài Xếp ly đơn Điều chỉnh bên Sản xuất tại Ý Tất cả quần của chúng tôi đều đi kèm với một chiếc chưa hoàn thành viền để bạn có thể điều chỉnh độ dài theo sở thích của mình', 4, 2, NULL, 'hinh29.jpg', 4, '2023-04-11', 0.1),
(30, 'Quần Short Bermuda', 42, 1169.1, 1299, 'Vải cổ áo màu xám đậm Bộ quần áo nam co giãn nhẹ được tôn tạo trơn', 4, 2, NULL, 'hinh30.jpg', 6, '2023-04-01', 0.1),
(31, 'Quần Kaki cotton', 78, 218.7, 243, 'Giảm giá quần áo mùa hè 2022 trực tuyến | Giảm Đến 70% | SOINYOU', 1, 2, NULL, 'hinh31.jpg', 23, '2023-07-01', 0.1),
(32, 'Quần Kaki Detail Slant Pocket', 24, 360, 400, 'Ngày nay không có người đàn ông nào muốn trông có vẻ là công ty, thậm chí cả khi họ phải diện trang phục công sở. Có vẻ như đây là trường hợp bạn. Chất liệu: vở bàn luận', 2, 2, NULL, 'hinh32.jpg', 6, '2023-04-01', 0.1),
(33, 'Quần Short Thin Naples', 52, 315, 350, 'Tìm quần nam để đi bộ đường dài, leo núi, v.v. prAna cung cấp các kiểu quần âu nam, quần jean & quần năng động cho phong cách sống năng động của bạn. Mua sắm ngay bây giờ!', 1, 2, NULL, 'hinh33.jpg', 21, '2023-07-01', 0.1),
(34, 'Quần Tây Gentleman elegant and Comfortable', 77, 2206.8, 2452, 'Nó bắt đầu với những vật liệu tốt hơn, tiếp tục với thiết kế tốt hơn và chúng tôi mang đến cho bạn những phong cách mới mẻ cho những cách làm việc mới! Đừng bỏ lỡ nó, hãy cập nhật hàng ngày!', 1, 2, NULL, 'hinh34.jpg', 5, '2023-07-06', 0.1),
(35, 'Quần Mens Casual', 12, 220.5, 245, 'Vải cổ áo màu xám đậm Bộ quần áo nam co giãn nhẹ được tôn tạo trơn', 1, 2, NULL, 'hinh35.jpg', 8, '2023-07-01', 0.1),
(36, 'Quần Mens Solid Color Loose Casual', 78, 1011.6, 1124, 'Quần dáng straight fit. Có hai túi phía trước và hai túi may viền phía sau. Cài khóa kéo và khuy phía trước.', 1, 2, NULL, 'hinh36.jpg', 2, '2023-07-01', 0.1),
(37, 'Kính cận đèn xanh Wes Round', 35, 630, 700, 'Kính chống ánh sáng xanh dạng tròn. Có thiết kế cổ điển với khung dây kim loại và đệm cầu mũi. Hoàn thiện với mắt kính trong suốt không có tác dụng kính cận', 1, 3, NULL, 'hinh37.webp', 1, '2023-01-01', 0.1),
(38, 'THẮT LƯNG DA DÙNG HAI MẶT', 66, 270, 300, 'Thắt lưng da dùng được cả hai mặt. Có một đai luồn dây và khóa cài.', 2, 3, NULL, 'hinh38.jpg', 1, '2023-01-01', 0.1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `codeRole` varchar(50) DEFAULT NULL,
  `nameRole` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`idRole`, `codeRole`, `nameRole`) VALUES
(1, 'ADMIN', 'Administrator'),
(2, 'USER', 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizeproduct`
--

CREATE TABLE `sizeproduct` (
  `IDSize` int(11) NOT NULL,
  `TenSize` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizeproduct`
--

INSERT INTO `sizeproduct` (`IDSize`, `TenSize`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `style`
--

CREATE TABLE `style` (
  `IDPhongCach` int(11) NOT NULL,
  `TenPhongCach` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `style`
--

INSERT INTO `style` (`IDPhongCach`, `TenPhongCach`) VALUES
(1, 'Tối giản'),
(2, 'Công sở'),
(3, 'Thể thao'),
(4, 'Đường phố'),
(5, 'Du mục');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`idUser`, `fullName`, `phone`, `password`, `email`, `status`, `gender`, `age`, `address`) VALUES
(34, 'Huynh Minh Quan', '0703200286', '$2a$10$UqC6jgS2fUa1DqFmiWwNY.HpgiCVMeqvdeHErwmcCHOED5k5IJoRC', NULL, 1, NULL, NULL, NULL),
(35, 'Singed', '113', '$2a$10$OAQkfITrq7zOA5khUhp9IuBQtj/ez.q2Dm68BD3cmO91cjmykquSu', 'huynhminhquan07072002@gmail.com', 1, 'Nam', 22, '83/1b ấp tây lân bà điểm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `idUser` int(11) DEFAULT NULL,
  `idRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`idUser`, `idRole`) VALUES
(34, 1),
(35, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idBill`);

--
-- Chỉ mục cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`idBillDetail`),
  ADD KEY `FK_BillDetail_Bill` (`idBill`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`IDLoai`);

--
-- Chỉ mục cho bảng `colorproduct`
--
ALTER TABLE `colorproduct`
  ADD PRIMARY KEY (`IDMau`);

--
-- Chỉ mục cho bảng `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `FK_Product_Category` (`idCategory`),
  ADD KEY `FK_Product_Material` (`idMaterial`),
  ADD KEY `FK_Product_Style` (`idStyle`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Chỉ mục cho bảng `sizeproduct`
--
ALTER TABLE `sizeproduct`
  ADD PRIMARY KEY (`IDSize`);

--
-- Chỉ mục cho bảng `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`IDPhongCach`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `FK_User_Role_Role` (`idRole`),
  ADD KEY `FK_User_Role_User` (`idUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `idBill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  MODIFY `idBillDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `FK_BillDetail_Bill` FOREIGN KEY (`idBill`) REFERENCES `bill` (`idBill`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
