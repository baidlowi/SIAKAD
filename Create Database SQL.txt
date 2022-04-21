//Departemen :
CREATE TABLE `Departemen` ( `namaDepartemen` VARCHAR(20) NOT NULL , `kodeDepartemen` VARCHAR(20) NOT NULL , `namaMahasiswa` VARCHAR(40) NOT NULL , `namaDosen` VARCHAR(30) NOT NULL , PRIMARY KEY (`kodeDepartemen`)
) ENGINE = MyISAM CHARSET=latin1 COLLATE latin1_swedish_ci;

//Semester: 
CREATE TABLE `Semester` ( `noSemester` INT NOT NULL 
) ENGINE = MyISAM CHARSET=latin1 COLLATE latin1_swedish_ci;

//Matakuliah:
CREATE TABLE `MataKuliah` ( `namaMataKuliah` VARCHAR(30) NOT NULL , `kodeMataKuliah` VARCHAR(20) NOT NULL AUTO_INCREMENT , `jadwalMataKuliah` DATE NOT NULL , PRIMARY KEY (`kodeMataKuliah`)
) ENGINE = MyISAM CHARSET=latin1 COLLATE latin1_swedish_ci;

//BiayaKuliah:
CREATE TABLE `BiayaKuliah` ( `nominalBiaya` INT NOT NULL , `statusPembayaran` BOOLEAN NOT NULL 
) ENGINE = MyISAM CHARSET=latin1 COLLATE latin1_swedish_ci;

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
