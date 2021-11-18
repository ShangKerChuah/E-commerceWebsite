--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'RiceNoodle', 'product1', 'image/products/product1.jpg', 5.00),
(2, 'Bihun', 'product2', 'image/products/product2.jpg', 2.50),
(3, 'CellophaneNoodle', 'product3', 'image/products/product3.jpeg', 3.00),
(4, 'WheatVermicelli', 'product4', 'image/products/product4.jpg', 4.00),
(5, 'Noodle', 'product5', 'image/products/product5.jpg', 4.50);
--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;