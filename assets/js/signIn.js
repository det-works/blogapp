const userField = document.querySelector('#username');
const passField = document.querySelector('#password');

const form = document.querySelector('form');
form.addEventListener('submit', (e)=>{
    const jsonAlert = document.querySelector('#alert');

    e.preventDefault();

    if(jsonAlert)
    {
        jsonAlert.remove();
    }

    sendLoginData({username: userField.value, password: passField.value});

    userField.value = '';
    passField.value = '';
})

async function sendLoginData(data) {
    const response = await fetch('includes/sign-in.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data)
    });
    const respJSON = await response.json();
    if(respJSON['message'] === 'User found.')
    {
        location.reload();
    }
    else
    {
        let jsonAlert = document.createElement('p');
        jsonAlert.innerText = respJSON['message'];
        jsonAlert.setAttribute('id', 'alert');
        form.appendChild(jsonAlert);
    }
}