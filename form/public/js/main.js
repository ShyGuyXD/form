
class FormValidator {
    constructor(formId) {
        this.form = document.forms[formId];
        this.init();
    }

    init() {
        this.form.addEventListener("submit", (event) => {
            if (!this.validateForm()) {
                event.preventDefault();
            }
        });
        
        this.form.querySelectorAll('input[type="text"]').forEach(input => {
            input.addEventListener("blur", () => {
                this.validateField(input);
            });
        });
    }

    validateFIO(fio) {
        return /^[А-Яа-яЁё\s]+$/.test(fio);
    }

    validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    validateFIO3words(fio) {
        return (fio.match(/\S+/g) || []).length >= 3;
    }

    validateField(field) {
        let error = "";
        let value = field.value;

        if (field.name === "fio") {
            if (!this.validateFIO(value)) {
                error += "ФИО должно содержать только русские буквы.\n";
            }
            if (!this.validateFIO3words(value)) {
                error += "ФИО должно состоять из трёх слов.\n";
            }
        } else if (field.name === "email") {
            if (!this.validateEmail(value)) {
                error += "Некорректный email.\n"; 
            }
        }

        document.getElementById(field.name + "Error").innerText = error;
    }

    validateForm() {
        let fields = this.form.elements;
        let isValid = true;

        for (let field of fields) {
            if (field.tagName === "INPUT") {
                this.validateField(field);
                if (document.getElementById(field.name + "Error").innerText) {
                    isValid = false;
                }
            }
        }
        return isValid;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    new FormValidator("feedbackForm");
});