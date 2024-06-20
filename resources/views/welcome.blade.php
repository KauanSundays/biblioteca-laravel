<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Biblioteca</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen flex flex-col">
  <header class="bg-blue-600 text-white text-center py-4">
    <h1 class="text-2xl font-bold">Biblioteca</h1>
  </header>
  <div class="flex justify-end p-4">
    <a href="{{ route('books.favorites') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
      Favoritos
    </a>
  </div>  
  
  <main class="flex-grow p-4">
    <div class="bg-white p-6 rounded shadow">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($books as $book)
          <div class="bg-gray-100 p-4 rounded shadow-sm">
            <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full h-auto max-h-48 object-cover mb-4">
            <h3 class="font-bold">{{ $book->title }}</h3>
            <p>{{ $book->description }}</p>
            <button class="favorite-button text-red-500" data-book-id="{{ $book->id }}" data-favorite="{{ $book->is_favorite ? 'true' : 'false' }}">
              <i class="{{ $book->is_favorite ? 'bi bi-heart-fill' : 'bi bi-heart' }}"></i>
            </button>            
            <button class="delete-button text-red-500" data-book-id="{{ $book->id }}">
              <i class="bi bi-trash"></i>            
            </button>            
          </div>
        @endforeach
      </div>
    </div>
  </main>
  
  <div class="flex justify-end p-4">
    <button id="addButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
      Adicionar
    </button>
  </div>

  @include('modal')
  @include('modal-excluir')

  <script>
    document.querySelectorAll('.favorite-button').forEach(button => {
        button.addEventListener('click', function() {
            const bookId = this.getAttribute('data-book-id');
            const isFavorite = this.getAttribute('data-favorite') === 'true';

            // Lógica para favoritar/desfavoritar o livro aqui
            fetch(`/books/${bookId}/toggle-favorite`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    is_favorite: !isFavorite
                })
            })
            .then(response => {
                if (response.ok) {
                    this.setAttribute('data-favorite', (!isFavorite).toString());

                    const icon = this.querySelector('i');
                    if (isFavorite) {
                        icon.classList.remove('bi-heart-fill');
                        icon.classList.add('bi-heart');
                    } else {
                        icon.classList.remove('bi-heart');
                        icon.classList.add('bi-heart-fill');
                    }
                }
            })
            .catch(error => console.error('Erro ao atualizar favorito:', error));
        });
    });

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const bookId = this.getAttribute('data-book-id');

            // Abrir modal de exclusão
            document.getElementById('modal-excluir').classList.remove('hidden');

            // Configurar ação de exclusão no formulário
            const form = document.getElementById('form-excluir');
            form.action = `/books/${bookId}/delete`;

            // Cancelar ação padrão de clicar no botão
            return false;
        });
    });

    document.getElementById('addButton').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });

    document.getElementById('cancelarExclusao').addEventListener('click', function() {
        document.getElementById('modal-excluir').classList.add('hidden');
    });
  </script>
</body>
</html>
