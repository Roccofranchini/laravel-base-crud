const deleteFormElements = document.querySelectorAll(".delete-form");
deleteFormElements.forEach(form => {
    form.addEventListener("submit", function(e) {
        const title = form.getAttribute("data-comic");
        e.preventDefault(); //impedisco che parte il form e che riaggiorna diretto la pagina
        const confirm = window.confirm(
            `Sei sicuro di voler eliminare ${title} ?`
        );
        if (confirm) this.submit();
    });
});
