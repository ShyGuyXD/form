document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("feedbackForm");
  const messagesList = document.getElementById("messagesList");
  const responseDiv = document.getElementById("response");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(form);

    fetch("http://localhost/api/submit-form", {
      method: "POST",
      body: JSON.stringify(Object.fromEntries(formData)),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        if (data.errors) {
          responseDiv.innerHTML = data.errors.join("<br>");
        } else {
          responseDiv.innerHTML = data.message;
          addMessageToHistory(
            formData.get("fio"),
            formData.get("email"),
            formData.get("message")
          );
          form.reset();
          document.getElementById("fio").value = formData.get("fio");
          document.getElementById("email").value = formData.get("email");
        }
      })
      .catch((error) => {
        responseDiv.innerHTML = "Произошла ошибка: " + error.message;
      });
  });

  function addMessageToHistory(fio, email, message) {
    const messageDiv = document.createElement("div");
    messageDiv.classList.add("message");
    messageDiv.innerHTML = `<strong>${fio} (${email}):</strong> ${message}`;
    messagesList.appendChild(messageDiv);
  }
});
