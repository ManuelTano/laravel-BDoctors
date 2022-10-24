// Intercettiamo tramite l'id il form per editare i dettagli del medico
const submitEditProfileForm = document.getElementById("submit-edit-profile");
const submitEditCredentialsForm = document.getElementById(
    "submit-edit-credentials"
);

// Definiamo l'addEventListener al submit del form di editing del profilo
submitEditProfileForm.addEventListener("submit", (event) => {
    // Intercettiamo il submit del form
    event.preventDefault();

    // Verifichiamo che il medico confermi le modifiche
    const hasConfirmed = confirm("Sei sicuro di voler inviare il form?");

    // Dovesse con fermare inviamo il form
    if (hasConfirmed) submitEditProfileForm.submit();
});
