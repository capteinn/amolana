<?php

######-----------------FUNGSI DI BAWAH JANGAN MAIN HAPUS AJA---------############

                                                                                #

                                                                                #

######-----------------FUNGSI DI BAWAH JANGAN MAIN HAPUS AJA---------############
//hitung umur
function getAge($date) {
    return intval(date('Y', time() - strtotime($date))) - 1970;
}

##########-----------------FUNGSI SECURE VARIABLE PASSING----------###############

if ( ! function_exists('secure_val'))
{
 	function secure_val($value){
		return filter_var($value,FILTER_SANITIZE_SPECIAL_CHARS);
	}
}

if ( ! function_exists('secure_html'))
{
 	function secure_html($value){
		return htmlspecialchars($value);
	}
}

if ( ! function_exists('secure_entity'))
{
  function secure_entity($value){
    return htmlentities($value);
  }
}

######-----------------FUNGSI SECURE VARIABLE PASSING----------############

function tanggal_indo($tanggal) {
    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
    }

######-----------------CEK IP DAN HOSTNAME----------############

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
 $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
?>

<?php //echo  "IP Address=".$ip;

######-----------------CEK IP DAN HOSTNAME----------############



######-----------------SET TANGGAL ASIA---------############

date_default_timezone_set('Asia/Jakarta');

$tanggal = date('Y-m-d H:i:s');
$tanggal2 = date('Y-m-d');
$updated = date('Y-m-d H:i:s');
$jam = date('H:i:s');

######-----------------SET TANGGAL ASIA---------############

######-----------------titik mata uang---------############
function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}
######-----------------titik mata uang---------############


######-----------------Bulan Dalam Romawi--------############

function getRomawi($bln){
                switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
}
######-----------------Bulan Dalam Romawi--------############

######-----------------SET Convert File Size---------############

function formatSizeUnits($bytes)

    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }
        return $bytes;
}

?>



