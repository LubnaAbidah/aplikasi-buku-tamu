DROP TABLE identitas_web;

CREATE TABLE `identitas_web` (
  `id_identitas` int(11) NOT NULL AUTO_INCREMENT,
  `nm_website` varchar(100) NOT NULL,
  `nm_instansi` varchar(100) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `fb` varchar(30) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `set_intval` int(5) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO identitas_web VALUES("1","Web Buku Tamu","BBPOM Bandar Lampung","<p>Jl. Dr. Susilo No. 105, Pahoman, Enggal, Sumur Putri, Tlk. Betung Utara, Kota Bandar Lampung, Lampung</p>/\n/","35288","(0721)252212","bbpomlampung@bpomri.go.id","BBPOM Lampung","BBPOM Bandar Lampung","@BPOMLampung","BPOMLampung","12");



DROP TABLE profil_web;

CREATE TABLE `profil_web` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `isi_profil` text NOT NULL,
  `md_dt_profil` date NOT NULL,
  `md_tm_profil` time NOT NULL,
  `credit_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO profil_web VALUES("1","<p>Aplikasi Web Buku Tamu ini dibuat untuk mempermudah pelayanan register tamu BBPOM yang datang baik untuk keperluan berkunjung atau yang lainnya. Membuat data tamu tersimpan lebih terstruktur, memudahkan pencarian, backup data dan pengarsipan data.</p>/\n///\n//","2019-05-19","20:27:14","Lubna Abidah | 19 Mei 2019");



DROP TABLE staf;

CREATE TABLE `staf` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO staf VALUES("admin","827ccb0eea8a706c4c34a16891f84e7b");



DROP TABLE tamu;

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(100) NOT NULL,
  `kabupaten` text NOT NULL,
  `instansi` text NOT NULL,
  `alamat` text NOT NULL,
  `keperluan` text NOT NULL,
  `yang_ditemui` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_tamu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tamu VALUES("6","2019-05-22 21:52:09","Lubna Abidah","Lampung Barat","PT. Adil","Jl. Manggis no 20","Mengecek Makanan","Bu Meli","08675554334");
INSERT INTO tamu VALUES("7","2023-12-15 13:00:18","Anita Desta","Kota Bandar Lampung","Kemenkes Bandar Lampung","Jl Pahoman no 111 Bandar Lampung","Konsultasi","Bu Meli","0974773774734");



