<?php
    error_reporting(error_reporting() & ~E_NOTICE)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Package</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Paket -->
    <section id="paket" class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mb-5"><h2>Paket Laundry</h2></div>
                <?php
                $txt_file = fopen('paket.txt','r');
                while ($line = fgets($txt_file)) {
                    $data = explode(", ",$line);
                    for($i=0;$i<1;$i++){    
                    ?>
                <div class="col-3 mb-3">
                    <div class="card" style="width: 18rem;">
                    <img src="<?php echo $data[4]?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data[0]?></h5>
                        <p class="card-text">Durasi <?php echo $data[1]?>
                        <br><b>Rp. <?php echo number_format($data[2])?></b> / <small>Kilogram</small>
                        <br><?php echo $data[3]?>
                        </p>
                    </div>
                    </div>
                </div>
                <?php  
                                    }
                                }
                fclose($txt_file);
                ?>
            </div>
        </div>
    </section>
    <!-- End Paket -->

    <!-- Form Pembelian -->
    <section id="pesan" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <div class="text-center">
                        <h4>Form Pemesanan</h4>
                        <p>Silahkan isi data dibawah ini untuk memesan paket</p>
                    </div>
                <form method="POST">
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama"id="nama" placeholder="Nama Kamu">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="hp" class="col-sm-2 col-form-label">Hp</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="hp" id="hp" placeholder="Nomor HP(Whatsapp)">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="paket" class="col-sm-2 col-form-label">Paket</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="paket" id="paket">
                                <option value="">--Pilih Paket--</option>

                                <?php
                                $txt_file = fopen('paket.txt','r');
                                while ($line = fgets($txt_file)) {
                                    $data = explode(", ",$line);
                                    for($i=0;$i<1;$i++){    
                                    ?>
                                <option value="<?php echo $data[0]?>"><?php echo $data[0].' - Rp.'.$data[2].'/Kg'?> </option>
                                <?php 
                                }
                            }
                            fclose($txt_file);?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" placeholder="Masukkan Alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Pesan Sekarang</button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
        
    </section>
    <!-- End Form Pembelian -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $paket = $_POST['paket'];
    $alamat = $_POST['alamat'];
    $datapesan = $nama.', '.$hp.', '.$paket.', '.$alamat."\r\n";
    
    $ok = 0;

    function kode_random($length){
		$data = '1234567890';
		$string = 'PJ-';

		for ($i=0; $i < $length ; $i++) { 
			$pos = rand(0, strlen($data)-1);
			$string .= $data[$pos];
		}

		return $string;
	}


	$kode = kode_random(10);

    if(isset($_POST['submit'])){
        if($nama==='' || $hp===''||$paket===''||$alamat===''){
            $ok=0;
        }else{
            $ok = 1;
        }
        if($ok==1){
            if ( file_exists("pesanan.txt")) {
                $fp = fopen ("pesanan.txt", "a");
                fwrite($fp, $datapesan);
                fclose($fp);
                echo'<script type="text/javascript">alert("Pesanan Berhasil, silahkan tunggu admin menghubungi")</script>';
            }else{
                echo'<script type="text/javascript">alert("File Error")</script>';
            }
        }else{
            echo'<script type="text/javascript">alert("Isi data dengan benar")</script>';
        } 
    }

    
?>
</body>
</html>