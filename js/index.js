document.addEventListener('DOMContentLoaded', function() {
    const btnsEditAdd = document.querySelectorAll('.btnsEditAdd')
    const btnsDelete = document.querySelectorAll('.btnsDelete')
    const btnsShowDetails = document.querySelectorAll('.btnsShowDetails')
    const btnsExit = document.querySelector('.btnsExit')
    const form = document.querySelector('#form_edit')
    const showDetailsContainer = document.querySelectorAll('.showDetailsContainer')
    

    btnsEditAdd.forEach((i => {
        i.addEventListener('click', () => {
            form.classList.remove("formInactive")
        })
    }))

    btnsDelete.forEach((i) => {
        i.addEventListener('click', () => {
            const parent = nthParent(i, 3)
            const isFormInactive = form.classList.contains("formInactive")
            let isShowDetailsInactive = true
            for(let i = 0; i < showDetailsContainer.length; i++){
                if (!showDetailsContainer[i].classList.contains("showDetailsInactive")){
                    isShowDetailsInactive = false
                }
            }

            console.log(isShowDetailsInactive)

            if (isFormInactive && isShowDetailsInactive) {
                parent.remove()
            }
            else {
                alert("Você NÃO pode apagar enquanto estiver editando, adicionando ou vendo os detalhes de uma dívida.")
            }
        })
    })

    btnsShowDetails.forEach((i) => {
        const tr = nthParent(i, 3)
        const tbody = nthParent(i, 4)
        const lenChildrenTBody = tbody.children.length
        let containerId = '.showDetailsContainer'
        for (let i = 0; i < lenChildrenTBody; i++) {
            if (tbody.children[i] == tr) {
                containerId+= i
                break
            }
        }
        i.addEventListener('click', () => {
            console.log(containerId)
            const showDetailsContainer = document.querySelector(containerId)
            showDetailsContainer.classList.toggle("showDetailsInactive")
        })
    })

    btnsExit.addEventListener(('click'), () => {
        form.classList.add("formInactive")
    })


})

function nthParent(element, n) {
    while(n-- && element){  
        element = element.parentNode;
    }
    return element;
}

