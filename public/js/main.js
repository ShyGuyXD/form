document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("feedbackForm");
  const messagesList = document.getElementById("messagesList");
  const responseDiv = document.getElementById("response");
  const noPatronymicCheckbox = document.getElementById("noPatronymic");
  const fioInput = document.getElementById("fio");
  const messageInput = document.getElementById("message");

  noPatronymicCheckbox.addEventListener("change", function () {
    if (this.checked) {
      fioInput.placeholder = "Фамилия Имя";
    } else { 
      fioInput.placeholder = "ФИО";
    }
  });

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(form);
    const noPatronymic = noPatronymicCheckbox.checked;
    formData.append("noPatronymic", noPatronymic);

    for (let [key, value] of formData.entries()) {
      console.log(`${key}: ${value}`);
    }

    fetch("/submit_form", {
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
          loadMessages(formData.get("email"));

          messageInput.value = "";
        }
      })
      .catch((error) => {
        responseDiv.innerHTML = "Произошла ошибка: " + error.message;
      });
  });

  function loadMessages(email) {
    fetch(`/get_messages?email=${encodeURIComponent(email)}`, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Ошибка при загрузке сообщений.");
        }
        return response.json();
      })
      .then((messages) => {
        messagesList.innerHTML = "";
        messages.forEach(({ fio, message }) => {
          addMessageToHistory(fio, email, message);
        });
      })
      .catch((error) => {
        console.error(error);
      });
  }

  function addMessageToHistory(fio, email, message) {
    const messageDiv = document.createElement("div");
    messageDiv.classList.add("message");
    messageDiv.innerHTML = `<strong>${fio} (${email}):</strong> ${message}`;
    messagesList.appendChild(messageDiv);
  }
});
