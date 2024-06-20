<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Biblioteca</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 min-h-screen flex flex-col">
  <header class="bg-blue-600 text-white text-center py-4">
    <h1 class="text-2xl font-bold">Biblioteca</h1>
  </header>
  
  <main class="flex-grow p-4">
    <div class="bg-white p-6 rounded shadow">
      <h2 class="text-xl font-semibold mb-4">Livros Cadastrados</h2>
      <ul class="space-y-2">
        @foreach($books as $book)
          <li class="bg-gray-100 p-4 rounded shadow-sm">
            <h3 class="font-bold">{{ $book->title }}</h3>
            <p>{{ $book->description }}</p>
            <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="mt-2">
          </li>
        @endforeach
      </ul>
    </div>
  </main>
  
  <div class="flex justify-end p-4">
    <button id="addButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
      Adicionar
    </button>
  </div>

  @include('modal')

  <script>
    document.getElementById('addButton').addEventListener('click', function() {
      document.getElementById('modal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('modal').classList.add('hidden');
    });
  </script>
</body>
</html>
