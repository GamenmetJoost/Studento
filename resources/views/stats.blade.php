<x-app-layout>
    <x-page-title>
        Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
    </x-page-title>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Kaart 1 -->
            <div class="bg-gray-700 p-6 rounded-lg cursor-pointer dropdown">
                <div class="flex justify-between items-center dropdown-toggle">
                    <span>Onderwerp 1</span>
                    <span class="arrow">▼</span>
                </div>
                <div class="dropdown-content hidden mt-4 space-y-2">
                    <p>Subonderwerp A</p>
                    <p>Subonderwerp B</p>
                </div>
            </div>

            <!-- Kaart 2 -->
            <div class="bg-gray-700 p-6 rounded-lg cursor-pointer dropdown">
                <div class="flex justify-between items-center dropdown-toggle">
                    <span>Onderwerp 2</span>
                    <span class="arrow">▼</span>
                </div>
                <div class="dropdown-content hidden mt-4 space-y-2">
                    <p>Subonderwerp A</p>
                    <p>Subonderwerp B</p>
                </div>
            </div>

            <!-- Kaart 3 -->
            <div class="bg-gray-700 p-6 rounded-lg cursor-pointer dropdown">
                <div class="flex justify-between items-center dropdown-toggle">
                    <span>Onderwerp 3</span>
                    <span class="arrow">▼</span>
                </div>
                <div class="dropdown-content hidden mt-4 space-y-2">
                    <p>Subonderwerp A</p>
                    <p>Subonderwerp B</p>
                </div>
            </div>

            <!-- Kaart 4 -->
            <div class="bg-gray-700 p-6 rounded-lg cursor-pointer dropdown">
                <div class="flex justify-between items-center dropdown-toggle">
                    <span>Onderwerp 4</span>
                    <span class="arrow">▼</span>
                </div>
                <div class="dropdown-content hidden mt-4 space-y-2">
                    <p>Subonderwerp A</p>
                    <p>Subonderwerp B</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                const dropdown = toggle.closest('.dropdown'); 
                const content = dropdown.querySelector('.dropdown-content');
                const arrow = toggle.querySelector('.arrow');

                // Sluit alle andere dropdowns
                document.querySelectorAll('.dropdown-content').forEach(c => {
                    if (c !== content) {
                        c.classList.add('hidden');
                        c.previousElementSibling.querySelector('.arrow').textContent = '▼';
                    }
                });

                // Toggle alleen de huidige
                content.classList.toggle('hidden');
                arrow.textContent = content.classList.contains('hidden') ? '▼' : '▲';
            });
        });
    </script>
</x-app-layout>
