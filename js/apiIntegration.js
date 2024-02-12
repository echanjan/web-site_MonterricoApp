document.getElementById("contactForm").addEventListener("submit", function (event) {
  event.preventDefault(); // Evitar la presentación del formulario por defecto

  // Obtener datos del formulario
  const formData = new FormData(event.target);
  const formObject = {};
  formData.forEach((value, key) => {
    formObject[key] = value;
  });

  // Preparar datos para la API
  const apiData = {
    number: "51924914258",
    options: {
      delay: 1200,
      presence: "composing",
      linkPreview: false,
    },
    textMessage: {
      text: `Hola, soy ${formObject.nombre} ${formObject.apellido}. Quiero información sobre cómo afiliarme a Monterrico. Mi teléfono es ${formObject.numero}, correo ${formObject.email}, empresa ${formObject.empresa}`,
    },
  };

  // Hacer la solicitud a la API
  fetch("https://yapi.3w.pe/message/sendText/Soporte", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      apikey: "vcgkxsih1jk9zzvf5vgd",
    },
    body: JSON.stringify(apiData),
  })
    .then((response) => response.json())
    .then((data) => {
      // Manejar la respuesta de la API si es necesario
      console.log(data);
      // Mostrar el popup de registro enviado
      mostrarPopup();
    })
    .catch((error) => {
      // Manejar errores
      console.error("Error:", error);
    });
});

function mostrarPopup() {
  const popup = document.getElementById("popupRegistroEnviado");
  const overlay = document.getElementById("overlay");

  // Agregar clases para centrar el contenido
  document.body.classList.add("centered");
  overlay.classList.add("centered");

  // Mostrar el popup y ajustar contenido
  popup.style.display = "block";

  // Agregar un retraso mínimo antes de centrar (puedes ajustar esto según tus necesidades)
  setTimeout(() => {
    popup.classList.add("visible");
  }, 10);

  overlay.style.display = "block";
}

function cerrarPopup() {
const popup = document.getElementById("popupRegistroEnviado");
const overlay = document.getElementById("overlay");

// Quitar clases para centrar el contenido
document.body.classList.remove("centered");
overlay.classList.remove("centered");

popup.style.display = "none";
overlay.style.display = "none";
}
