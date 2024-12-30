-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3346
-- Waktu pembuatan: 30 Des 2024 pada 05.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_amikomsehat_091`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `alamatPel` ()   BEGIN  
    DECLARE nama_Pasien VARCHAR(50);  
    DECLARE exit_loop BOOLEAN DEFAULT FALSE;  
    DECLARE cursor1 CURSOR FOR  
        SELECT namaPasien  
        FROM tbPasien  
        WHERE alamatPasien = 'purwokerto';  
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop = TRUE;  

    OPEN cursor1;  

    ulang: LOOP  
        FETCH cursor1 INTO nama_Pasien;  
        
        IF exit_loop THEN  
            LEAVE ulang;  
        END IF;  

        SELECT nama_Pasien AS 'Nama Pasien yang berasal dari purwokerto'; 
    END LOOP ulang;  

    CLOSE cursor1;  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cariPasien` (`id` VARCHAR(10))   begin
 declare nama_Pasien varchar (50);
 declare cursor1 cursor for
	select namaPasien
	from tbPasien
	where idPasien = id;
	 declare exit handler for 1329
	 begin
	select concat('data pasien ' ,id,' tidak ditemukan') as message;
	 end;

open cursor1;
fetch cursor1 into nama_pasien;
	select nama_pasien;
close cursor1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ganjil` (IN `batas` INT)   begin
	declare i int;
	declare hasil varchar (255) default '';
	set i = 1;
	while i < batas do
		if MOD(i,2) != 0 then
		set hasil = concat(hasil, i , ' ');
		end if;
		set i = i + 1;
	end while;
	set hasil = concat(hasil, ' - 24SA11A091 - RIFKI SAPUTRA');
	select hasil;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hargaObat` ()   begin
 declare nama varchar(50);
 declare exit_loop boolean default false;
 declare c1 cursor for
	select namaObat
	from tbObat
	where  harga < 100000;
 declare continue handler for not found set exit_loop = true;
 declare exit handler for 1329
	begin
	 select concat('data obat tidak ditemukan') as pesan;
	end;

open c1;
lbl: loop
	fetch c1 into nama;
	select namaObat as 'daftar obat dengan harga > 100000'
	from tbObat
	where harga > 100000;
	
	if exit_loop then
		close c1;
		leave lbl;
	end if;
end loop lbl;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nambahPasien` (IN `idpasien` VARCHAR(10), IN `namaPasien` VARCHAR(50), IN `alamatPasien` VARCHAR(255), IN `telephonPasien` VARCHAR(12))   begin 
	insert into tbPasien values (
	idPasien,
	namaPasien,
	tanggalLahirPasien,
	alamatPasien,
	telephonePasien
	);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ngapusDataDokter` (IN `idDokter` VARCHAR(10))   begin
delete from tbDokter where idDokter = idDokter;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ngitungDIskon` (IN `totalBelanja` DECIMAL(10,2))   begin
	declare diskon float;
	declare jumlahDiskon int;
	declare totalPembayaran int;
	
	if totalBelanja < 100000 then
		set diskon = 0;
	elseif totalBelanja >= 100000 and totalBelanja < 250000 then
		set diskon = 0.05;
	elseif totalBelanja >= 250000 and totalBelanja < 500000 then
		set diskon = 0.10;
	end if;
	
	set jumlahDiskon = totalBelanja * diskon;
	set totalPembayaran = totalBelanja - jumlahDiskon;
	
	select concat('Jumlah diskon: ', jumlahdiskon) AS Jumlah_DISKON,
		concat ('total bayar setelah diskon: ', totalPembayaran) as totalBayar;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ngitungpasien` ()   begin
declare Alamat varchar(50);
declare ngitung int(10) unsigned;
declare jumlahPasien cursor for
	select alamatPasien,
	count(*)
	from tbPasien
	group by alamatPasien;
open jumlahPasien;

fetch jumlahPasien into ngitung, Alamat;

select alamatPasien,
	count(*) as 'Jumlah Pasien'
	from tbPasien
	group by alamatPasien;
