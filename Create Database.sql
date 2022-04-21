//Akun
CREATE TABLE `Akun` (`NRP` int(25) NOT NULL, `nama` varchar(50) NOT NULL, `password` int(20) NOT NULL, `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE `Akun`
  ADD PRIMARY KEY (`NRP`);
COMMIT;

//Biodata Mahasiswa
CREATE TABLE `BiodataMahasiswa` (`namaLengkap` varchar(50) NOT NULL, `tempatTanggalLahir` varchar(100) NOT NULL, `NIK` int(50) NOT NULL, `jenisKelamin` tinyint(1) NOT NULL, `alamatRumah` varchar(100) NOT NULL, `noTelp` int(12) NOT NULL, `eMail` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

//Departemen :
CREATE TABLE `Departemen` ( `namaDepartemen` VARCHAR(20) NOT NULL , `kodeDepartemen` VARCHAR(20) NOT NULL , `namaMahasiswa` VARCHAR(40) NOT NULL , `namaDosen` VARCHAR(30) NOT NULL , PRIMARY KEY (`kodeDepartemen`)
) ENGINE = MyISAM CHARSET=latin1 COLLATE latin1_swedish_ci;
COMMIT;

//Semester: 
CREATE TABLE `Semester` ( `noSemester` INT NOT NULL 
) ENGINE = MyISAM CHARSET=latin1 COLLATE latin1_swedish_ci;
COMMIT;

//Matakuliah:
CREATE TABLE `MataKuliah` ( `namaMataKuliah` VARCHAR(30) NOT NULL , `kodeMataKuliah` VARCHAR(20) NOT NULL AUTO_INCREMENT , `jadwalMataKuliah` DATE NOT NULL , PRIMARY KEY (`kodeMataKuliah`)
) ENGINE = MyISAM CHARSET=latin1 COLLATE latin1_swedish_ci;
COMMIT;

//BiayaKuliah:
CREATE TABLE `BiayaKuliah` ( `nominalBiaya` INT NOT NULL , `statusPembayaran` BOOLEAN NOT NULL 
) ENGINE = MyISAM CHARSET=latin1 COLLATE latin1_swedish_ci;
COMMIT;

//Nilai
CREATE TABLE `Nilai` (`namaMataKuliah` varchar(30) NOT NULL, `kodeMataKuliah` varchar(20) NOT NULL, `SKS` int(11) NOT NULL, `nilaiHuruf` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE `Nilai`
  ADD PRIMARY KEY (`kodeMataKuliah`);
COMMIT;

//Kelas
CREATE TABLE `Kelas` (`noRuang` varchar(20) NOT NULL, `kapasitas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE `Kelas`
  ADD PRIMARY KEY (`noRuang`);
COMMIT;

//Prestasi
CREATE TABLE `Prestasi` (`jenisKompetisi` varchar(50) NOT NULL, `namaKompetisi` varchar(50) NOT NULL, `skalaKompetisi` varchar(50) NOT NULL, `penyelenggara` varchar(50) NOT NULL, `tanggal` date NOT NULL, `berkas` blob NOT NULL, `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

//Surat
CREATE TABLE `Surat` (`Periode` date NOT NULL, `Keperluan` varchar(200) NOT NULL, `jenisSurat` tinyint(1) NOT NULL, `Bahasa` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
