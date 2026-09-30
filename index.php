<?php
$produk_list = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "MONITOR",
        "harga" => 2200000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "LAPTOP",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "AKSESORIS",
        "harga" => 250000,
        "stok" => 15
    ],
    [
        "nama" => "Keyboard Mekanikal",
        "kategori" => "AKSESORIS",
        "harga" => 750000,
        "stok" => 0 
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "AUDIO",
        "harga" => 1200000,
        "stok" => 8
    ],
    [
        "nama" => "Flashdisk 64GB",
        "kategori" => "PENYIMPANAN",
        "harga" => 150000,
        "stok" => 0 
    ]
];

$total_produk = count($produk_list);
?>

<?php
$produk_list = [
    ["nama" => "Monitor 24 Inch", "kategori" => "MONITOR", "harga" => 2200000,"stok" => 4],
    ["nama" => "Laptop Productivity", "kategori" => "LAPTOP", "harga" => 8500000, "stok" => 3],
    ["nama" => "Mouse Wireless", "kategori" => "AKSESORIS", "harga" => 250000, "stok" => 15],
    ["nama" => "Keyboard Mekanikal", "kategori" => "AKSESORIS", "harga" => 750000, "stok" => 0],
    ["nama" => "Headset Gaming", "kategori" => "AUDIO", "harga" => 1200000, "stok" => 8],
    ["nama" => "Flashdisk 64GB", "kategori" => "PENYIMPANAN", "harga" => 150000, "stok" => 0]
];
$total_produk = count($produk_list);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { padding: 20px; background-color: #f8f9fa; }
        
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px 0; border-bottom: 1px solid #ddd; margin-bottom: 20px; }
        nav { display: flex; gap: 15px; }
    
        .hero { background: #397eb2; color: white; padding: 50px; border-radius: 10px; margin-bottom: 40px; }
        .hero h1 { font-size: 32px; margin-bottom: 10px; }
        .hero button { margin-top: 20px; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
      
        .catalog-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .product-grid { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 25px; 
            margin-bottom: 40px;
        }
        header h2 {color: #397eb2;}
        .card { background: white; padding: 20px; border-radius: 8px; border: 1px solid #ddd; transition: transform 0.2s ease; }
        .card:hover { transform: translateY(-5px); } /* Efek hover card */
        .card .kategori { font-size: 12px; color: gray; margin-bottom: 5px; }
        .card h3 { margin-bottom: 10px; }
        .card .harga-normal { text-decoration: line-through; color: gray; font-size: 14px; }
        .card .harga-diskon { color: #d32f2f; font-weight: bold; font-size: 18px; margin-bottom: 10px; }
        .card .harga-tetap { font-weight: bold; font-size: 18px; margin-bottom: 10px; }
        .card .stok { font-size: 14px; margin-bottom: 15px; }
        .card .tersedia { color: green; }
        .card .habis { color: red; }
        .btn-beli { background: #007bff; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px; cursor: pointer; }
        .btn-beli:hover { opacity: 0.85; }
        .btn-habis { background: #ccc; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px; cursor: not-allowed; }
      
        footer { text-align: center; padding: 20px; border-top: 1px solid #ddd; margin-top: 20px; }

        
        @media (max-width: 900px) {
            .product-grid { grid-template-columns: repeat(2, 1fr); } 
        }
        @media (max-width: 600px) {
            .product-grid { grid-template-columns: 1fr; } 
        }
    </style>
</head>
<body>

    
    <header>
        <h2>Cia Store</h2>
        <nav>
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">About</a>
        </nav>
    </header>

   
    <section class="hero">
        <p>CIA STORE</p>
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <button>Lihat Produk</button>
    </section>

   
    <div class="catalog-header">
        <div>
            <p style="color: gray; font-size: 12px;">OUR PRODUCTS</p>
            <h2>Katalog Produk</h2>
        </div>
        <p>Total Produk: <strong><?= $total_produk ?></strong></p> 
    </div>

  
    <div class="product-grid">
        <?php foreach ($produk_list as $produk) : ?>
            
            <?php 
               
                $harga_awal = $produk["harga"];
                $is_diskon = false;
                
                if ($harga_awal >= 1000000) {
                    $is_diskon = true;
                    $nilai_diskon = $harga_awal * 0.10; 
                    $harga_akhir = $harga_awal - $nilai_diskon;
                } else {
                    $harga_akhir = $harga_awal;
                }

                $format_harga_awal = "Rp" . number_format($harga_awal, 0, ',', '.');
                $format_harga_akhir = "Rp" . number_format($harga_akhir, 0, ',', '.');
            ?>

            <div class="card">
                <p class="kategori"><?= $produk["kategori"] ?> <?= $is_diskon ? " | DISKON 10%" : "" ?></p>
                <h3><?= $produk["nama"] ?></h3>
                
               
                <?php if ($is_diskon) : ?>
                    <p class="harga-normal"><?= $format_harga_awal ?></p>
                    <p class="harga-diskon"><?= $format_harga_akhir ?></p>
                <?php else : ?>
                    <p class="harga-tetap"><?= $format_harga_akhir ?></p>
                <?php endif; ?>

               
                <?php if ($produk["stok"] > 0) : ?>
                    <p class="stok tersedia">Stok: <?= $produk["stok"] ?> (Tersedia)</p>
                    <button class="btn-beli">Beli Sekarang</button>
                <?php else : ?>
                    <p class="stok habis">Stok: 0 (Stok Habis)</p>
               
                    <button class="btn-habis" disabled>Stok Habis</button>
                <?php endif; ?>
            </div>

        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>