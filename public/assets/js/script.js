
var int;
function setInt() {
    clearInterval(int);
    int = setInterval(function () {
        var btns = document.getElementsByName("carousel");
        for (var i = 0; i < btns.length; i++) {
            if (btns[i].checked) {
                btns[i].checked = false;
                if (i + 1 == btns.length) {
                    btns[0].checked = true;
                }
                else {
                    btns[i + 1].checked = true;
                }
                return;
            }
        }
    }, 4000);
}
setInt();
if (document.getElementById('date') !== null) {

    document.getElementById('date').innerHTML = new Date().toLocaleDateString();
}


const sign_in_btn = document.querySelector("#sign_in_btn");
const sign_up_btn = document.querySelector("#sign_up_btn");
const container = document.querySelector(".contener");

sign_up_btn.addEventListener("click", function () {
    container.classList.add("sign_up_mode");
});
sign_in_btn.addEventListener("click", function () {
    container.classList.remove("sign_up_mode");
});




let popupBook = document.getElementById('popup-book'),
    openPopupBook = document.getElementById('openPopupBook'),
    closePopupBook = document.getElementById('clodePopupBook');

openPopupBook.onclick = () => {
    popupBook.style.display = "block";
    popups.style.display = 'none';
}
closePopupBook.onclick = () => {
    popupBook.style.display = "none";
}

// !
let total = document.getElementById('total'),
    available = document.getElementById('available'),
    result = document.getElementById('result');

if (Number(total.innerHTML) >= Number(available.innerHTML)) {
    result.innerHTML = `<div class='result result-check'>
        <i class='bx bx-check'></i>  
        <h3>${Number(total.innerHTML) - Number(available.innerHTML)} seats available</h3>
        </div>`
}
else {
    result.innerHTML = `<div class='result result-x'>
    <i  class="bx bx-x"></i> 
    <h3>There are no seats available</h3>
    </div>`
}


