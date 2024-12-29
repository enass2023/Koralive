let controlers = document.querySelectorAll('.sadebar li'),
    sections = document.querySelectorAll('section');

controlers.forEach((el) => {
    el.addEventListener('click', () => {
        console.log(el.className)
        sections.forEach((se) => {
            se.classList.remove('active')
            if (el.className === se.className) {
                se.classList.add('active')
            }

        })

    })
})


let openDeletePopup = document.querySelectorAll('#openDeletePopup'),
    closePopup = document.querySelectorAll('#closePopup'),
    deletePopup = document.querySelector('.popup.deletePopup');



openDeletePopup.forEach((el) => {
    el.onclick = () => {
        deletePopup.style.display = 'block'
    }
})

closePopup.forEach((el) => {
    el.onclick = () => {
        deletePopup.style.display = 'none'

    }
})