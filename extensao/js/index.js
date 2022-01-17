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

