-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jun 2020 pada 07.42
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi_clara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpersediaan`
--

CREATE TABLE `detailpersediaan` (
  `id` int(11) NOT NULL,
  `fk_persediaan` int(11) NOT NULL,
  `fk_produk` int(11) NOT NULL,
  `jumlah` int(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpersediaan`
--

INSERT INTO `detailpersediaan` (`id`, `fk_persediaan`, `fk_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 5, 10),
(4, 3, 5, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `id` int(11) NOT NULL,
  `fk_transaksi` int(11) NOT NULL,
  `fk_produk` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`id`, `fk_transaksi`, `fk_produk`, `jumlah`) VALUES
(1215, 142, 4, 122),
(1216, 142, 1, 15),
(1217, 142, 7, 14),
(1218, 142, 9, 14),
(1219, 142, 12, 13),
(1220, 142, 8, 26),
(1221, 142, 10, 12),
(1222, 142, 13, 12),
(1223, 142, 5, 8),
(1224, 142, 6, 120),
(1225, 142, 11, 120),
(1226, 143, 4, 74),
(1227, 143, 1, 14),
(1228, 143, 7, 13),
(1229, 143, 9, 13),
(1230, 143, 12, 12),
(1231, 143, 8, 25),
(1232, 143, 10, 13),
(1233, 143, 13, 13),
(1234, 143, 5, 11),
(1235, 143, 6, 73),
(1236, 143, 11, 73),
(1237, 144, 4, 76),
(1238, 144, 1, 17),
(1239, 144, 7, 16),
(1240, 144, 9, 17),
(1241, 144, 12, 16),
(1242, 144, 8, 32),
(1243, 144, 10, 15),
(1244, 144, 13, 15),
(1245, 144, 5, 13),
(1246, 144, 6, 77),
(1247, 144, 11, 90),
(1248, 145, 4, 86),
(1249, 145, 1, 13),
(1250, 145, 7, 12),
(1251, 145, 9, 12),
(1252, 145, 12, 12),
(1253, 145, 8, 24),
(1254, 145, 10, 10),
(1255, 145, 13, 10),
(1256, 145, 5, 12),
(1257, 145, 6, 89),
(1258, 145, 11, 98),
(1259, 146, 4, 203),
(1260, 146, 1, 10),
(1261, 146, 7, 9),
(1262, 146, 9, 9),
(1263, 146, 12, 9),
(1264, 146, 8, 20),
(1265, 146, 10, 11),
(1266, 146, 13, 10),
(1267, 146, 5, 7),
(1268, 146, 6, 200),
(1269, 146, 11, 200),
(1270, 147, 4, 187),
(1271, 147, 1, 11),
(1272, 147, 7, 11),
(1273, 147, 9, 11),
(1274, 147, 12, 10),
(1275, 147, 8, 19),
(1276, 147, 10, 10),
(1277, 147, 13, 10),
(1278, 147, 5, 10),
(1279, 147, 6, 185),
(1280, 147, 11, 185),
(1281, 148, 4, 90),
(1282, 148, 1, 12),
(1283, 148, 7, 12),
(1284, 148, 9, 12),
(1285, 148, 12, 12),
(1286, 148, 8, 24),
(1287, 148, 10, 12),
(1288, 148, 13, 12),
(1289, 148, 5, 12),
(1290, 148, 6, 95),
(1291, 148, 11, 90),
(1292, 149, 4, 156),
(1293, 149, 1, 18),
(1294, 149, 7, 17),
(1295, 149, 9, 17),
(1296, 149, 12, 16),
(1297, 149, 8, 32),
(1298, 149, 10, 16),
(1299, 149, 13, 16),
(1300, 149, 5, 14),
(1301, 149, 6, 146),
(1302, 149, 11, 146),
(1303, 150, 4, 84),
(1304, 150, 1, 19),
(1305, 150, 7, 18),
(1306, 150, 12, 19),
(1307, 150, 8, 34),
(1308, 150, 10, 17),
(1309, 150, 13, 16),
(1310, 150, 5, 15),
(1311, 150, 6, 85),
(1312, 150, 11, 91),
(1313, 151, 4, 172),
(1314, 151, 1, 19),
(1315, 151, 7, 17),
(1316, 151, 9, 18),
(1317, 151, 12, 17),
(1318, 151, 8, 35),
(1319, 151, 10, 18),
(1320, 151, 13, 17),
(1321, 151, 5, 16),
(1322, 151, 6, 171),
(1323, 151, 11, 171),
(1324, 152, 4, 118),
(1325, 152, 1, 12),
(1326, 152, 7, 12),
(1327, 152, 9, 13),
(1328, 152, 12, 12),
(1329, 152, 8, 25),
(1330, 152, 10, 13),
(1331, 152, 13, 12),
(1332, 152, 5, 11),
(1333, 152, 6, 115),
(1334, 152, 11, 117),
(1335, 153, 4, 120),
(1336, 153, 1, 8),
(1337, 153, 7, 7),
(1338, 153, 9, 8),
(1339, 153, 12, 7),
(1340, 153, 8, 15),
(1341, 153, 10, 8),
(1342, 153, 13, 7),
(1343, 153, 5, 10),
(1344, 153, 6, 126),
(1345, 153, 11, 100),
(1346, 154, 4, 176),
(1347, 154, 1, 14),
(1348, 154, 7, 13),
(1349, 154, 12, 12),
(1350, 154, 9, 13),
(1351, 154, 8, 24),
(1352, 154, 10, 11),
(1353, 154, 13, 10),
(1354, 154, 5, 9),
(1355, 154, 6, 175),
(1356, 154, 11, 175),
(1357, 155, 4, 65),
(1358, 155, 1, 12),
(1359, 155, 7, 12),
(1360, 155, 12, 11),
(1361, 155, 9, 12),
(1362, 155, 8, 23),
(1363, 155, 10, 13),
(1364, 155, 13, 12),
(1365, 155, 5, 10),
(1366, 155, 6, 70),
(1367, 155, 11, 70),
(1368, 156, 4, 55),
(1369, 156, 1, 16),
(1370, 156, 7, 16),
(1371, 156, 9, 15),
(1372, 156, 12, 15),
(1373, 156, 8, 29),
(1374, 156, 10, 16),
(1375, 156, 13, 15),
(1376, 156, 5, 12),
(1377, 156, 6, 60),
(1378, 156, 11, 60),
(1379, 157, 4, 154),
(1380, 157, 1, 11),
(1381, 157, 7, 10),
(1382, 157, 9, 12),
(1383, 157, 12, 12),
(1384, 157, 8, 23),
(1385, 157, 10, 10),
(1386, 157, 13, 10),
(1387, 157, 5, 14),
(1388, 157, 6, 152),
(1389, 157, 11, 150),
(1390, 158, 4, 97),
(1391, 158, 1, 9),
(1392, 158, 7, 8),
(1393, 158, 9, 9),
(1394, 158, 12, 9),
(1395, 158, 8, 17),
(1396, 158, 10, 9),
(1397, 158, 13, 8),
(1398, 158, 5, 8),
(1399, 158, 6, 99),
(1400, 158, 11, 99),
(1401, 159, 4, 113),
(1402, 159, 1, 10),
(1403, 159, 7, 10),
(1404, 159, 9, 10),
(1405, 159, 12, 9),
(1406, 159, 8, 19),
(1407, 159, 10, 9),
(1408, 159, 13, 9),
(1409, 159, 5, 11),
(1410, 159, 6, 115),
(1411, 159, 11, 115),
(1412, 160, 4, 115),
(1413, 160, 1, 12),
(1414, 160, 7, 11),
(1415, 160, 9, 10),
(1416, 160, 12, 10),
(1417, 160, 8, 21),
(1418, 160, 10, 11),
(1419, 160, 13, 11),
(1420, 160, 5, 12),
(1421, 160, 6, 116),
(1422, 160, 11, 117),
(1423, 161, 4, 95),
(1424, 161, 1, 17),
(1425, 161, 7, 16),
(1426, 161, 9, 16),
(1427, 161, 12, 16),
(1428, 161, 8, 32),
(1429, 161, 10, 16),
(1430, 161, 13, 16),
(1431, 161, 5, 13),
(1432, 161, 6, 90),
(1433, 161, 11, 90),
(1434, 162, 4, 177),
(1435, 162, 1, 18),
(1436, 162, 7, 17),
(1437, 162, 9, 17),
(1438, 162, 12, 18),
(1439, 162, 8, 35),
(1440, 162, 10, 17),
(1441, 162, 13, 33),
(1442, 162, 5, 10),
(1443, 162, 6, 165),
(1444, 162, 11, 177),
(1445, 163, 4, 123),
(1446, 163, 1, 16),
(1447, 163, 7, 16),
(1448, 163, 9, 17),
(1449, 163, 12, 16),
(1450, 163, 8, 30),
(1451, 163, 10, 14),
(1452, 163, 13, 16),
(1453, 163, 5, 16),
(1454, 163, 6, 124),
(1455, 163, 11, 124),
(1456, 164, 4, 96),
(1457, 164, 1, 11),
(1458, 164, 7, 11),
(1459, 164, 9, 11),
(1460, 164, 12, 11),
(1461, 164, 8, 20),
(1462, 164, 10, 10),
(1463, 164, 13, 10),
(1464, 164, 5, 10),
(1465, 164, 6, 92),
(1466, 164, 11, 92),
(1467, 165, 4, 54),
(1468, 165, 1, 7),
(1469, 165, 7, 6),
(1470, 165, 9, 7),
(1471, 165, 12, 6),
(1472, 165, 8, 13),
(1473, 165, 10, 7),
(1474, 165, 13, 6),
(1475, 165, 5, 7),
(1476, 165, 6, 21),
(1477, 165, 11, 67),
(1478, 166, 4, 131),
(1479, 166, 1, 13),
(1480, 166, 7, 12),
(1481, 166, 9, 11),
(1482, 166, 12, 11),
(1483, 166, 8, 21),
(1484, 166, 10, 10),
(1485, 166, 13, 10),
(1486, 166, 5, 10),
(1487, 166, 6, 129),
(1488, 166, 11, 129),
(1489, 167, 4, 79),
(1490, 167, 1, 11),
(1491, 167, 7, 10),
(1492, 167, 9, 11),
(1493, 167, 12, 10),
(1494, 167, 8, 22),
(1495, 167, 10, 11),
(1496, 167, 13, 11),
(1497, 167, 5, 8),
(1498, 167, 6, 80),
(1499, 167, 11, 75),
(1500, 168, 4, 77),
(1501, 168, 1, 15),
(1502, 168, 7, 15),
(1503, 168, 9, 16),
(1504, 168, 12, 15),
(1505, 168, 8, 31),
(1506, 168, 10, 13),
(1507, 168, 13, 12),
(1508, 168, 5, 9),
(1509, 168, 6, 62),
(1510, 168, 11, 62),
(1511, 169, 4, 73),
(1512, 169, 1, 10),
(1513, 169, 7, 9),
(1514, 169, 9, 9),
(1515, 169, 12, 9),
(1516, 169, 8, 18),
(1517, 169, 10, 9),
(1518, 169, 13, 9),
(1519, 169, 5, 11),
(1520, 169, 6, 71),
(1521, 169, 11, 71),
(1522, 170, 4, 68),
(1523, 170, 1, 8),
(1524, 170, 7, 7),
(1525, 170, 9, 8),
(1526, 170, 12, 8),
(1527, 170, 8, 17),
(1528, 170, 10, 5),
(1529, 170, 13, 5),
(1530, 170, 5, 7),
(1531, 170, 6, 66),
(1532, 170, 11, 66),
(1533, 171, 4, 112),
(1534, 171, 1, 10),
(1535, 171, 7, 9),
(1536, 171, 9, 8),
(1537, 171, 12, 9),
(1538, 171, 8, 19),
(1539, 171, 10, 10),
(1540, 171, 13, 9),
(1541, 171, 5, 10),
(1542, 171, 6, 110),
(1543, 171, 11, 76),
(1544, 172, 4, 94),
(1545, 172, 1, 11),
(1546, 172, 7, 11),
(1547, 172, 9, 8),
(1548, 172, 12, 9),
(1549, 172, 8, 21),
(1550, 172, 10, 11),
(1551, 172, 13, 10),
(1552, 172, 5, 11),
(1553, 172, 6, 95),
(1554, 172, 11, 100),
(1555, 173, 4, 90),
(1556, 173, 1, 16),
(1557, 173, 7, 15),
(1558, 173, 9, 16),
(1559, 173, 12, 15),
(1560, 173, 8, 20),
(1561, 173, 10, 10),
(1562, 173, 13, 10),
(1563, 173, 5, 13),
(1564, 173, 6, 92),
(1565, 173, 11, 92),
(1566, 174, 4, 146),
(1567, 174, 1, 16),
(1568, 174, 7, 16),
(1569, 174, 9, 15),
(1570, 174, 12, 14),
(1571, 174, 8, 29),
(1572, 174, 10, 12),
(1573, 174, 13, 11),
(1574, 174, 5, 12),
(1575, 174, 6, 135),
(1576, 174, 11, 145),
(1577, 175, 4, 127),
(1578, 175, 1, 15),
(1579, 175, 7, 15),
(1580, 175, 9, 14),
(1581, 175, 12, 13),
(1582, 175, 8, 28),
(1583, 175, 10, 14),
(1584, 175, 13, 14),
(1585, 175, 5, 14),
(1586, 175, 6, 128),
(1587, 175, 11, 110),
(1588, 176, 4, 83),
(1589, 176, 1, 9),
(1590, 176, 7, 9),
(1591, 176, 9, 9),
(1592, 176, 12, 9),
(1593, 176, 8, 21),
(1594, 176, 10, 11),
(1595, 176, 13, 10),
(1596, 176, 5, 9),
(1597, 176, 6, 92),
(1598, 176, 11, 92),
(1599, 177, 4, 30),
(1600, 177, 1, 5),
(1601, 177, 7, 5),
(1602, 177, 9, 6),
(1603, 177, 12, 6),
(1604, 177, 8, 12),
(1605, 177, 10, 10),
(1606, 177, 13, 10),
(1607, 177, 5, 6),
(1608, 177, 6, 35),
(1609, 177, 11, 89);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan_transaksi`
--

CREATE TABLE `peramalan_transaksi` (
  `id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `error` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peramalan_transaksi`
--

INSERT INTO `peramalan_transaksi` (`id`, `tahun`, `bulan`, `nilai`, `error`) VALUES
(1, 2018, 2, 69, NULL),
(2, 2018, 3, 59, NULL),
(3, 2018, 4, 159, NULL),
(4, 2018, 5, 99, NULL),
(5, 2018, 6, 109, NULL),
(6, 2018, 7, 119, NULL),
(7, 2018, 8, 99, NULL),
(8, 2018, 9, 179, NULL),
(9, 2018, 10, 119, NULL),
(10, 2018, 11, 99, NULL),
(11, 2019, 2, 6, NULL),
(12, 2019, 3, 6, NULL),
(13, 2019, 4, 6, NULL),
(14, 2019, 5, 6, NULL),
(15, 2019, 6, 6, NULL),
(16, 2019, 7, 6, NULL),
(17, 2019, 8, 6, NULL),
(18, 2019, 9, 6, NULL),
(19, 2019, 10, 6, NULL),
(20, 2019, 11, 6, NULL),
(21, 2019, 2, 205, NULL),
(22, 2019, 3, 125, NULL),
(23, 2019, 4, 515, NULL),
(24, 2019, 5, 535, NULL),
(25, 2019, 6, 405, NULL),
(26, 2019, 8, 585, NULL),
(27, 2019, 9, 275, NULL),
(28, 2019, 10, 525, NULL),
(29, 2019, 2, 205, NULL),
(30, 2019, 3, 125, NULL),
(31, 2019, 4, 515, NULL),
(32, 2019, 5, 535, NULL),
(33, 2019, 6, 405, NULL),
(34, 2019, 8, 585, NULL),
(35, 2019, 9, 275, NULL),
(36, 2019, 10, 525, NULL),
(37, 2019, 2, 205, NULL),
(38, 2019, 3, 125, NULL),
(39, 2019, 4, 515, NULL),
(40, 2019, 5, 535, NULL),
(41, 2019, 6, 405, NULL),
(42, 2019, 8, 585, NULL),
(43, 2019, 9, 275, NULL),
(44, 2019, 10, 525, NULL),
(45, 2019, 2, 205, NULL),
(46, 2019, 3, 125, NULL),
(47, 2019, 4, 515, NULL),
(48, 2019, 5, 535, NULL),
(49, 2019, 6, 405, NULL),
(50, 2019, 8, 585, NULL),
(51, 2019, 9, 275, NULL),
(52, 2019, 10, 525, NULL),
(53, 2019, 2, 205, NULL),
(54, 2019, 3, 125, NULL),
(55, 2019, 4, 515, NULL),
(56, 2019, 5, 535, NULL),
(57, 2019, 6, 405, NULL),
(58, 2019, 8, 585, NULL),
(59, 2019, 9, 275, NULL),
(60, 2019, 10, 525, NULL),
(61, 2019, 11, 405, NULL),
(62, 2019, 2, 205, NULL),
(63, 2019, 3, 125, NULL),
(64, 2019, 4, 515, NULL),
(65, 2019, 5, 535, NULL),
(66, 2019, 6, 405, NULL),
(67, 2019, 8, 585, NULL),
(68, 2019, 9, 275, NULL),
(69, 2019, 10, 525, NULL),
(70, 2019, 11, 405, NULL),
(71, 2019, 12, 325, NULL),
(72, 2019, 2, 205, NULL),
(73, 2019, 3, 125, NULL),
(74, 2019, 4, 515, NULL),
(75, 2019, 5, 535, NULL),
(76, 2019, 6, 405, NULL),
(77, 2019, 8, 585, NULL),
(78, 2019, 9, 275, NULL),
(79, 2019, 10, 525, NULL),
(80, 2019, 11, 405, NULL),
(81, 2019, 12, 325, NULL),
(82, 2019, 2, 205, NULL),
(83, 2019, 3, 125, NULL),
(84, 2019, 4, 515, NULL),
(85, 2019, 5, 535, NULL),
(86, 2019, 6, 405, NULL),
(87, 2019, 8, 585, NULL),
(88, 2019, 9, 275, NULL),
(89, 2019, 10, 525, NULL),
(90, 2019, 2, 205, NULL),
(91, 2019, 3, 125, NULL),
(92, 2019, 4, 515, NULL),
(93, 2019, 5, 535, NULL),
(94, 2019, 6, 405, NULL),
(95, 2019, 8, 585, NULL),
(96, 2019, 9, 275, NULL),
(97, 2019, 10, 525, NULL),
(98, 2019, 11, 405, NULL),
(99, 2019, 2, 205, NULL),
(100, 2019, 3, 125, NULL),
(101, 2019, 4, 515, NULL),
(102, 2019, 5, 535, NULL),
(103, 2019, 6, 405, NULL),
(104, 2019, 7, 595, NULL),
(105, 2019, 8, 585, NULL),
(106, 2019, 9, 275, NULL),
(107, 2019, 10, 525, NULL),
(108, 2019, 11, 405, NULL),
(109, 2019, 12, 325, NULL),
(110, 2019, 2, 125, NULL),
(111, 2019, 3, 125, NULL),
(112, 2019, 4, 125, NULL),
(113, 2019, 5, 125, NULL),
(114, 2019, 6, 125, NULL),
(115, 2019, 7, 595, NULL),
(116, 2019, 8, 125, NULL),
(117, 2019, 9, 125, NULL),
(118, 2019, 10, 125, NULL),
(119, 2019, 11, 125, NULL),
(120, 2019, 12, 125, NULL),
(121, 2019, 2, 205, NULL),
(122, 2019, 3, 125, NULL),
(123, 2019, 4, 515, NULL),
(124, 2019, 5, 535, NULL),
(125, 2019, 6, 405, NULL),
(126, 2019, 7, 595, NULL),
(127, 2019, 8, 585, NULL),
(128, 2019, 9, 275, NULL),
(129, 2019, 10, 525, NULL),
(130, 2019, 11, 405, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan`
--

CREATE TABLE `persediaan` (
  `id` int(11) NOT NULL,
  `tgl` datetime(6) NOT NULL,
  `nomer` varchar(150) NOT NULL,
  `supplier` varchar(32) NOT NULL,
  `fk_user_karyawan` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persediaan`
--

INSERT INTO `persediaan` (`id`, `tgl`, `nomer`, `supplier`, `fk_user_karyawan`, `harga`) VALUES
(1, '2020-03-04 00:00:00.000000', '123', '', 3, 12000),
(2, '2020-04-16 00:00:00.000000', '', '', 3, 1250000),
(3, '2020-04-22 00:00:00.000000', 'PRS-220420-0001', 'Supplier', 3, 2323232);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `c_produk` varchar(50) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `c_produk`, `merk`, `tipe`, `harga`, `stok`, `gambar`) VALUES
(1, 'luxerrGas', 'Luxerr', 'gas', 1975000, 7, '6d2e541f41031e44c131ce12b02884a9.png'),
(4, 'niko', 'Niko', 'gas', 650000, 10, 'ed31b2a0709223f99be1480a38bd6043.png'),
(5, 'Paloma', 'Paloma', 'Gas', 2600000, 20, 'c1f851fc1fd224f5d470c755558396cc.png'),
(6, 'Kran', 'Kran', 'Panas Dingin', 295000, 0, 'd922c8bd7caa71f0379774a8cd5c4cab.png'),
(7, 'luxerrListrik', 'Luxerr', 'Listrik', 3850000, 0, 'd7a99afb053d8c21bc088fc0b2a04e00.jpg'),
(8, 'Wasser', 'Wasser', 'Gas', 1450000, 0, '801574c69afb668661b4c6df947737a4.png'),
(9, 'modenaGas', 'Modena', 'gas', 1200000, 0, '7128dc2e3c1a4b84e35770409c92b346.png'),
(10, 'RinnaiGas', 'Rinnai', 'Gas', 1480000, 0, '4de43b4b8d77e0c9b02ff1292d08292a.jpg'),
(11, 'Shower', 'Shower', 'Peralatan Kamar mandi', 125000, 0, '6fcc2b65311f448a0d9c70af2f9f4737.jpg'),
(12, 'modenaListrik', 'Modena', 'Listrik', 1800000, 0, 'b5d4a92209dc4ad7ebd9c21a2cdc4b25.jpg'),
(13, 'RinnaiListrik', 'Rinnai', 'Listrik', 1600000, 0, '9e92d0a2d1194db2ceac4819b574d38d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tgl` datetime(6) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `customer` varchar(32) NOT NULL,
  `fk_user_karyawan` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tgl`, `nomer`, `customer`, `fk_user_karyawan`, `harga`) VALUES
(142, '2017-01-01 00:00:00.000000', '25', 'Aldhan', 12, 348885000),
(143, '2017-02-01 00:00:00.000000', '26', 'Aldhan', 12, 298550000),
(144, '2017-03-01 00:00:00.000000', '27', 'Aldhan', 12, 354140000),
(145, '2017-04-01 00:00:00.000000', '28', 'Aldhan', 12, 299080000),
(146, '2017-05-01 00:00:00.000000', '29', 'Aldhan', 12, 376830000),
(147, '2017-06-01 00:00:00.000000', '30', 'Aldhan', 12, 378875000),
(148, '2017-07-01 00:00:00.000000', '31', 'Aldhan', 12, 306635000),
(149, '2017-08-01 00:00:00.000000', '32', 'Aldhan', 12, 445000000),
(150, '2017-09-01 00:00:00.000000', '33', 'Aldhan', 12, 393935000),
(151, '2017-10-01 00:00:00.000000', '34', 'Aldhan', 12, 484985000),
(152, '2017-11-01 00:00:00.000000', '35', 'Aldhan', 12, 335640000),
(153, '2017-12-01 00:00:00.000000', '36', 'Aldhan', 12, 263410000),
(154, '2018-01-01 00:00:00.000000', '37', 'Aldhan', 12, 393880000),
(155, '2018-02-01 00:00:00.000000', '38', 'Aldhan', 12, 274140000),
(156, '2018-03-01 00:00:00.000000', '39', 'Aldhan', 12, 320080000),
(157, '2018-04-01 00:00:00.000000', '40', 'Aldhan', 12, 360465000),
(158, '2018-05-01 00:00:00.000000', '41', 'Aldhan', 12, 251775000),
(159, '2018-06-01 00:00:00.000000', '42', 'Aldhan', 12, 292070000),
(160, '2018-07-01 00:00:00.000000', '43', 'Aldhan', 12, 315175000),
(161, '2018-08-01 00:00:00.000000', '44', 'Aldhan', 12, 372205000),
(162, '2018-09-01 00:00:00.000000', '45', 'Aldhan', 12, 494360000),
(163, '2018-10-01 00:00:00.000000', '46', 'Aldhan', 12, 405850000),
(164, '2018-11-01 00:00:00.000000', '47', 'Aldhan', 12, 283915000),
(165, '2018-12-01 00:00:00.000000', '48', 'Aldhan', 12, 162805000),
(166, '2019-01-01 00:00:00.000000', '49', 'Aldhan', 12, 331455000),
(167, '2019-02-01 00:00:00.000000', '50', 'Aldhan', 12, 262330000),
(168, '2019-03-01 00:00:00.000000', '51', 'Aldhan', 12, 316455000),
(169, '2019-04-01 00:00:00.000000', '52', 'Aldhan', 12, 241090000),
(170, '2019-05-01 00:00:00.000000', '53', 'Aldhan', 12, 196920000),
(171, '2019-06-01 00:00:00.000000', '54', 'Aldhan', 12, 277700000),
(172, '2019-07-01 00:00:00.000000', '55', 'Aldhan', 12, 282830000),
(173, '2019-08-01 00:00:00.000000', '56', 'Aldhan', 12, 326290000),
(174, '2019-09-01 00:00:00.000000', '57', 'Aldhan', 12, 397860000),
(175, '2019-10-01 00:00:00.000000', '58', 'Aldhan', 12, 377855000),
(176, '2019-11-01 00:00:00.000000', '59', 'Aldhan', 12, 258145000),
(177, '2019-12-01 00:00:00.000000', '60', 'Aldhan', 12, 151875000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telepon` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `telepon`, `username`, `password`, `level`, `gambar`) VALUES
(3, 'aldhanbiuzar', '', '', 'aldhanbiuzar', '0aa8fedeba30a3b9a5d7ebf201f64bc4', 2, '86fce450b788f35ddb7fe3044d4c88f4.jpg'),
(10, 'ferdy', 'adsdn', '08098797979', 'qwertyuio', 'e86fdc2283aff4717103f2d44d0610f7', 3, 'default.png'),
(11, 'Ramadhana', 'Tidar', '089531026477', 'Ramadhana', 'e10adc3949ba59abbe56e057f20f883e', 3, 'd868502738545a810211b306daa90ee7.jpg'),
(12, 'admin', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'default.png'),
(13, 'imron', 'malang', '08989777', 'imronRozikin', 'f55c882496ad5f94f1f0fc6f47857f22', 2, 'default.png'),
(14, 'clara', 'malang', '08979898', 'claraclara123', '02e4c127b4fd4bfaf91e7ac8dd5302a3', 1, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpersediaan`
--
ALTER TABLE `detailpersediaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penyetokan_2` (`fk_persediaan`),
  ADD KEY `fk_produk_2` (`fk_produk`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penyetokan_2` (`fk_transaksi`),
  ADD KEY `fk_produk_2` (`fk_produk`);

--
-- Indexes for table `peramalan_transaksi`
--
ALTER TABLE `peramalan_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_karyawan` (`fk_user_karyawan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_produk` (`c_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_karyawan` (`fk_user_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpersediaan`
--
ALTER TABLE `detailpersediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1610;
--
-- AUTO_INCREMENT for table `peramalan_transaksi`
--
ALTER TABLE `peramalan_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpersediaan`
--
ALTER TABLE `detailpersediaan`
  ADD CONSTRAINT `detailpersediaan_ibfk_1` FOREIGN KEY (`fk_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `detailpersediaan_ibfk_2` FOREIGN KEY (`fk_persediaan`) REFERENCES `persediaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`fk_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`fk_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  ADD CONSTRAINT `persediaan_ibfk_2` FOREIGN KEY (`fk_user_karyawan`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
