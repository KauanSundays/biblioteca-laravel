<div id="modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-1/3">
      <h2 class="text-xl font-bold mb-4">Adicionar Livro</h2>
      <form>
        <div class="mb-4">
          <label for="title" class="block text-gray-700">Título</label>
          <input type="text" id="title" class="w-full px-3 py-2 border rounded">
        </div>
        <div class="mb-4">
          <label for="description" class="block text-gray-700">Descrição</label>
          <textarea id="description" class="w-full px-3 py-2 border rounded"></textarea>
        </div>
        <div class="mb-4">
          <label for="imageUrl" class="block text-gray-700">URL da Imagem</label>
          <input type="text" id="imageUrl" class="w-full px-3 py-2 border rounded">
        </div>
        <div class="flex justify-end">
          <button type="button" id="closeModal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
            Cancelar
          </button>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Adicionar
          </button>
        </div>
      </form>
    </div>
  </div>
  