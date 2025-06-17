var overlay = document.getElementById("overlay");
var modal = document.getElementById("addModal");
var editModal = document.getElementById("editModal");

function addNewFunc(){
    modal.classList.toggle("active");
    overlay.classList.toggle("active");
}

function escape(){
    modal.classList.remove("active");
    overlay.classList.remove("active");
    editModal.classList.remove("active");
}

function openEdit(id){
    document.getElementById("editId").value = id;
    editModal.classList.toggle("active");
    overlay.classList.toggle("active");
}
