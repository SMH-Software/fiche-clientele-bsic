const btnAddFormProfil = document.querySelector('#addProfil')

const formProfil = document.querySelector('#form-profil')


btnAddFormProfil.addEventListener('click', (e) => {
    btnAddFormProfil.style.display = 'none'
    formProfil.style.display = 'flex'
})

