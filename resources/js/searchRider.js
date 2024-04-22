document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputRider');
    const dataRows = document.querySelectorAll('#dataBodyRider tr');
    const noResultsMessage = '<tr><td colspan="3">No data to display</td></tr>';
    let originalTable = ''; // Almacena una copia original de la tabla
    let riderName = document.getElementById('rider');
    let riderId = document.getElementById('idrider');
    let hasResults = false;

    // Función para restaurar la tabla original
    function restoreOriginalTable() {
      dataRows.forEach(row => row.style.display = '');
    }

    // Manejar el evento de entrada en el campo de búsqueda
    if(searchInput != null){
        searchInput.addEventListener('input', function() {
            const searchText = searchInput.value.trim().toLowerCase();
      
            // Si la tabla original aún no se ha guardado, guardarla
            if (!originalTable) {
              originalTable = Array.from(dataRows).map(row => row.outerHTML).join('');
            }
      
            // Filtrar las filas de la tabla y actualizar la tabla
            if (searchText) {
                restoreOriginalTable();
                hasResults = false;
                dataRows.forEach(row => {
                    const rowData = row.children[0].textContent.trim().toLowerCase();
                    if (rowData.includes(searchText)) {
                    row.style.display = '';
                    hasResults = true;
                    } else {
                    row.style.display = 'none';
                    }
                });
      
            } else {
              // Si el campo de búsqueda está vacío, restaurar la tabla original
              hasResults = true;
              restoreOriginalTable();
            }
        });
    }
    

    dataRows.forEach(row => {
        row.addEventListener('click',(event) => {

            const trElement = event.target.parentElement;
            riderName.textContent = trElement.getAttribute('data-nameRider');
            riderId.value = trElement.getAttribute('data-idRider');
        })
    })

  });
