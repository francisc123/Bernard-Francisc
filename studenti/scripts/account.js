const openModalBtn = document.getElementById('openDeleteModal');
        const closeModalBtn = document.getElementById('closeDeleteModal');
        const cancelModalBtn = document.getElementById('cancelDeleteModal');
        const modal = document.getElementById('confirmDeleteModal');
        const backdrop = document.getElementById('modalBackdrop');

        function openModal() {
            modal.style.display = 'block';
            backdrop.style.display = 'block';
        }

        function closeModal() {
            modal.style.display = 'none';
            backdrop.style.display = 'none';
        }

        openModalBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);
        cancelModalBtn.addEventListener('click', closeModal);
        backdrop.addEventListener('click', closeModal); // Închide la click în afara modalului