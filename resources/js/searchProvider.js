document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputProvider');
    const dataRows = document.querySelectorAll('#dataBodyProvider tr');
    const noResultsMessage = '<tr><td colspan="3">No data to display</td></tr>';
    let originalTable = ''; // Almacena una copia original de la tabla
    let menuName = document.getElementById('menu');
    let menuId = document.getElementById('idmenu');
    let provId = document.getElementById('idprovider');
    let total = document.getElementById('total');
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

            dataRows.forEach(row => {
              row.classList.remove('selected');
            })
            row.classList.add('selected');
            const trElement = event.target.parentElement;
            menuName.textContent = trElement.getAttribute('data-nameMenu');
            menuId.value = trElement.getAttribute('data-idmenu');
            provId.value = trElement.getAttribute('data-idprovider');
            total.value = trElement.getAttribute('data-cantidad');
        })
    })
  });
