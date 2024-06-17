document.addEventListener("DOMContentLoaded", () => {
	// Consulta al backend
	fetch("php/api.php")
	.then(response => response.json())
	.then(json => {
		// Busco el tbody
		const tbody = document.querySelector("tbody");
		// Creo un tr por cada entrada del JSON y cargo los datos
		json.forEach((row, i) => {
			// Creo el tr y appendeo el index
			const tr = document.createElement("tr");
			const td = document.createElement("td");
			td.innerText = i;
			tr.append(td);
			// Creo un td por cada campo de la entrada
			for(let field in row) {
				const td = document.createElement("td");
				td.innerText = row[field];
				tr.append(td);
			}
			// Appendeo el tr al tbody
			tbody.append(tr);
		});
	});
});
