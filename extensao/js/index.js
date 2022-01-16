document.addEventListener('DOMContentLoaded', function() {
    const btnsEdit = document.querySelectorAll('.btnsEdit')
    const btnsAdd = document.querySelectorAll('.btnsAdd')
    const btnsEditAdd = [...btnsEdit, ...btnsAdd]
    const btnsDelete = document.querySelectorAll('.btnsDelete')
    const btnsShowDetails = document.querySelectorAll('.btnsShowDetails')
    const btnsDeleteShowDetails = [...btnsDelete, ...btnsShowDetails]
    const btnsExit = document.querySelector('.btnsExit')
    const btnsExitDetails = document.querySelector('.btnsExitDetails')
    const form = document.querySelector('#form_edit')
    const showDetailsContainers = document.querySelectorAll('.showDetailsContainer')
    const showDetails = document.querySelector(".showDetails")
    const inputSubmit = document.querySelector(".submit-btn")

    // inputSubmit.addEventListener(('click'), () => {
    //     window.location.href = "index.php"
    //     window.location.reload()
    // })

    btnsEditAdd.forEach((i => {
       i.addEventListener('click', () => {
           form.classList.remove("formInactive")
            if (i.classList.contains("btnsEdit")) {
                inputSubmit.name = "btnEditar"
                inputSubmit.value = "Editar"
            }
            else {
                inputSubmit.name = "btnAdicionar"
                inputSubmit.value = "Adicionar"
            }
       })
    }))

    btnsDeleteShowDetails.forEach((i => {
        i.addEventListener('click', () => {
            let typeBtn
            if (i.classList.contains("btnsDelete")){
                typeBtn = 'delete'
            }
            else {
                typeBtn = 'details'
            }
            let dados = {'action':typeBtn}
			$.post("index.php",dados,function(result, status){
				console.log(status)
				console.log("RESULTADO DO ECHO --> ", result)
			})
        })
    }))


    btnsDelete.forEach((i) => {
        const id = selectDetailsContainer(i, 3).replace(".", "")
        i.addEventListener('click', () => {
            const parent = nthParent(i, 3)
            //const isFormInactive = form.classList.contains("formInactive")
            for(let i = 0; i < showDetailsContainers.length; i++){
                if (showDetailsContainers[i].classList.contains(id)) {
                    showDetailsContainers[i].remove()
                    form.classList.add("formInactive")
                    showDetails.style.display = 'none'
                }
            }
            parent.remove()
        })
    })

    btnsShowDetails.forEach((i) => {
        const containerId = selectDetailsContainer(i, 3)
        i.addEventListener('click', () => {
            showDetailsContainers.forEach((i) => {
                i.classList.add("showDetailsInactive")
            })
            const showDetailsContainer = document.querySelector(containerId)
            showDetails.style.display = 'block'
            btnsExitDetails.style.display = 'block'
            showDetailsContainer.classList.remove("showDetailsInactive")
        })
    })

    btnsExit.addEventListener(('click'), () => {
        form.classList.add("formInactive")
    })

    btnsExitDetails.addEventListener(('click'), () => {
        showDetailsContainers.forEach((i) => {
            i.classList.add("showDetailsInactive")
        })
        btnsExitDetails.style.display = 'none'
        
    })

})




function nthParent(element, n) {
    while(n-- && element){  
        element = element.parentNode;
    }
    return element;
}

function selectDetailsContainer(element, n) {
    const tr = nthParent(element, n)
    const tbody = nthParent(element, ++n)
    const lenChildrenTBody = tbody.children.length
    let containerId = '.showDetailsContainer'
    for (let i = 0; i < lenChildrenTBody; i++) {
        if (tbody.children[i] == tr) {
            return containerId += i
        }
    }
}

