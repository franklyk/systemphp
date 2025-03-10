const dataForm = document.querySelectorAll('[data-form="form"]');


if (dataForm) {
    dataForm.forEach((form) => {
        form.addEventListener('submit', async(e)=> {
            const fieldVerified = document.querySelectorAll('[data-field="field_verified"]');
            fieldVerified.forEach((field) => {
                if(field.value === ''){
                    e.preventDefault();
                    document.getElementById('msg').innerHTML = "<p style='color: #f00;'>Todos os campos devem ser preenchidos!</p>";
                }
            })
        })
    })
}