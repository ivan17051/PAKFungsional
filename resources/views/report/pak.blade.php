<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="{{asset('/public/css/report.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('/public/css/report-screen.css')}}" rel="stylesheet" type="text/css" media="screen">
    <title>SURAT PERMINTAAN PEMBAYARAN (SPP)</title>
    <style media="all" type="text/css">
        body{
            font-family:Verdana, Geneva, sans-serif;
            font-size:12px;
            padding:0px;
            margin:0px;
        } 
        .TebalBorder{ 
            border-bottom:solid 2px;
        } 
        p{
            text-indent:40px;
        }
    </style>
</head>

<body>
    <table class="screen panjang">
        <tbody>
            <tr>
                <td class="jarak">
                    <table class="lebarKertasTegak" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td class="headerFont fontCenter paddingfont" style="font-size:16px;text-decoration: underline;">PENETEPAN ANGKA KREDIT</td>
                            </tr>
                            <tr style="margin-bottom:30px;">
                                @php
                                $bulan = ['','I','II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
                                $mytime = Carbon\Carbon::make(date("Y-m-d"));
                                @endphp
                                <td class="headerFont fontCenter paddingfont" style="font-size:12px">Nomor :AA/1 02 0100/12/LS/F/{{$bulan[ltrim($mytime->format('m'),'0')]}}/{{$mytime->format('Y')}}</td>
                            </tr>
                            <tr>
                                <td class="fontCenter paddingfont" style="font-size:12px">Masa Penilaian : Juli 2020 s/d Juni 2021</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="paddingfont" style="font-size:12px">INSTANSI : DINAS KESEHATAN KOTA SURABAYA</td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table-padding" width="100%" cellspacing="0" cellpadding="0" border="1">
                                        <tbody>
                                            <tr class="fontBold">
                                                <td>I</td>
                                                <td></td>
                                                <td class="fontCenter" colspan="5">KETERANGAN PERORANGAN</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="12"></td>
                                                <td>1.</td>
                                                <td colspan="2">Nama</td>
                                                <td colspan="3">MAS IVAN</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td colspan="2">NIP</td>
                                                <td colspan="3">982734982742</td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td colspan="2">Nomor Seri KARPEG</td>
                                                <td colspan="3">Q.215848</td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td colspan="2">Pangkat / Golongan Ruang / TMT</td>
                                                <td colspan="3">Penata Tk. I, III/d, 01 Oktober 2013</td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td colspan="2">Tempat dan Tanggal Lahir</td>
                                                <td colspan="3">Sidoarjo, 04 April 1968</td>
                                            </tr>
                                            <tr>
                                                <td>6.</td>
                                                <td colspan="2">Jenis Kelamin</td>
                                                <td colspan="3">Perempuan</td>
                                            </tr>
                                            <tr>
                                                <td>7.</td>
                                                <td colspan="2">Pendidikan yang Diperhitungkan Angka Kreditnya</td>
                                                <td colspan="3">D-III Keperawatan</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2">8.</td>
                                                <td colspan="2">Jabatan Fungsional</td>
                                                <td colspan="3">Perawat Penyelia</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">TMT</td>
                                                <td colspan="3">01 Oktober 2013</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2">9.</td>
                                                <td>Masa kerja Golongan</td>
                                                <td>Lama</td>
                                                <td colspan="3">25 Tahun 11 Bulan</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Baru</td>
                                                <td colspan="3">26 Tahun 11 Bulan</td>
                                            </tr>
                                            <tr>
                                                <td>10.</td>
                                                <td colspan="2">Unit kerja</td>
                                                <td colspan="3">Puskesmas Menur</td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr class="fontBold">
                                                <td>II</td>
                                                <td></td>
                                                <td class="fontCenter" colspan="2">PENETAPAN ANGKA KREDIT</td>
                                                <td>LAMA</td>
                                                <td>BARU</td>
                                                <td>JUMLAH</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="14"></td>
                                                <td>1.</td>
                                                <td colspan="2" class="fontBold">UNSUR UTAMA</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="9"></td>
                                                <td colspan="2">A. Pendidikan</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr >
                                                <td colspan="2" style="padding-left: 16px;">  (1) Pendidikan formal</td>
                                                <td class="fontCenter">60.000</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">60.000</td>
                                            </tr>
                                            <tr >
                                                <td colspan="2" style="padding-left: 16px;">  (2) Pendidikan dan Pelatihan Fungsional/Teknis</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">-</td>
                                            </tr>
                                            <tr >
                                                <td colspan="2" style="padding-left: 38px;">   Jabatan Fungsional Perawat</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr >
                                                <td colspan="2" style="padding-left: 16px;">  (3) Pendidikan dan Pelatihan Prajabatan</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">-</td>
                                            </tr>
                                            <tr >
                                                <td colspan="2">B. Pelayanan Kesehatan</td>
                                                <td class="fontCenter">60.000</td>
                                                <td class="fontCenter">10.289</td>
                                                <td class="fontCenter">60.000</td>
                                            </tr>
                                            <tr >
                                                <td colspan="2">C. Pengabdian Masyarakat</td>
                                                <td class="fontCenter">60.000</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">60.000</td>
                                            </tr>
                                            <tr >
                                                <td colspan="2">D. Pengembangan Profesi</td>
                                                <td class="fontCenter">60.000</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">60.000</td>
                                            </tr>
                                            <tr >
                                                <td class="fontCenter fontBold" colspan="2">JUMLAH UNSUR UTAMA</td>
                                                <td class="fontCenter">60.000</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">60.000</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td colspan="2" class="fontBold">UNSUR PENUNJANG</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2"></td>
                                                <td colspan="2">Penunjang Pelayanan Kesehatan</td>
                                                <td class="fontCenter">60.000</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">60.000</td>
                                            </tr>
                                            <tr >
                                                <td class="fontCenter fontBold" colspan="2">JUMLAH UNSUR PENUNJANG	</td>
                                                <td class="fontCenter">60.000</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">60.000</td>
                                            </tr>
                                            <tr>
                                                <td class="fontCenter fontBold" colspan="3">JUMLAH UNSUR UTAMA DAN PENUNJANG</td>
                                                <td class="fontCenter">60.000</td>
                                                <td class="fontCenter">-</td>
                                                <td class="fontCenter">60.000</td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr class="fontBold">
                                                <td>III</td>
                                                <td colspan="6">
                                                    Dapat dipertimbangkan untuk dinaikkan dalam Jabatan Perawat Penyelia ; <br>
                                                    Pangkat Penata; Golongan Ruang III/c ; TMT 01 Oktober 2022 ; 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><br><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0" >
                                        <tbody>
                                            <tr>
                                                <td width="70%" class="keterangan">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    ASLI disampaikan dengan hormat kepada :<br>
                                                    Kepala Kantor Regional II BKN di Sidoarjo ;<br>
                                                    <br>
                                                    TEMBUSAN disampaikan kepada :<br>
                                                    1. Pegawai yang bersangkutan<br>
                                                    2. Kepala Puskesmas Menur<br>
                                                    3. Kepala Badan Kepegawaian dan Diklat Pemerintah Kota Surabaya<br>

                                                </td>
                                                <td class="fontBold">
                                                    DITETAPKAN DI : SURABAYA<br>
                                                    PADA TANGGAL : <br><br>
                                                    <div class="fontCenter">KEPALA DINAS KESEHATAN</div>
                                                    <div class="fontCenter">KOTA SURABAYA</div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="fontCenter" style="text-decoration: underline;">Nanik Sukristina, S.KM, M.Kes</div>
                                                    <div class="fontCenter">Pembina Tk. I</div>
                                                    <div class="fontCenter">NIP 197001171994032008</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <script>
        // window.print();
    </script>
</body>

</html>