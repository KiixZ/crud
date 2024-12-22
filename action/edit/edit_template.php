<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> - AMIKOM PURWOKERTO MART</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h2><?php echo htmlspecialchars($title); ?></h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
    <?php echo $content; ?>
    <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-primary">
            <?php echo htmlspecialchars($submitButtonText ?? 'UPDATE'); ?>
        </button>
        <a href="../../home.php?page=<?php echo htmlspecialchars($page); ?>" class="btn btn-secondary">
            <?php echo htmlspecialchars($backButtonText ?? 'KEMBALI'); ?>
        </a>
    </div>
</form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
