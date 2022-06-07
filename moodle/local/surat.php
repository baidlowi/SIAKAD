<html>
<head>
	<title>[SIAKAD-ITS] Layanan Surat Mahasiswa</title>
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<style type="text/css" media="screen">@import "style/basic.css";</style>
	<style type="text/css" media="screen">@import "style/tabs.css";</style>
	<link href="style/pager.css" type="text/css" rel="stylesheet">
	<link href="style/officexp.css" type="text/css" rel="stylesheet">
	<link href="style/button.css" type="text/css" rel="stylesheet">
	<link href="style/yudisium.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<style>

		.GridStyle_yudisium .set_status_approval {
			font-size: 11px;
			cursor: pointer;
		}
		.GridStyle_yudisium .set_status_approval form,
		.GridStyle_yudisium .set_status_approval select {
		    margin: inherit;
		    padding: inherit;
		}
		.GridStyle_yudisium .set_status_approval select {
			font-size:10px;
			border:1px solid #efefef;
		}
		.GridStyle_yudisium .set_status_approval input[type=button] {
			font-size:8px;
			border:1px solid #efefef;
		}

		/* Menu with card style__START */
		.mkartu {
			width: 100%;
			padding-top: 20px;
			padding-bottom: 20px;
		}

		.colmkartu {
		  background: #fff;
		  border-radius: 2px;
		  display: inline-block;
		  margin: 1rem;
		  position: relative;
		  height: 200px;
		  width: 300px;
		}

		.colmkartu .kartu {
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			border-bottom: 2px solid #013880;
			border-bottom: 2px solid #ffc415;
			transition: all .5s ease-out;
			-webkit-transition: all .1s ease-out;
			-moz-transition: all .1s ease-out;
			height: 200px;
			background: #ecf0f1;
		}

		.colmkartu .kartu:hover {
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
			background: #ffc415; /* kuning */
			background: #013880; /* biru */
			color: #fff;
			cursor:pointer;
		}

		.colmkartu .kartu1:hover {
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
			background: #ffc415;
			background: #013880; /* biru */
			color: #fff;
			cursor:pointer;
		}

		.colmkartu .kartu .katas {
			opacity: .8;
			padding: 30px 0 20px 0;
			color: #013880;
			font-weight: 999;
			transition: all .5s ease-out;
			-webkit-transition: all .2s ease-out;
			-moz-transition: all .2s ease-out;
		}

		.colmkartu .kartu:hover .katas {
			background: #ffc415;
			background: #013880; /* biru */
			color: #fff;
			opacity: 1;
		}

		.colmkartu .kartu .katas i.fa, .colmkartu .kartu .katas i.fas {
			font-size: 70px;
			margin-bottom: 15px;
		}

		.colmkartu .kartu .katas p {
			font-size: 14px;
		}

		.colmkartu .kartu .konten {
			padding: 2px 16px;
			text-align: center !important;
			margin-top: 10px !important;
			margin-bottom: 10px !important;
		}

		.colmkartu .kartu:hover .konten {
			color: #fff;
		}

		.colmkartu .kartu .konten select {
			background-color: #fff;
			font-size: 14px;
			border: 1px solid #efefef;
			border-radius: 0;
			-moz-border-radius: 0;
			-webkit-border-radius: 0;
			outline: none;
			-webkit-outline: none;
			-moz-outline: none;
			box-shadow: none !important;
			-webkit-box-shadow: none !important;
			-moz-box-shadow: none !important;
		}
		/* Menu with card style__END */

	</style>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">

<!--<script type="text/javascript" src="scripts/jquery.js"></script>-->
<!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="scripts/jquery.dimensions.js"></script>
<script type="text/javascript" src="scripts/jquery.positionBy.js"></script>
<script type="text/javascript" src="scripts/jquery.jdMenu.js"></script>
<link rel="stylesheet" href="style/jquery.jdMenu.css" type="text/css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156881742-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-156881742-1');
</script>
<style>
.badge1 {
   position:relative;
}
.badge1[data-badge]:after {
   content:attr(data-badge);
   position:absolute;
   top:-13px;
   right:-5px;
   font-size:.7em;
   background:#FE2727;
   color:white;
   width:20px;height:20px;
   text-align:center;
   line-height:18px;
   border-radius:50%;
   letter-spacing:-1px;
}
.badge1[data-badge=""]:after, .badge1[data-badge="0"]:after  {
	content: none;
}
</style>
<div id="banner">
	<img src="images/header.png">
