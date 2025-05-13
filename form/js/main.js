// тут dom
document.addEventListener("DOMContentLoaded", () => {
  const form = document.forms["myForm"];
  form.addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault();
    }
  });
  const fioInput = document.getElementById("fio");
  fioInput.addEventListener("blur", function () {
    validateField(this);
  });
  const emailInput = document.getElementById("email");
  emailInput.addEventListener("blur", function () {
    validateField(this);
  });
  const passwordInput = document.getElementById("password");
  passwordInput.addEventListener("blur", function () {
    validateField(this);
  });
  const showPasswordInput = document.getElementById("showPassword");
  showPasswordInput.addEventListener("click", function () {
    togglePasswordVisibility();
  });
});

function validateFIO(fio) {
  return /^[А-Яа-яЁё\s]+$/.test(fio);
}

function validatePassword(password) {
  return /^(?=.*[A-ZА-ЯЁ])(?=.*[a-zа-яё])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{6,}$/.test(
    password
  );
}

function validateEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validateFIO3words(fio) {
  return (fio.match(/\S+/g) || []).length >= 3;
}

function validateField(field) {
  let error = "";
  let value = field.value;

  switch (field.name) {
    case "fio":
      if (!validateFIO(value)) {
        error += "ФИО должно содержать только русские буквы.\n";
      }
      if (!validateFIO3words(value)) {
        error += "ФИО должно состоять из трёх слов.\n";
      }
      break;
    case "email":
      if (!validateEmail(value)) {
        error += "Некорректный email.\n"; 
      }
      break;
    case "password":
      if (!validatePassword(value)) {
        error +=
          "Пароль должен состоять хотя бы из 6 символов, включать заглавные буквы, цифры и специальные символы.\n";
      }
      break;
  }

  document.getElementById(field.name + "Error").innerText = error;
}

function validateForm() {
  let fields = document.forms["myForm"].elements;
  let isValid = true;
  for (let field of fields) {
    if (field.tagName === "INPUT") {
      validateField(field);
      if (document.getElementById(field.name + "Error").innerText) {
        isValid = false;
      }
    }
  }
  return isValid;
}

function togglePasswordVisibility() {
  const passwordField = document.getElementById("password");
  const checkbox = document.getElementById("showPassword");
  passwordField.type = checkbox.checked ? "text" : "password";
}