close jumlahPasien;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `soal2` (IN `batas` INT)   begin
	declare i int;
	declare hasil varchar(20) default '';
	set i = 1;
	repeat
	  set i = i * 2;
	  SET hasil  = concat(hasil, i, ' ');
	  if i > 7 then
		set i = 1;
		set hasil = concat(hasil, i, ' ');
	  end if;
	  until i > batas
	 end repeat;
	 select hasil;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `stok_Obat` ()   begin
 declare nama varchar(40);
 declare jumObat tinyint;
 declare exit_loop boolean;
 declare c1 cursor for
  select namaobat, jumlahObat
  from tbOBat
  order by jumlahObat;
 declare continue handler for not found set exit_loop = true;
open c1;
lbl: loop
 fetch c1 into nama,jumObat;
	select namaObat,jumlahObat as 'daftar 5 produk dengan stok terendah'
	from tbObat
	order by jumlahObat limit 5;
	if exit_loop then
		close c1;
		leave lbl;
	end if;
end loop lbl;
end$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cek` (`id` VARCHAR(250)) RETURNS VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  begin
		declare bayar int;
		select count(jumlahBayar) into bayar from tbPembayaran
			where idpemeriksaan=id;
		if (bayar >= 0) then
			return concat ("anda pernah membayar sebanyak ", bayar, " kali. - 24SA11A091 - RIFKI SAPUTRA");
		else
			return "anda belum pernah transaksi";
		end if;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `totalBayar` (`id` VARCHAR(20)) RETURNS VARCHAR(100) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE jumlahBayar INT;

    -- Menghitung jumlah transaksi (bukan total pembayaran)
    SELECT COUNT(idBayar) INTO jumlahBayar
    FROM tbPembayaran
    WHERE idpemeriksaan = id;

    -- Mengecek apakah jumlah transaksi lebih dari 50
    IF (jumlahBayar > 50) THEN
        RETURN CONCAT('Anda memiliki ', jumlahBayar, ' transaksi');
    ELSE
        RETURN 'Anda belum pernah transaksi';
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbadmin`
--