</div>
<form name="fMenu" id="fMenu" method="post" action="">
<input type="hidden" id="actmenu" name="actmenu">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr> 
    <td valign="top" colspan="2">
	
	<div>
		<ul class="jd_menu">
		
		
	<li><a href="home.php">Home</a></li>
	<li>Data&nbsp;<img src="images/down_m.gif">
		<ul>
		<li>Biodata&nbsp;<img src="images/left_m.gif">
			<ul>
			<li><a href="data_update_biodata.php">Verifikasi Biodata</a></li>
			</ul>
		</li>
		<li><a href="data_mhswisuda.php">Update Data Wisuda</a></li>
		<li>Lain - lain&nbsp;<img src="images/left_m.gif">
			<ul>
			<li><a href="list_ekivalensi.php">Ekivalensi</a></li>
			</ul>
		</li>
		</ul>
	</li>
	<li>Proses&nbsp;<img src="images/down_m.gif">
		<ul>
		<li><a href="ipd_kuesionermk.php">Kuesioner Dosen dan MK</a></li>
		<li><a href="data_kur.php">Kurikulum Semester</a></li>
		<li><a href="list_frs.php">Formulir Rencana Studi</a></li>
		</ul>
	</li>
	<li>Laporan&nbsp;<img src="images/down_m.gif">
		<ul>
		<li>Transkrip&nbsp;<img src="images/left_m.gif">
			<ul>
			<li><a href="xrep_transkrip.php">Transkrip</a></li>
			<li><a href="xrep_transkrip_sementara.php">Transkrip Sementara</a></li>
			</ul>
		</li>
		<li>Mahasiswa&nbsp;<img src="images/left_m.gif">
			<ul>
			<li><a href="data_mhsakademik.php">Akademik Mahasiswa</a></li>
			<li><a href="xrep_kartumahasiswa.php">KTM Virtual</a></li>
			<li><a href="data_mhs.php">Biodata Mahasiswa</a></li>
			<li><a href="data_kuliah.php">Perkuliahan Mahasiswa</a></li>
			<li><a href="list_mhsmk.php">Daftar Mhs & Matakuliah</a></li>
			<li><a href="list_mhsstatang.php">Status Per Angkatan</a></li>
			</ul>
		</li>
		<li><a href="list_prasyarat.php">Prasyarat Matakuliah</a></li>
		<li><a href="list_mhsjadwal.php">Jadwal Kuliah Mhs</a></li>
		<li>Nilai&nbsp;<img src="images/left_m.gif">
			<ul>
			<li><a href="data_nilaimhs.php">Nilai Per Mhs</a></li>
			<li><a href="data_nilaipersem.php">Nilai Per Semester</a></li>
			</ul>
		</li>
		</ul>
	</li>
	<li>Lain-Lain&nbsp;<img src="images/down_m.gif">
		<ul>
		<li><a href="css_bio_puas.php">Survei Kepuasan Mahasiswa</a></li>
		</ul>
	</li>
	<li>Ekivalensi&nbsp;<img src="images/down_m.gif">
		<ul>
		<li><a href="ekivalensi_rekapitulasi_mhs.php">Rekapitulasi Ekivalensi</a></li>
		</ul>
	</li>
	<li>Yudisium&nbsp;<img src="images/down_m.gif">
		<ul>
		<li>Nilai Bahasa Asing&nbsp;<img src="images/left_m.gif">
			<ul>
			<li><a href="yudisium_nilai_bahasa_asing.php">Unggah Nilai Bahasa Asing</a></li>
			</ul>
		</li>
		</ul>
	</li>
	<li>SKPI&nbsp;<img src="images/down_m.gif">
		<ul>
		<li><a href="skpi_draft.php">Draft SKPI</a></li>
		<li>Panduan Pengguna&nbsp;<img src="images/left_m.gif">
			<ul>
			<li><a href="downloads/panduan_umum_pengisian_skpi.pdf">Panduan Umum (pdf)</a></li>
			<li><a href="downloads/user_manual_skpi_akad_mhs_v01.pdf">Sebagai Mahasiswa (pdf)</a></li>
			</ul>
		</li>
		</ul>
	</li>
	<li>Biaya Pendidikan&nbsp;<img src="images/down_m.gif">
		<ul>
		<li><a href="data_historis_pembayaran.php">Historis Pembayaran SPP</a></li>
		<li><a href="data_tagihan_pendidikan.php">Tagihan Biaya Pendidikan</a></li>
		<li><a href="data_pembayaran_wisuda.php">Pembayaran Wisuda</a></li>
		</ul>
	</li>
	<li class="badge1" data-badge="0">Surat Mahasiswa&nbsp;<img src="images/down_m.gif">
		<ul>
		<li><a href="surat_mahasiswa.php">Layanan Surat Mahasiswa</a></li>
		<li><a href="downloads/panduan_layanan_surat_mahasiswa.pdf">Panduan Layanan (PDF)</a></li></ul></li>		
		
			<li><font color="yellow">Keluar </font><img src="images/down_m.gif">
				<ul>
					<li><a href="https://my.its.ac.id">Kembali ke Menu</a></li>
					<li><a href="sys_logout.php"><font color="yellow">Logout</font></a></li>
				</ul>
			</li>
		</ul>
	</div>
	</td>
