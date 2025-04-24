<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profil</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffffff;
            color: #333;
            padding: 40px;
            margin: 0;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #34495e;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            width: fit-content;
        }

        h2, h3 {
            color:rgb(0, 0, 0);
            margin-top: 30px;
        }

        p {
            margin: 5px 0;
        }

        ul, ol {
            padding-left: 20px;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            text-decoration: none;
            color: #2980b9;
        }

        button {
            padding: 10px 20px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color:rgb(48, 172, 255);
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Bahrudin Rizky Ramadani</h1>
    <p> Perkenalkan Nama saya Bahrudin Rizky Ramadani bisa dipanggil Rudi/Bahrudin</p>
    <p>Alamat: Plemahan, Banyuarang, Ngoro, Jombang</p>
    <p>Hobi: Gaming</p>
    <p>Cita-cita: Membuat aplikasi/website untuk sekolah dan dusun</p>

    <h2>Mata Kuliah</h2>
    <ul>
        <?php foreach ($mata_kuliah as $mk): ?>
            <li><a href="<?= base_url('matkul/' . $mk['kode']) ?>"><?= $mk['kode'] ?> - <?= $mk['nama'] ?></a></li>
        <?php endforeach; ?>
    </ul>

<br>
<h3> SKILL</h3>
<ol>
    <li>web desainer</li>
    <li>sofware desainer</li>
    <li>basis data</li> 
</ol>
<a href="<?= base_url('contact') ?>" class="btn"><button>Contact Me</button></a>
</body>
</html>