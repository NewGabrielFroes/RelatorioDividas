document.addEventListener('DOMContentLoaded', function() {
    const btnsEditAdd = document.querySelectorAll('.btnsEditAdd')
    btnsEditAdd.forEach((i => {
        i.addEventListener('click', function() {
            const form = document.querySelector('#form_edit')
            form.classList.toggle("formInactive")
        })
    }))
})
