function openModal() {
    document.getElementById('Model').style.displayv = 'block';
}

function closeModal() {
    document.getElementById('Modal').style.display = 'none';
}

window.addEventListener('click', function (event) {
    const modal = document.getElementById('Modal');
    if(event.target === modal){
        closeModal();
    }
});