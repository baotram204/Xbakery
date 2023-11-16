document.addEventListener("DOMContentLoaded", function() {
    const descriptionButton = document.querySelector('[data-bs-target="#descriptionCollapse"]');
    const ingredientsButton = document.querySelector('[data-bs-target="#ingredientsCollapse"]');

    if (descriptionButton && ingredientsButton) {
        descriptionButton.addEventListener('click', function() {
            const descriptionCollapse = new bootstrap.Collapse(document.querySelector('#descriptionCollapse'));
            const ingredientsCollapse = bootstrap.Collapse.getInstance(document.querySelector('#ingredientsCollapse'));

            descriptionCollapse.toggle();
            if (ingredientsCollapse && ingredientsCollapse._isShown) {
                ingredientsCollapse.hide();
            }
        });

        ingredientsButton.addEventListener('click', function() {
            const descriptionCollapse = bootstrap.Collapse.getInstance(document.querySelector('#descriptionCollapse'));
            const ingredientsCollapse = new bootstrap.Collapse(document.querySelector('#ingredientsCollapse'));

            ingredientsCollapse.toggle();
            if (descriptionCollapse && descriptionCollapse._isShown) {
                descriptionCollapse.hide();
            }
        });
    }
});
