$(document).ready(function() {
    $(".add-to-cart").click(function() {
        var productId = $(this).data("product-id");
        var $image = $(this);

        // Animation au clic
        $image.animate({
            width: '80%',
            height: '80%'
        }, 150, function() {
            // Effectuer l'ajout au panier
            $.ajax({
                type: "POST",
                url: "add_to_cart.php",
                data: {
                    product_id: productId
                },
                success: function(response) {
                    // Mettre à jour le nombre d'articles dans le panier
                    $(".cart-items-count").text(response);

                    // Animation de retour à la taille d'origine
                    $image.animate({
                        width: '100%',
                        height: '100%'
                    }, 150);
                }
            });
        });
    });
});





function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    const results = regex.exec(window.location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}


// Fonction pour mettre à jour les produits filtrés via AJAX
function updateFilteredProducts(minValue = 100, maxValue = 10000, selectedBrands) {
    const category = getUrlParameter('category'); // Récupérez la catégorie depuis l'URL
    const type = getUrlParameter('type'); // Récupérez le type depuis l'URL

    const xhr = new XMLHttpRequest();
    xhr.open('GET',
        `produits.php?min=${minValue}&max=${maxValue}&category=${category}&type=${type}&brands=${selectedBrands}`,
        true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            const products_ = document.getElementById('products_');
            products_.innerHTML = xhr.responseText;
        }
    };

    xhr.send();
}


document.addEventListener('DOMContentLoaded', function() {
    const imageContainers = document.querySelectorAll('.image-container');

    imageContainers.forEach(function(container) {
        const image = container.querySelector('img');

        container.addEventListener('mouseover', function() {
            image.classList.add('zoom-image');
        });

        container.addEventListener('mouseout', function() {
            image.classList.remove('zoom-image');
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const typeInput = document.getElementById('type-input');
    const suggestionsDatalist = document.getElementById('suggestions');
    
    typeInput.addEventListener('input', function() {
        const userInput = typeInput.value;

        // Envoyer une requête au serveur pour obtenir les suggestions
        fetch('obtenir_suggestions.php') // Le chemin vers votre script PHP
            .then(response => response.json())
            .then(data => {
                const filteredSuggestions = data.filter(suggestion =>
                    suggestion.type_categorie.toLowerCase().includes(userInput
                        .toLowerCase()) ||
                    suggestion.name.toLowerCase().includes(userInput.toLowerCase())
                );

                // Remplacer le contenu du datalist avec les suggestions filtrées
                suggestionsDatalist.innerHTML = '';
                filteredSuggestions.forEach(suggestion => {
                    const option = document.createElement('option');
                    option.value = suggestion.type_categorie + '  ' + suggestion
                        .name;
                    suggestionsDatalist.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des suggestions', error);
            });
    });
});


$(document).ready(function() {
    $(".remove-from-cart").click(function() {
        var productId = $(this).data("product-id");
        var rowToRemove = $(this).closest("tr"); // Obtenez la ligne du tableau à supprimer
        $.ajax({
            type: "POST",
            url: "suppression_panier.php", // Remplacez par l'URL de votre script PHP
            data: {
                product_id: productId
            },
            success: function(response) {
                // En supposant que votre script PHP renvoie du JSON avec le prix total mis à jour
                var responseData = JSON.parse(response);
                var updatedTotal = responseData.totalPrice;

                // Mettez à jour le prix total dans la balise <b>
                $("div b").text("$" + updatedTotal);

                // Supprimez la ligne du tableau correspondante
                rowToRemove.remove();
            }
        });
    });
});




$(document).ready(function() {
    $(".quantity-input").change(function() {
        var productId = $(this).data("product-id");
        var newQuantity = $(this).val();
        var row = $(this).closest("tr");
        var price = parseFloat(row.find("td:nth-child(2)").text());

        $.ajax({
            type: "POST",
            url: "quantite_modifier.php", // Remplacez par l'URL de votre script PHP de mise à jour de la quantité
            data: {
                product_id: productId,
                quantity: newQuantity
            },
            success: function(response) {
                var responseData = JSON.parse(response);
                var updatedSubtotal = price * newQuantity;
                var updatedTotal = responseData.totalPrice;

                row.find(".subtotal").text(updatedSubtotal);
                $("div b").text("$" + updatedTotal);

            }
        });
    });

    // Reste du code pour la suppression...
});
