const btnAddFormSaisie = document.querySelector('#addSaisie')

const formSaisie = document.querySelector('#form-saisie')


btnAddFormSaisie.addEventListener('click', (e) => {
    btnAddFormSaisie.style.display = 'none'
    formSaisie.style.display = 'flex'
})