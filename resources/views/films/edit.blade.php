<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<body class="background min-h-screen">
<?php require '../resources/views/layout/header.blade.php' ?>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-16 container flex-grow content-fade">
        <h1 class="text-3xl font-bold mb-4">Edit Film</h1>
        <form action="/update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($film->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($film->name) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="director" class="block text-gray-700">Director:</label>
                <input type="text" name="director" value="<?= htmlspecialchars($film->director) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="year" class="block text-gray-700">Year:</label>
                <input type="number" name="year" value="<?= htmlspecialchars($film->year) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</button>
            <input type="hidden" name="type" value="<?= 'films' ?>">
        </form>
        <a href="/films" class="text-gray-500 hover:underline mt-4 block">Return</a>
    </div>
    <footer id="footer" class="text-white text-center mt-8 p-4">
        <?php require '../resources/views/layout/footer.blade.php' ?>
    </footer>

</body>
<style>
    body {
        font-family: 'Poppins', sans-serif;
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