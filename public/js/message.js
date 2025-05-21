class MessageHandler {
    constructor(formId) {
        this.form = document.getElementById(formId);
        this.history = []; 
        this.init();
    }

    init() {
        this.form.addEventListener('submit', (event) => {
            event.preventDefault();
            this.sendMessage();
        });
    }

    updateMessagesList(fio, email, messageText) {
        const messagesList = document.getElementById("messagesList");
        const newMessageItem = document.createElement("div");
        newMessageItem.textContent = `${fio} (${email}) : ${messageText}`; 
        messagesList.appendChild(newMessageItem);

        
        this.history.push({ fio, email, message: messageText });
        console.log("История сообщений:", this.history); 
    }

    sendMessage() {
        const formData = new FormData(this.form);
        fetch('../private/functions/validator.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('response').innerText = data; 
            if (data.includes("Данные успешно сохранены!")) {
                const fioText = document.getElementById("fio").value;
                const emailText = document.getElementById("email").value;
                const messageText = document.getElementById("message").value;

                document.getElementById("message").value = '';
                this.updateMessagesList(fioText, emailText, messageText);
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new MessageHandler('feedbackForm');
});