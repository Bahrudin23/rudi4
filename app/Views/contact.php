<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffffff;
            color: #333;
            padding: 40px;
            margin: 0;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: left;
            text-align: left;
        }

        input, select {
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <?= $this->extend('layout') ?>

    <?= $this->section('content') ?>

<h1>Kontak Kami</h1>
<form method="get" onsubmit="kirimWA(event)">
    Pengontak:<br />
    <input type="text" name="nama_pengontak" /> <br />
    Perusahaan:<br />
    <input type="text" name="perusahaan" /> <br />
    Alasan Menghubungi:<br />
    <select name="alasan">
        <option value="">-- Pilih Alasan --</option>
        <option value="Bekerja Sama">Bekerja Sama</option>
        <option value="Berinvestasi">Berinvestasi</option>
    </select>
    <br />
    <button type="submit">Kirim</button>
</form>

<script>
    function kirimWA(event) {
        event.preventDefault();

        const nama = document.querySelector('input[name="nama_pengontak"]').value.trim();
        const perusahaan = document.querySelector('input[name="perusahaan"]').value.trim();
        const alasan = document.querySelector('select[name="alasan"]').value;

        if (!nama || !perusahaan || !alasan) {
            alert("Semua field harus diisi!");
            return;
        }

        const pesan = `Halo, saya ${nama} dari ${perusahaan}. Saya ingin menghubungi Anda untuk: ${alasan}`;
        const nomorTujuan = "62881026484748";

        const urlWA = `https://wa.me/${nomorTujuan}?text=${encodeURIComponent(pesan)}`;
        window.open(urlWA, '_blank');
    }
</script>

</body>
</html>

<?= $this->endSection() ?>