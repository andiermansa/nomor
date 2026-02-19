<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penomoran Surat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            min-height: 100vh;
        }

        .main-card {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .header-title {
            font-weight: 700;
        }

        .btn-add {
            border-radius: 12px;
            font-weight: 600;
        }

        .table thead {
            background-color: #f8f9fc;
        }

        .badge-custom {
            background: #4e73df;
        }
    </style>
</head>
<body>

<div class="container py-4">

    <!-- Header -->
    <div class="text-white mb-4">
        <h3 class="header-title">📄 Sistem Penomoran Surat</h3>
        <p class="mb-0">Kelola surat dengan mudah & terstruktur</p>
    </div>

    <!-- Card -->
    <div class="card main-card p-3">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Daftar Surat</h5>
            <a href="tambah.php" class="btn btn-primary btn-add">
                + Tambah
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th>Perihal</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $result = $conn->query("SELECT * FROM documents ORDER BY id DESC");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td><span class='badge bg-secondary'>$no</span></td>
                        <td><span class='badge badge-custom'>$row[nomor_surat]</span></td>
                        <td>$row[tanggal]</td>
                        <td>$row[perihal]</td>
                    </tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>

        <?php if($no == 1): ?>
            <div class="text-center text-muted py-3">
                Belum ada data surat
            </div>
        <?php endif; ?>

    </div>

    <div class="text-center text-white mt-4 small">
        © <?= date("Y") ?> Sistem Surat Online
    </div>

</div>

</body>
</html>