CREATE TABLE `tbadmin` (
  `idAdmin` varchar(10) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL,
  `usernameAdmin` varchar(255) NOT NULL,
  `passwordAdmin` varchar(255) NOT NULL,
  `alamatKaryawan` varchar(100) DEFAULT NULL,
  `teleponkaryawan` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbadmin`
--

INSERT INTO `tbadmin` (`idAdmin`, `namaAdmin`, `usernameAdmin`, `passwordAdmin`, `alamatKaryawan`, `teleponkaryawan`) VALUES
('adm001', 'Ripki ADmin', 'ripkianjay', 'anjayripki', NULL, NULL),
('ADM002', 'ajis ngangap', 'ajisngap', 'ngagapajis', 'anjkay ajis', '089312u4'),
('ADM003', 'kojar store', 'kojarlah', '$2y$10$JtwMBfSDTvMgdC4BEPxRJOjrMF8KmrAGvLFjJg49C9LuZUiOKP2ka', 'oaskdok', '02469123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdetailbayar`
--

CREATE TABLE `tbdetailbayar` (
  `idBayar` varchar(10) DEFAULT NULL,
  `idObat` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlahObat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbdetailbayar`
--

INSERT INTO `tbdetailbayar` (`idBayar`, `idObat`, `harga`, `jumlahObat`) VALUES
('BAYAR001', 'OBAT001', 50000, NULL),
('BAYAR001', 'OBAT002', 75000, NULL),
('BAYAR001', 'OBAT003', 150000, NULL),
('BAYAR004', 'OBAT004', 125000, NULL),
('BAYAR005', 'OBAT003', 150000, NULL),
('bayar003', 'obat001', 500000, NULL),
('bayar002', 'obat001', 250000, NULL),
('bayar001', 'obat002', 500000, NULL),
('bayar001', 'obat003', 5, 50000),
('bayar001', 'obat003', 50000, 5),
('bayar001', 'obat003', 50000, 5),
('bayar010', 'obat011', 250000, 5),
('bayar010', 'obat011', 250000, 5),
('bayar010', 'obat011', 250000, 5);

--
-- Trigger `tbdetailbayar`
--
DELIMITER $$
CREATE TRIGGER `trInsert` AFTER INSERT ON `tbdetailbayar` FOR EACH ROW begin
	update tbObat set jumlahObat = jumlahObat+new.jumlahObat
	where idObat=NEW.idOBat;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdokter`
--

CREATE TABLE `tbdokter` (
  `idDokter` varchar(10) NOT NULL,
  `namaDokter` varchar(40) DEFAULT NULL,
  `spesialisasi` varchar(20) DEFAULT NULL,
  `telephoneDokter` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbdokter`
--

INSERT INTO `tbdokter` (`idDokter`, `namaDokter`, `spesialisasi`, `telephoneDokter`) VALUES
('DOK001', 'HAJI NAIM', 'DOKTER PATAH TULANG', '082137070'),
('DOK002', 'IKI', 'PANAS DALAM', '08204'),
('DOK003', 'asep sembako', 'ahli gizi', '0713823'),
('DOK004', 'ali tulis', 'ahli anak', '803512'),
('DOK005', 'ajis gagap', 'gagap', '151110'),
('DOK006', 'sendy', 'ahli ibu dan anak', '25349087'),
('DOK007', 'mahatir', 'dokter gigi', '9930125'),
('DOK008', 'aji andri', 'dokter anak', '0895812930'),
('DOK009', 'haji bolot', 'dokter tulang', ''),
('DOK010', 'opi koumis', 'dokter syaraf', '082137070'),
('DOK011', 'TOMPI', 'AHLI BEDAH', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblog_obat`
--

CREATE TABLE `tblog_obat` (
  `idLog` int(11) NOT NULL,
  `idObat` varchar(10) DEFAULT NULL,
  `hargaLama` int(11) DEFAULT NULL,
  `hargaBaru` int(11) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblog_obat`
--

INSERT INTO `tblog_obat` (`idLog`, `idObat`, `hargaLama`, `hargaBaru`, `waktu`) VALUES
(1, 'OBAT010', 0, 300000, '2024-12-09 10:03:58'),
(2, 'OBAT003', 150000, 150000, '2024-12-09 10:26:01'),
(3, 'OBAT003', 150000, 150000, '2024-12-09 10:27:44'),
(4, 'OBAT003', 150000, 150000, '2024-12-09 10:28:02'),
(5, 'OBAT003', 150000, 150000, '2024-12-09 11:03:31'),
(6, 'OBAT010', 300000, 300000, '2024-12-09 11:12:50'),
(7, 'OBAT010', 300000, 3000000, '2024-12-09 11:13:08'),
(8, 'OBAT011', 75000, 75000, '2024-12-22 22:58:59'),
(9, 'OBAT010', 3000000, 3000000, '2024-12-22 22:59:02'),
(10, 'OBAT011', 75000, 75000, '2024-12-29 19:58:24'),
(11, 'OBAT010', 3000000, 3000000, '2024-12-29 19:58:24'),
(12, 'OBAT011', 75000, 75000, '2024-12-29 19:58:40'),
(13, 'OBAT010', 3000000, 3000000, '2024-12-29 19:58:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbobat`
--

CREATE TABLE `tbobat` (
  `idObat` varchar(10) NOT NULL,
  `namaObat` varchar(20) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tglExpired` date DEFAULT NULL,
  `jumlahObat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbobat`
--

INSERT INTO `tbobat` (`idObat`, `namaObat`, `satuan`, `harga`, `tglExpired`, `jumlahObat`) VALUES
('OBAT001', 'OBAT PANAS DALAM', 'TABLET', 50000, '2024-10-31', 5),
('OBAT002', 'OBAT SAKIT GIGI', 'KAPSUL', 75000, '2024-11-15', 2),
('OBAT003', 'PARACHETAMOL', 'BOTOL', 150000, '2024-12-25', 20),
('OBAT004', 'OBAT ANTI USUS BUNTU', 'TABLET', 125000, '2024-11-22', 6),
('OBAT005', 'OBAT ANTI PATAH TULA', 'TABLET', 150000, '2024-12-25', 7),
('OBAT006', '', '', 50000, '2024-10-31', 3),
('OBAT007', '', 'KAPSUL', 75000, '2024-11-15', 4),
('OBAT008', 'PARACHETAMOL', '', 150000, '2024-12-25', 8),
('OBAT009', '', 'TABLET', 125000, '0000-00-00', 2),
('OBAT010', 'OBAT ANTI PATAH TULA', '', 3000000, '2024-12-25', 0),
('OBAT011', 'TROCES MEJI', 'TABLET', 75000, '2025-02-20', 23),
('OBAT012', 'TROCES MEJI', 'TABLET', 75000, '2025-02-20', 8);

--
-- Trigger `tbobat`
--
DELIMITER $$
CREATE TRIGGER `delHapusObat` BEFORE DELETE ON `tbobat` FOR EACH ROW begin
	if old.idObat=old.idobat then
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'data obat tidak dapat diapus!';
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_updateHarga` AFTER UPDATE ON `tbobat` FOR EACH ROW begin
	insert into tbLog_Obat set idObat = old.idObat,
	hargaLama = old.harga,
	hargaBaru = new.harga,
	waktu = now();
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbobatt`
--

CREATE TABLE `tbobatt` (
  `idObatt` varchar(10) DEFAULT NULL,
  `namaObatt` varchar(255) DEFAULT NULL,
  `satuann` varchar(20) DEFAULT NULL,
  `hargaa` int(11) DEFAULT NULL,
  `tglExp` date DEFAULT NULL,
  `jumlahObatt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbobatt`
--

INSERT INTO `tbobatt` (`idObatt`, `namaObatt`, `satuann`, `hargaa`, `tglExp`, `jumlahObatt`) VALUES
('obt01', 'meiji', 'kapsul', 250000, '2025-05-05', 8),
('obt02', 'troces', 'kapsul', 270000, '2025-07-25', 5),
('obt03', 'antimo', 'botol', 50000, '2025-01-05', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpasien`
--

CREATE TABLE `tbpasien` (
  `idPasien` varchar(10) NOT NULL,
  `namaPasien` varchar(40) DEFAULT NULL,
  `tanggalLahirPasien` date DEFAULT NULL,
  `alamatPasien` varchar(100) DEFAULT NULL,
  `telephonePasien` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpasien`
--

INSERT INTO `tbpasien` (`idPasien`, `namaPasien`, `tanggalLahirPasien`, `alamatPasien`, `telephonePasien`) VALUES
('PAS001', 'RIFKI SAPUTRA', '2001-07-06', 'Tangerang', '08515912'),
('PAS002', 'Adikara Sitompul', '1999-07-06', 'jakarta', '085159126'),
('PAS003', 'KIKI SAPU', '1995-07-06', 'bekasi', '085159127'),
('PAS004', 'RIP SARA', '1996-07-06', 'purwokerto', '085159128'),
('PAS006', 'katak bizer', '2001-07-06', 'Tangerang', ''),
('PAS007', 'son of alex', '1999-07-06', '', '085159126'),
('PAS008', 'satria putra petir', '1995-07-06', 'bekasi', '085159127'),
('PAS009', 'asep manurung', '1996-07-06', '', '085159128'),
('PAS010', 'asep sembako', '2006-07-06', '', ''),
('pas011', 'Kurcaci bekas', NULL, 'jauh banget dah', NULL),
('pas012', 'aji makmur', '2000-09-09', 'jauhhh', '123123'),
('PAS013', 'anjay mabar', '2004-01-06', 'cukimay', '131231'),
('PAS014', 'anjay mabar', '2004-01-06', 'asdadasd', '12039351'),
('pas015', 'acenk pikri', '2002-10-20', 'Lampugn', '0821123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpembayaran`
--

CREATE TABLE `tbpembayaran` (
  `idBayar` varchar(10) NOT NULL,
  `idPemeriksaan` varchar(100) DEFAULT NULL,
  `tglBayar` date DEFAULT NULL,
  `jumlahBayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpembayaran`
--

INSERT INTO `tbpembayaran` (`idBayar`, `idPemeriksaan`, `tglBayar`, `jumlahBayar`) VALUES
('BAYAR001', 'PERIKSA001', '2024-10-10', 50000),
('BAYAR002', 'PERIKSA002', '2024-10-11', 75000),
('BAYAR003', 'PERIKSA003', '2024-10-11', 150000),
('BAYAR004', 'PERIKSA004', '2024-10-12', 125000),
('BAYAR005', 'PERIKSA005', '2024-10-13', 150000),
('bayar006', 'periksa003', '2024-10-25', 100000),
('bayar007', 'periksa005', '2024-10-25', 150000),
('bayar008', 'periksa004', '2024-10-26', 100000),
('bayar009', 'periksa002', '2024-10-26', 200000),
('bayar010', 'periksa002', '2024-10-26', 500000);

--
-- Trigger `tbpembayaran`
--
DELIMITER $$
CREATE TRIGGER `delHapusHarga` AFTER DELETE ON `tbpembayaran` FOR EACH ROW begin
	delete from tbPembayaran where idBayar=old.idBayar;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_cekbayar` BEFORE INSERT ON `tbpembayaran` FOR EACH ROW begin
	if new.jumlahBayar <= 1000 then
		signal sqlstate '45000' set message_text = 'cek kembali jumlah bayar anda!';
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_updatebayar` BEFORE UPDATE ON `tbpembayaran` FOR EACH ROW begin
	if new.jumlahBayar <= 1000 then
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'cek kembali nominal pembayaran anda!';
	end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpemeriksaan`
--

CREATE TABLE `tbpemeriksaan` (
  `idPemeriksaan` varchar(10) NOT NULL,
  `idPendaftaran` varchar(10) DEFAULT NULL,
  `diagnosa` varchar(100) DEFAULT NULL,
  `tindakan` varchar(100) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpemeriksaan`
--

INSERT INTO `tbpemeriksaan` (`idPemeriksaan`, `idPendaftaran`, `diagnosa`, `tindakan`, `biaya`) VALUES
('PERIKSA001', 'DAF001', 'PANAS DALEM DIA KURANG AIR PUTIH', 'PERLU MINUM AIR PUTIH DAN MINUM ADEM SARI', 50000),
('PERIKSA002', 'DAF002', 'GIGI NYA KUNING GAPERNAH SIKAT GIGI', 'PERLU SIKAT GIGI', 75000),
('PERIKSA003', 'DAF003', 'ANAKNYA SEDANG DEMAM DIKARENAKAN MINUM ES TERUS', 'PERLU ISTIRAHAT DAN DILARANG MINUM ES', 150000),
('PERIKSA004', 'DAF004', 'KEBANYAKAN MAKAN MIE', 'DILARANG MAKAN MIE DAN MAKAN MAKANAN SEHAT, ', 125000),
('PERIKSA005', 'DAF005', 'SEDANG DEMAM', 'ISTIRAHAT DAN PERLU MINUM AIR PUTIH', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpendaftaran`
--

CREATE TABLE `tbpendaftaran` (
  `idPendaftaran` varchar(10) NOT NULL,
  `idPasien` varchar(10) DEFAULT NULL,
  `idDokter` varchar(10) DEFAULT NULL,
  `tanggalDaftar` date DEFAULT NULL,
  `waktudaftar` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpendaftaran`
--

INSERT INTO `tbpendaftaran` (`idPendaftaran`, `idPasien`, `idDokter`, `tanggalDaftar`, `waktudaftar`) VALUES
('DAF001', 'PAS008', 'DOK006', '0000-00-00', '10:15:20'),
('DAF002', 'PAS009', 'DOK005', '0000-00-00', '10:15:20'),
('DAF003', 'PAS010', 'DOK002', '0000-00-00', '13:15:20'),
('DAF004', 'PAS007', 'DOK003', '0000-00-00', '15:15:20'),
('DAF005', 'PAS005', 'DOK004', '0000-00-00', '17:15:20'),
('DAF006', 'PAS001', 'DOK001', '0000-00-00', '10:15:20'),
('DAF007', 'PAS002', 'DOK001', '0000-00-00', '10:15:20'),
('DAF008', 'PAS003', 'DOK002', '0000-00-00', '13:15:20'),
('DAF009', 'PAS004', 'DOK003', '0000-00-00', '15:15:20'),
('DAF010', 'PAS006', 'DOK004', '0000-00-00', '17:15:20'),
('DAF011', 'PAS006', 'DOK004', '0000-00-00', '19:15:20'),
('DAF015', 'PAS005', 'DOK004', '0000-00-00', '19:15:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpenjualan`
--

CREATE TABLE `tbpenjualan` (
  `kdTransaksi` varchar(3) DEFAULT NULL,
  `idpelanggan` varchar(3) DEFAULT NULL,
  `kdProduk` varchar(3) DEFAULT NULL,
  `namaProduk` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpenjualan`
--

INSERT INTO `tbpenjualan` (`kdTransaksi`, `idpelanggan`, `kdProduk`, `namaProduk`, `quantity`, `total`) VALUES
('tr1', 'c7', 'pr1', 'kotak pensil', 3, 75000),
('tr1', 'c7', 'pr3', 'flashdisk', 1, 100000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbdetailbayar`
--
ALTER TABLE `tbdetailbayar`
  ADD KEY `idBayar` (`idBayar`),
  ADD KEY `idObat` (`idObat`);

--
-- Indeks untuk tabel `tbdokter`
--
ALTER TABLE `tbdokter`
  ADD PRIMARY KEY (`idDokter`);

--
-- Indeks untuk tabel `tblog_obat`
--
ALTER TABLE `tblog_obat`
  ADD PRIMARY KEY (`idLog`);

--
-- Indeks untuk tabel `tbobat`
--
ALTER TABLE `tbobat`
  ADD PRIMARY KEY (`idObat`);

--
-- Indeks untuk tabel `tbpasien`
--
ALTER TABLE `tbpasien`
  ADD PRIMARY KEY (`idPasien`);

--
-- Indeks untuk tabel `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD PRIMARY KEY (`idBayar`),
  ADD KEY `idPemeriksaan` (`idPemeriksaan`);

--
-- Indeks untuk tabel `tbpemeriksaan`
--
ALTER TABLE `tbpemeriksaan`
  ADD PRIMARY KEY (`idPemeriksaan`),
  ADD KEY `fk_pemeriksaan_pendaftaran` (`idPendaftaran`);

--
-- Indeks untuk tabel `tbpendaftaran`
--
ALTER TABLE `tbpendaftaran`
  ADD PRIMARY KEY (`idPendaftaran`),
  ADD KEY `idPasien` (`idPasien`),
  ADD KEY `fk_pendaftaran_dokter` (`idDokter`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblog_obat`
--
ALTER TABLE `tblog_obat`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbdetailbayar`
--
ALTER TABLE `tbdetailbayar`
  ADD CONSTRAINT `tbdetailbayar_ibfk_1` FOREIGN KEY (`idBayar`) REFERENCES `tbpembayaran` (`idBayar`),
  ADD CONSTRAINT `tbdetailbayar_ibfk_2` FOREIGN KEY (`idObat`) REFERENCES `tbobat` (`idObat`);

--
-- Ketidakleluasaan untuk tabel `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD CONSTRAINT `tbpembayaran_ibfk_1` FOREIGN KEY (`idPemeriksaan`) REFERENCES `tbpemeriksaan` (`idPemeriksaan`);

--
-- Ketidakleluasaan untuk tabel `tbpemeriksaan`
--
ALTER TABLE `tbpemeriksaan`
  ADD CONSTRAINT `fk_pemeriksaan_pendaftaran` FOREIGN KEY (`idPendaftaran`) REFERENCES `tbpendaftaran` (`idPendaftaran`);

--
-- Ketidakleluasaan untuk tabel `tbpendaftaran`
--
ALTER TABLE `tbpendaftaran`
  ADD CONSTRAINT `fk_pendaftaran_dokter` FOREIGN KEY (`idDokter`) REFERENCES `tbdokter` (`idDokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
