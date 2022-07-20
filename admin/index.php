<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesan Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <section id="data" class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mb-3"><h2>Data Pemesanan</h2>
                    <p>Berikut data pemesan laundry</p>    
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Hp</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $txt_file = fopen('../pesanan.txt','r');
                while ($line = fgets($txt_file)) {
                    $data = explode(", ",$line);
                    for($i=0;$i<1;$i++){   
                    ?>
                    <tr>
                    <td><?php echo $data[0]?></td>
                    <td><?php echo $data[1]?></td>
                    <td><?php echo $data[2]?></td>
                    <td><?php echo $data[3]?></td>
                    </tr>
                    <?php }
                    }?>
                    
                </tbody>
                </table>
            </div>
        </div>
    </section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>