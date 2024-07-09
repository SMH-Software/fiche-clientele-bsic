const btnAddFormUser = document.querySelector('#addUser')

const formUser = document.querySelector('#form-user')


btnAddFormUser.addEventListener('click', (e) => {
    btnAddFormUser.style.display = 'none'
    formUser.style.display = 'flex'
})