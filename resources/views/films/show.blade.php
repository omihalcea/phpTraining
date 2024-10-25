<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="background min-h-screen">
<?php require '../resources/views/layout/header.blade.php' ?>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-16 container flex-grow content-fade flex flex-col items-center text-center">
        <h1 class="text-3xl font-bold mb-4">Film Info</h1>
        <form action="/show" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($film->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Name:</label>
                <label id="name" class="block text-gray-700"><?= htmlspecialchars($film->name) ?></label>
            </div>
            <div class="mb-4">
                <label for="director" class="block text-gray-700 font-bold">Director:</label>
                <label id="director" class="block text-gray-700"><?= htmlspecialchars($film->director) ?></label>
            </div>
            <div class="mb-4">
                <label for="year" class="block text-gray-700 font-bold">Year:</label>
                <label id="year" class="block text-gray-700"><?= htmlspecialchars($film->year) ?></label>
            </div>
            <a href="/films" class="text-gray-500 hover:underline mt-4 block">Return</a>
        </form>
    </div>
    <footer id="footer" class="text-white text-center mt-8 p-4">
        <?php require '../resources/views/layout/footer.blade.php' ?>
    </footer>
</body>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        position: relative;
        min-height: 100vh;
    }

    .background {
        background-color: #1e1c2a;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .content-fade {
        opacity: 0; /* Inici amb opacitat 0 */
        animation: fadeIn 2s forwards; /* Animació de 2 segons */
    }

    #footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>
</html>