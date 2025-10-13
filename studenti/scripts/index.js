document.getElementById('search-btn').addEventListener('click', () => {
    const marca = document.getElementById('filter-marca').value;
    const an = document.getElementById('filter-an').value;
    const cars = document.getElementById('car-list').querySelectorAll('.car-card');
    

    cars.forEach(car => {
        const carMarca = car.getAttribute('data-marca');
        const carAn = car.getAttribute('data-an');
        let matches = true;

        if (marca && carMarca !== marca) {
            matches = false;
        }
        if (an && carAn !== an) {
            matches = false;
        }
        
        car.style.display = matches ? 'block' : 'none';
    });
    
    console.log(`Filtrare aplicată: Marca=${marca}, An=${an}. (În productie, s-ar face un apel la API-ul PHP)`);
});