-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2025 at 01:02 AM
-- Server version: 8.0.39
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int NOT NULL,
  `quantity` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Giày', 1),
(2, 'Giày Adidas', 1),
(3, 'Giày Thể Thao', 1),
(9, 'giày bitis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `date`, `user_id`, `product_id`, `status`) VALUES
(1, 'fewff', '2024-11-25 13:43:01', 5, 1, 1),
(2, 'fefe', '2024-11-25 13:43:05', 5, 1, 1),
(3, 'ềd', '2024-11-25 14:03:46', 5, 1, 1),
(4, 'fwefwe', '2024-12-04 13:53:51', 5, 3, 1),
(5, 'efwefew', '2024-12-04 13:54:00', 5, 3, 1),
(6, 'đeweqd\r\n', '2024-12-04 13:54:26', 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('paid','unpaid') COLLATE utf8mb4_general_ci DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(16, 11, 500000.00, 'paid', '2025-03-31 02:40:05', '2025-03-31 02:40:05'),
(17, 12, 250000.00, 'unpaid', '2025-03-31 02:40:05', '2025-03-31 02:40:05'),
(18, 13, 1000000.00, 'paid', '2025-03-31 02:40:05', '2025-03-31 02:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int NOT NULL,
  `phone` varchar(10) NOT NULL,
  `total` int NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `status`, `user_id`, `phone`, `total`, `address`) VALUES
(11, '2025-03-31 09:39:11', 0, 5, '0123456789', 500000, 'Hà Nội'),
(12, '2025-03-31 09:39:11', 1, 6, '0987654321', 250000, 'Hồ Chí Minh'),
(13, '2025-03-31 09:39:11', 0, 7, '0369123456', 1000000, 'Đà Nẵng');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `date` datetime NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `discount_price` int NOT NULL DEFAULT '0',
  `is_feature` tinyint(1) NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  `long_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `discount_price`, `is_feature`, `view`, `date`, `description`, `long_description`, `status`, `category_id`, `quantity`) VALUES
(1, 'Giày Adidas', 62950, 'mwc.jpg', 10000, 0, 0, '2024-11-18 17:08:23', '<p><strong>SKU:</strong>290001929000</p><p>Kích cỡ: 150G - 200G/TRÁI.</p><p>Khu vực giao hàng: Chỉ TP.HCM</p>', '<p>&nbsp;&nbsp;Mô tả chung: TÁO GALA MỸ</p><p><strong>Táo Gala</strong> có vỏ sọc đỏ trên nền vàng kem, táo này khá giòn và ngọt. Có 2 loại chính là <i>Royal Gala và Pale Gala</i>.</p><p>&nbsp;&nbsp;Thông tin chi tiết</p><p><span style=\"color:rgb(0,100,0);\"><strong>Mùa vụ</strong></span></p><p>Mùa Táo gala Mỹ từ tháng 9 đến tháng 6 năm sau, <strong>táo gala</strong> vào chính vụ ăn giòn và rất ngọt.</p><p><span style=\"color:rgb(0,100,0);\"><strong>Giá trị dinh dưỡng</strong></span></p><p>Táo chứa nhiều vitamin A,C.&nbsp;Vỏ táo giàu chất xơ và có lợi cho hệ tiêu hóa, hơn 1 nửa lượng vitamin C của quả táo đều nằm ở vỏ. <strong>Táo Gala</strong> đặc biệt dùng để ép nước rất ngon: ngọt, thơm, nhiều nước và nước không bị thâm như các loại táo khác, công thức ép rất đơn giản: cắt quả táo ra làm 4 sau đó cho vào máy ép. 3 quả sẽ ép được 01 cốc. Ngoài ra <strong>Táo Gala</strong> còn thường dùng để làm salad và các món trộn...</p><p><strong>Bạn có thể tham khảo thêm về:&nbsp;Các loại sốt dùng để trộn Salad</strong>&nbsp;bạn có thể mua tại Nam An market.</p><p><span style=\"color:rgb(0,100,0);\"><strong>Bảo quản</strong></span></p><p>Tủ lạnh từ 4 đến 8 độ C: Táo giữ được độ tươi, độ giòn trong vòng 1-4 tuần. Sau thời gian này, táo sẽ ngọt hơn, độ PSI thấp hơn (táo xốp hơn). Cần tránh để táo với các thực phẩm có mùi khác như hành, tỏi, táo sẽ dễ nhiễm mùi.</p><p><span style=\"color:rgb(0,100,0);\"><strong>Các trường hợp cần lưu ý</strong></span></p><p><strong>Táo bị thâm bên trong:</strong> Vỏ quả táo rất khỏe và hơn nữa nó thường được tráng một lớp sáp ong trước khi xuất khẩu (táo Washington) nên táo rất ít khi hỏng từ bên ngoài và nhìn bằng mắt thường trừ khi vỏ bị dập do va chạm trong quá trình vận chuyển. Cuống táo là nơi nhạy cảm nhất, thường chỉ một vết xước ở cuống, hoặc có nước đọng nơi cuống cũng sẽ dễ dàng giúp cho vi khuẩn thâm nhập quả táo và làm hỏng táo từ bên trong.</p><p><strong>Táo bị xốp:</strong> Táo bị xốp không phải là táo hỏng mà do là độ giòn (PSI) bị giảm đi. Nhiều người lại thích ăn táo xốp vì nó không quá cứng, nhất là khi cho trẻ em ăn. Táo xốp thường rất ngọt. Táo xốp vẫn đảm bảo chất lượng và hàm lượng vitamin trong quả. Táo xốp do nhiều nguyên nhân. Thứ nhất là bản thân quả táo khi hái đã có mức độ chín hơi quá nên kể cả khi bảo quản lạnh đúng tiêu chuẩn, nó vẫn chín nhanh hơn, và trở nên xốp hơn. Thứ 2 là do lỗi quá trình bảo quản nhiệt độ không đúng tiêu chuẩn làm táo chín nhanh hơn. Một số loại táo như Gala Red Decilous thì có độ giòn (PSI) thấp hơn táo Ambrosia hay Envy là các giống táo được lai tạo.</p><p>Ngoài ra, Nam An Market cũng cung cấp nhiều sản phẩm trái cây tươi khác</p><p><strong>Xem thêm:</strong></p><p><strong>10 LÝ DO NÊN ĂN TÁO MỖI NGÀY</strong></p><p><strong>PHÂN BIỆT TÁO MỸ VÀ TÁO TRUNG QUỐC – KHÔNG KHÓ!</strong></p><p><strong>NHỮNG QUY TẮC TRONG NẤU ĂN GIÚP NÂNG CAO SỨC KHỎE</strong></p><p><strong>CÁC BIỆN PHÁP TRÁNH NHIỄM CHÉO KHI LƯU TRỮ THỰC PHẨM</strong></p><p><strong>BẠN NÊN ĂN BAO NHIÊU GRAM TRÁI CÂY VÀ RAU QUẢ MỖI NGÀY?</strong></p><p><strong>PHÂN BIỆT CÁC LOẠI TÁO NHẬP KHẨU NHƯ THẾ NÀO?</strong></p>', 1, 3, 0),
(3, 'Giày Bitis', 84950, '20241209021204.png', 5000, 2, 0, '2024-11-18 17:51:16', '<p><strong>SKU:</strong>290001912000</p><p><span style=\"color:black;\">Kích cỡ: 500g +/ trái</span></p><p><span style=\"color:black;\">Khu vực giao hàng: Chỉ TP.HCM</span></p>', '<p>&nbsp;&nbsp;MÔ TẢ CHUNG: LÊ HÀN QUỐC</p><p><strong>Lê Hàn Quốc</strong> là loại Lê cao cấp nhất, lê được lựa chọn từ các vườn danh tiếng hàng đầu tại Hàn Quốc. Quả Lê Hàn Quốc rất lớn, trọng lượng trung bình khoảng 600gr - 900gr/quả, vỏ mỏng, căng mượt, thịt giòn, ngọt và mọng nước.</p><p>&nbsp;&nbsp;THÔNG TIN CHI TIẾT</p><p>Xem thêm:&nbsp;</p><p>THỰC PHẨM SẠCH LÀ GÌ?</p><p>RAU HỮU CƠ TẠI NAM AN MARKET</p><p>CÁCH PHÂN BIỆT RAU SẠCH HỮU CƠ VỚI RAU THƯỜNG</p><p>ACO - CHỨNG NHẬN HỮU CƠ HÀNG ĐẦU CỦA ÚC</p>', 1, 2, 0),
(4, 'Lê Nam Phi ', 134900, '20241209021223.jpg', 60000, 1, 0, '2024-11-18 17:52:16', '<p><strong>SKU:</strong>290001911000</p><p>Kích cỡ: 200G-250G/trái</p><p>Khu vực giao hàng: Chỉ TP.HCM</p>', '<p>&nbsp;&nbsp;Mô tả chung: LÊ NAM PHI</p><p>Lê Nam Phi có vị ngọt dịu, rất giòn và thơm, ngon hơn khi ăn lạnh vào thời tiết nóng bức, được người tiêu dùng trên toàn thế giới ưa chuộng, xuất nhiều nhất sang châu Âu thị trường cực kỳ khó tính về chất lượng và an toàn thực phẩm.</p><p>&nbsp;</p><p>&nbsp;&nbsp;Thông tin chi tiết</p><p><span style=\"color:rgb(0,100,0);\"><strong>Đặc điểm</strong></span></p><p>Vỏ màu xanh xen lẫn màu vàng có vệt đỏ&nbsp;rực rỡ&nbsp;khi quả chín.&nbsp;Quả&nbsp;hình chuông&nbsp;nhỏ, tròn và&nbsp;thon đều, bên trong thịt trắng với hương vị thơm&nbsp;mát, ngọt nhẹ.</p><p>Lê&nbsp;Forelle Nam Phi&nbsp;không được khuyến khích để nướng hoặc nấu ăn. Chỉ nên ăn tươi kèm pho mat.&nbsp;Các màu sắc độc đáo của lê&nbsp;Forelle sẽ&nbsp;tuyệt vời trong những món ăn salad.</p><p><span style=\"color:rgb(0,100,0);\"><strong>Công dụng</strong></span></p><p>Lê Nam Phi&nbsp;có nhiều chất xơ nên rất tốt cho sức khỏe&nbsp;giảm cholesterol trong cơ thể, ngăn ngừa các bệnh ung thư và tim mạch</p><p>Có nguồn Vitamin C tốt&nbsp;tăng cường hệ miễn dịch cho cơ thể đồng thời tham gia sản xuất nhiều tế bào hồng cầu, tạo nhiều máu đỏ</p><p>Hàm lượng Vitamen E cũng tốt rất tốt cho da</p><p>Hàm lượng Kali cao (50mg trong 100g)&nbsp;</p><p>Ít chất béo và Calo phù hợp với những người đang trong chế độ giảm cân</p><p>Đặc biệt, thường xuyên ăn&nbsp;lê nam phi&nbsp;sẽ tăng được khả năng phòng chống chứng hay mệt, đồng thời tăng khả năng phòng chống được bệnh tăng huyết áp, sung đau họng.</p><p><span style=\"color:rgb(0,100,0);\"><strong>Bảo quản</strong></span></p><p>Lê Nam Phi&nbsp;bảo quản tốt nhất ở nhiệt độ từ 0oC đến 4oC , để ở nhiệt độ thường 25oC Lê sẽ chín sau 1 đến 3 ngày. Vỏ lê rất dễ bị bầm dập, nên quý khách cần nhẹ tay, tránh làm rơi, va đập để giữ quả lê được đẹp.</p><p>Xem thêm:&nbsp;</p><p>THỰC PHẨM SẠCH LÀ GÌ?</p><p>RAU HỮU CƠ TẠI NAM AN MARKET</p><p>CÁCH PHÂN BIỆT RAU SẠCH HỮU CƠ VỚI RAU THƯỜNG</p><p>ACO - CHỨNG NHẬN HỮU CƠ HÀNG ĐẦU CỦA ÚC</p><p>Những loại&nbsp;trái cây tươi Nam An Market&nbsp;đang cung cấp</p>', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `phone`, `avatar`, `status`, `role`) VALUES
(5, 'nguyenvanday', 'thinhptpc088854@gmail.com', '$2y$10$29qQgrNiaW1m.Yw80rUjjuvpJeMnyVQ5X3B7M1eTh7Io0GE8r/LfS', '', '', '20241203021238.png', 1, 1),
(6, 'admin1', 'DayNVPC08855@gmail.com', '$2y$10$PaL/k9LiUm7U2hd8lcMORe5D1odvk05OMZr5RRuxQ91YPHtWcXL0m', NULL, NULL, NULL, 1, 1),
(7, 'thinh', 'thinhnppc08854@gmail.com', '$2y$10$eCqcZCn5NNXs16befMkOP.zg5po0YyEIzC.Fo8pVm1.luPn/.fUSa', NULL, NULL, NULL, 1, 1),
(8, 'tram', 'tram@gmail.com', '$2y$10$UCTh.BbVzqEZ8QNhA9v5NOsoLcgfOeCQEWzsLAq/VFuPO7PvDkksW', NULL, NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
