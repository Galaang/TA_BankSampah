window.onscroll = function () {
    const header = document.querySelector('header');
    const fixednav = header.offsetTop;
    const arrow = document.querySelector('#arrow');

    if (window.pageYOffset > fixednav) {
        header.classList.add('nav-fixed');
        arrow.classList.remove('hidden');
        arrow.classList.add('flex');
    } else {
        header.classList.remove('nav-fixed');
        arrow.classList.add('hidden');
        arrow.classList.remove('flex');
    }
}


const cardContainer = document.getElementById('cardContainer');
    const addCardButton = document.getElementById('addCardButton');

    let cardCount = 0;

    addCardButton.addEventListener('click', function() {
    cardCount++;

    const newCard = document.createElement('div');
    newCard.classList.add('mt-8',);
    
      // Konten card
        newCard.innerHTML = `
        <div class="flex justify-end items-center z-[9999] mt-10">
        <button id="deleteButton${cardCount}" class=""><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm5.757-1a1 1 0 1 0 0 2h8.486a1 1 0 1 0 0-2H7.757Z" clip-rule="evenodd"/>
        </svg></button>
        </div>

        <div class="mb-4">
        <label for="jenis_sampah" class="block mb-2 text-sm font-bold text-gray-700">Jenis Sampah:</label>
        <select class="w-full rounded form-control" name="select" id="select">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
        </select>
        </div>

        <div class="mb-4">
        <label for="item_name" class="block mb-2 text-sm font-bold text-gray-700">Nama Sampah:</label>
        <select class="w-full rounded form-control" name="select" id="select">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
        </select>
        </div>

        <div class="mb-4">
        <label for="weight" class="block mb-2 text-sm font-bold text-gray-700">Berat:</label>
        <input type="text" name="weight" id="weight" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
        <label for="weight" class="block mb-2 text-sm font-bold text-gray-700">Harga:</label>
        <input type="text" name="weight" id="weight" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>
        
    `;

    cardContainer.appendChild(newCard);

    // Menambah event listener untuk tombol hapus
    const deleteButton = newCard.querySelector(`#deleteButton${cardCount}`);
    deleteButton.addEventListener('click', function() {
    newCard.remove();
    });
    });
