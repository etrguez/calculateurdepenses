
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const amountInput = document.querySelector("#amount");
    const dateInput = document.querySelector("#date");

    form.addEventListener("submit", function(event) {
        if (parseFloat(amountInput.value) <= 0) {
            alert("Le montant doit être supérieur à zéro.");
            event.preventDefault(); 
        }
     
        if (!dateInput.value) {
            alert("La date est obligatoire.");
            event.preventDefault(); 
        }
    });
});


// supprimer une depense 
document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll(".btn-delete");

    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            const expenseId = this.getAttribute("data-id");

            fetch('../public/supprimer_depense.php?id=' + expenseId, { 
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Dépense supprimée avec succès');
                    this.closest('tr').remove(); 
                } else {
                    alert('Erreur lors de la suppression');
                }
            })
            .catch(error => alert('Erreur: ' + error));
        });
    });
});
