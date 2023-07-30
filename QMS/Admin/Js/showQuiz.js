function searchByName() {
    console.log("yes");
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInputTop");
    console.log(input.value);
    filter = input.value.toUpperCase();
    table = document.getElementById("quizTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those that don't match the search query
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


function searchTable(columnIndex) {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput" + columnIndex);
    filter = input.value.toUpperCase();
    table = document.getElementById("quizTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those that don't match the search query
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[columnIndex];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}