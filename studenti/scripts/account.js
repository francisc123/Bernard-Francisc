document.addEventListener('DOMContentLoaded', () => {
            const openBtn = document.getElementById('openDeleteModal');
            const closeBtn = document.getElementById('closeDeleteModal');
            const cancelBtn = document.getElementById('cancelDeleteModal');
            const modal = document.getElementById('confirmDeleteModal');
            const backdrop = document.getElementById('modalBackdrop');

            function toggleModal(show) {
                modal.style.display = show ? 'block' : 'none';
                backdrop.style.display = show ? 'block' : 'none';
            }

            openBtn.addEventListener('click', () => toggleModal(true));
            closeBtn.addEventListener('click', () => toggleModal(false));
            cancelBtn.addEventListener('click', () => toggleModal(false));
            backdrop.addEventListener('click', () => toggleModal(false));
        });