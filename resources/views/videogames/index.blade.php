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
    <h1 class="text-3xl font-bold mb-4">Videogames</h1>
    <a href="/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Videogame</a>
    <table class="min-w-full mt-4 bg-white border border-gray-300">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Title</th>
            <th class="py-3 px-6 text-left">Studio</th>
            <th class="py-3 px-6 text-left">Publisher</th>
            <th class="py-3 px-6 text-center">Year</th>
            <th class="py-3 px-6 text-center">Score</th>
            <th class="py-3 px-6 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        <?php if (empty($videogames)): ?>
        <tr>
            <td colspan="5" class="py-3 px-6 text-center">No hi ha pelis disponibles.</td>
        </tr>
        <?php else: ?>
            <?php foreach ($videogames as $videogame): ?>
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6"><?= htmlspecialchars($videogame['name']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($videogame['studio']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($videogame['publisher']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($videogame['year']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($videogame['score']) ?></td>
            <td class="py-3 px-6 text-center">
                <a href="/edit/<?= $videogame['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
                <a href="/show/<?= $videogame['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Show</a>
                <a href="/delete/<?= $videogame['id'] ?>" class="text-red-500 hover:text-red-700 ">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

        </tbody>
    </table>
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