
const btnSubmit = document.getElementById('submit');
const form = document.querySelector('.form-prevent-multiple-click');

form.addEventListener('submit', () => {
    console.log('send form');
    btnSubmit.setAttribute('disabled', '');
    // setTimeout(() => {
    //     btnSubmit.removeAttribute('disabled');
    // }, 3000)
})

