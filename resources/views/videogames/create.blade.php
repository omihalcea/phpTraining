<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="background min-h-screen">
<?php require '../resources/views/layout/header.blade.php' ?>
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-16 container flex-grow content-fade flex flex-col items-center text-center">
    <h1 class="text-2xl font-bold mb-4">Add New Videogame</h1>
    <form action="/store" method="POST">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium font-bold text-gray-700">Title:</label>
            <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter videogame title">
        </div>

        <div class="mb-4">
            <label for="studio" class="block text-sm font-medium font-bold text-gray-700">Studio:</label>
            <input type="text" name="studio" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter studio name">
        </div>

        <div class="mb-4">
            <label for="publisher" class="block text-sm font-medium font-bold text-gray-700">Publisher:</label>
            <input type="text" name="publisher" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter publisher name">
        </div>

        <div class="mb-4">
            <label for="year" class="block text-sm font-medium font-bold text-gray-700">Release Year:</label>
            <input type="number" name="year" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter release year">
        </div>

        <div class="mb-4">
            <label for="score" class="block text-sm font-medium font-bold text-gray-700">Metacritic Score:</label>
            <input type="number" name="score" min="1" max="100" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter game score">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Film</button>
        <a href="/videogames" class="text-gray-500 hover:underline mt-4 block">Return</a>
        <input type="hidden" name="type" value="<?= 'videogames' ?>">
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