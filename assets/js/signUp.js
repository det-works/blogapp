const emailField = document.querySelector('#email');
const userField = document.querySelector('#username');
const passField = document.querySelector('#password');

const form = document.querySelector('form');
form.addEventListener('submit', (e)=>{
    e.preventDefault();

    sendLoginData({username: userField.value, password: passField.value, email: emailField.value});

    userField.value = '';
    passField.value = '';
    emailField.value = '';
})

async function sendLoginData(data) {
    const response = await fetch('includes/sign-up.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data)
    });
    return response.json();
}