</tr>
<tr height="20" style="font-family: sans-serif, Tahoma; background-color:#ece9d8;">
	<td nowrap style="padding-left:5">
		Periode: Semester Genap 2021/2022		Tanggal: Mon, 06 Jun 2022 06:49:28 +0700	</td>
	
		
	
  	<td align="right" nowrap style="padding-right:5;color:#666;padding-right:10px">
    		<b>[n137
] User ID: </b>5026201035, MOH. HASYIM BAIDLOWI &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 		<b>Hak Akses:</b> 
	
	
	<select id="sRoles" name="sRoles" class="comboSmallStyle" onChange="do_changeRoles();" style="width:100px">
	<option value="">- Pilih Hak Akses -</option>
	<option value="10" selected >Mahasiswa</option>
	</select>

	<select id="sFak" name="sFak" class="comboSmallStyle"  onChange="do_changeFak()"  style="width:100px;background-color:#eeef66">
	<option value="">- Pilih Fakultas -</option>
	<option value="7" selected  style="background-color:#eeef66">ELECTICS</option>
	</select>

	<select id="sJur" name="sJur" class="comboSmallStyle"  onChange="do_changeUnit()"  style="background-color:#ffcccc">
	<option value="" >- Pilih Prodi -</option>
	<option value="52100" selected  style="background-color:#ffcccc">52100 - 05214000 - S-1 SISTEM INFORMASI </option>
	</select>

	</td>
	
</tr>
</table>
</form>
<script language="JavaScript">

function do_changeRoles() 
{
	document.getElementById("sJur").value = ""; 
	document.getElementById("actmenu").value = "changeRole"; 
	document.getElementById("fMenu").submit();
}

function do_changeFak() 
{
	document.getElementById("actmenu").value = "changeFak"; 
	document.getElementById("fMenu").submit();
}

function do_changeUnit() 
{
	document.getElementById("actmenu").value = "changeUnit"; 
	document.getElementById("fMenu").submit();
}
</script>

<div align="center">
<table width="">
	<tr height="30">
		<td align="center" colspan="2" class="PageTitle">Layanan Surat Mahasiswa</td>
	</tr>
</table>

<!-- <form name="f_jenissurat" id="f_jenissurat" method="post" action="/surat_mahasiswa.php">
<table cellpadding="4" cellspacing="0" class="FilterBox">
 <tr>
  <td><strong>Pilih Jenis Surat</strong></td>
  <td>:</td>
  <td><select id='s_jenissurat' name='s_jenissurat'  id='s_jenissurat' ><option value=''>- Pilih -</option><option value='1' selected='selected'>Surat Keterangan Mahasiswa Aktif</option><option value='2' >Cuti</option><option value='3' >Mengundurkan Diri</option><option value='4' >KTM Pengganti</option></select></td>
  </tr>
 <tr>
</table>
</form>
 -->
	<p>
	<a href='?' class='button'>&laquo; Kembali ke menu</a>
</p>


<div align="left"  style="width:1000px">	
<table width="100%" cellspacing="4" cellpadding="4" class="EditTabTable">
	<tr> 
		<td class="EditTabLine" colspan="3">Surat Keterangan Mahasiswa Aktif</td>
	</tr>
</table>
<form name="sipform" id="sipform" method="post" action="?id_jenissurat=1">
<table width="100%" cellspacing="4" cellpadding="4" class="EditTabTable">
	<tr>
	  <td class="EditTabLabel" width="200">PERIODE</td>
	  <td class="EditTabLabel" width="10" align="center">:</td>
	  <!-- <td>Genap - 2021</td> -->
	  <td><select name="periode" id="periode" class="ControlStyle" >
