document.addEventListener("DOMContentLoaded", () => {
    // Consulta al backend
    fetch("php/api.php")
    .then(response => response.json())
    .then(json => console.table(json));
});