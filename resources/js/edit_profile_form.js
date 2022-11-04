// Intercettiamo tramite l'id il form per editare i dettagli del medico
const submitEditProfileForm = document.getElementById("submit-edit-profile");

// Intercettiamo tramite l'id il form per editare le credenziali del medico
const submitEditCredentialsForm = document.getElementById(
    "submit-edit-credentials"
);

// Prendiamo il tag password e palliniamolo
const password = document.getElementById("password");
password.type = "password";

// Definiamo l'addEventListener al submit del form di editing del profilo
submitEditProfileForm.addEventListener("submit", (event) => {
    // Intercettiamo il submit del form
    event.preventDefault();

    // Verifichiamo che il medico confermi le modifiche
    const hasConfirmed = confirm(
        "Sei sicuro di voler modificare le tue informazioni personali?"
    );

    // Dovesse con fermare inviamo il form
    if (hasConfirmed) submitEditProfileForm.submit();
});

// Definiamo l'addEventListener al submit del form di editing delle credenziali del medico
submitEditCredentialsForm.addEventListener("submit", (event) => {
    // Intercettiamo il submit del form
    event.preventDefault();

    // Verifichiamo che il medico confermi le modifiche
    const hasConfirmed = confirm(
        "Sei sicuro di voler modificare le tue credenziali?"
    );

    // Dovesse con fermare inviamo il form
    if (hasConfirmed) submitEditCredentialsForm.submit();
});

const preview = document.getElementById("image");
const imageField = document.getElementById("thumb");

if (imageField !== null) {
    imageField.addEventListener("input", () => {
        preview.src = imageField.value;
    });
}