<option></option>
<option value='20212'>2021 - Genap</option>
<option value='20211'>2021 - Gasal</option>
</select>
</td>
	  </tr>
	<tr>
	  <td class="EditTabLabel">KEPERLUAN</td>
	  <td class="EditTabLabel" align="center">:</td>
	  <td><select id='s_keperluan' name='s_keperluan' ><option value=''>- Pilih -</option><option value='1' >mengurus tunjangan gaji orang tua/to request a statement of parental salary</option><option value='2' >mengurus tunjangan pensiun orang tua/to request a statement of parental pension fund</option><option value='3' >mengurus BPJS/asuransi kesehatan/to propose BPJS/health insurance</option><option value='4' >mengurus beasiswa/for applying scholarship</option><option value='5' >mengurus kehilangan KTM/to file a report for missing student ID card</option><option value='6' >melamar pekerjaan/for applying for a job</option><option value='7' >mengurus laporan kehilangan ke kepolisian/to file a report for missing property</option><option value='8' >mengurus visa/to apply for a visa</option><option value='9' >mengikuti lomba/for following a competition</option><option value='10' >mengurus laporan kehilangan KTM ke kepolisian/to file a report for missing student card property</option><option value='99' >lain-lain/etc.</option></select></td>
	  </tr>
	<tr id="row_keperluan_lain">
	  <td class="EditTabLabel" valign="top">ISI KEPERLUAN</td>
	  <td class="EditTabLabel" valign="top" align="center">:</td>
	  <td><textarea name="t_keperluan_lain" cols="50" rows="4"></textarea></td>
	  </tr>
	<tr>
	  <td class="EditTabLabel">PILIHAN BAHASA</td>
	  <td class="EditTabLabel" align="center">:</td>
	  <td><select id='l_bahasa' name='l_bahasa' ><option value=''>- Pilih -</option><option value='id' selected='selected'>Bahasa Indonesia</option><option value='en' >English</option></select></td>
	  </tr>
</table>
<input type="hidden" name="ajukan" id="ajukan" value="0">
<table>
	<tr>
		<td align="center">
			<a href="#" onClick="return showData();" class="button"><span class="list">Ajukan Surat</span></a>
		</td>
	</tr>
</table>
</form>


<table width="100%" cellspacing="4" cellpadding="4" class="EditTabTable">
	<tr> 
		<td class="EditTabLine" colspan="3">Historis Pengajuan Surat</td>
	</tr>
</table>
<!-- class untuk yg sudah approve: yudisium_hl_diajukan -->
<table border=0 cellspacing="2" cellpadding="2" width="100%" class="GridStyle_yudisium">
	<tr class="yudisium_header_tabel">
		<td width="20"><strong>NO</strong></td>
		<td><strong>PERIODE</strong></td>
		<td><strong>KEPERLUAN</strong></td>
		<td><strong>BAHASA</strong></td>
		<td><strong>TANGGAL</strong></td>
		<td><strong>STATUS</strong></td>
		<td><strong>CETAK</strong></td>
	</tr>
		<tr class="yudisium_hl_diajukan">
		<td align="center">1</td>
		<td>Gasal 2020</td>
		<td>lain-lain - Pengajuan github education pack</td>
		<td>en</td>
		<td>2021-03-01 20:59:20</td>
		<td>
		DISETUJUI<br>2021-03-02 06:44:08<br>37526/IT2.I.3.2/KM.00.04.01/2021<br>		</td>
		<td>
					<a href="surat_mahasiswa_template_en_1.php?psmid=17675&cetak=1" target=\"_blank\">CETAK</a>
				</td>
	</tr>
</table>
</div>
<script type="text/javascript">
			$("#row_keperluan_lain").hide();
	</script>

</div>
</body>

<script type="text/javascript">
function goNow(url) {
		location.href = url; 
}

function showData() {
	document.getElementById("ajukan").value=1;
	document.getElementById("sipform").submit();
}

function showData_PernahStudi() {
	var nrp = document.getElementById("mahasiswaOut").value;
	if (nrp=='') {
		alert('Pilih Mahasiswa terlebih dahulu!');
		return false;
	} else {
		document.getElementById("ajukan").value=1;
		document.getElementById("sipform").submit();
	}
}

$('#s_jenissurat').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $("#f_jenissurat").submit();
});

$('#s_keperluan').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if (valueSelected==99) {
    	$("#row_keperluan_lain").show();
    } else {
        $("#row_keperluan_lain").hide();        
    }
});

$('#s_alasancuti').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if (valueSelected==99) {
    	$("#row_alasan_lain").show();
    } else {
        $("#row_alasan_lain").hide();        
    }
});	
</script>
</html>