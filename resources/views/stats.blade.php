<x-app-layout>
    <x-page-title>
        Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
    </x-page-title>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Kaart 1 - Blauw -->
            <div class="bg-[#39B9EC] text-white p-6 rounded-lg cursor-pointer dropdown shadow-md font-semibold">
                <div class="flex justify-between items-center">
                    <span>Onderwerp 1</span>
                    <span class="arrow">▼</span>
                </div>
                <div class="dropdown-content hidden mt-4 space-y-2">
                    <a href="#" class="block sub-item hover:underline">Subonderwerp A</a>
                    <a href="#" class="block sub-item hover:underline">Subonderwerp B</a>
                </div>
            </div>

            <!-- Kaart 2 - Roze -->
            <div class="bg-[#E72B76] text-white p-6 rounded-lg cursor-pointer dropdown shadow-md font-semibold">
                <div class="flex justify-between items-center">
                    <span>Onderwerp 2</span>
                    <span class="arrow">▼</span>
                </div>
                <div class="dropdown-content hidden mt-4 space-y-2">
                    <a href="#" class="block sub-item hover:underline">Subonderwerp A</a>
                    <a href="#" class="block sub-item hover:underline">Subonderwerp B</a>
                </div>
            </div>

            <!-- Kaart 3 - Groen -->
            <div class="bg-[#CCD626] text-black p-6 rounded-lg cursor-pointer dropdown shadow-md font-semibold">
                <div class="flex justify-between items-center">
                    <span>Onderwerp 3</span>
                    <span class="arrow">▼</span>
                </div>
                <div class="dropdown-content hidden mt-4 space-y-2">
                    <a href="#" class="block sub-item hover:underline">Subonderwerp A</a>
                    <a href="#" class="block sub-item hover:underline">Subonderwerp B</a>
                </div>
            </div>

            <!-- Kaart 4 - Geel -->
            <div class="bg-[#F2B300] text-black p-6 rounded-lg cursor-pointer dropdown shadow-md font-semibold">
                <div class="flex justify-between items-center">
                    <span>Onderwerp 4</span>
                    <span class="arrow">▼</span>
                </div>
                <div class="dropdown-content hidden mt-4 space-y-2">
                    <a href="#" class="block sub-item hover:underline">Subonderwerp A</a>
                    <a href="#" class="block sub-item hover:underline">Subonderwerp B</a>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.addEventListener('click', () => {
                const content = dropdown.querySelector('.dropdown-content');
                const arrow = dropdown.querySelector('.arrow');

                // Sluit alle andere dropdowns
                document.querySelectorAll('.dropdown-content').forEach(c => {
                    if (c !== content) {
                        c.classList.add('hidden');
                        c.closest('.dropdown').querySelector('.arrow').textContent = '▼';
                    }
                });

                // Toggle huidige
                content.classList.toggle('hidden');
                arrow.textContent = content.classList.contains('hidden') ? '▼' : '▲';
            });
        });

        // Subitems blijven open
        document.querySelectorAll('.dropdown-content .sub-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopPropagation(); // dropdown blijft open
                console.log("Doorlink naar:", e.target.getAttribute("href"));
            });
        });
    </script>
</x-app-layout>
