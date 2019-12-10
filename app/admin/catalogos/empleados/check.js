
let nombre = (document.querySelector("#name"));
let apellido = (document.querySelector("#lastname"));
let email = (document.querySelector("#email"));

nombre.addEventListener("keydown",writed);
apellido.addEventListener("keydown",writed);
email.addEventListener("keydown",writed);

function writed(e){
    e.target.style.border = "1px solid #ced4da";
}

function checked(){
    
    let inputs = document.querySelectorAll("input");
    for(let i = 0; i < inputs.length; i ++){
        if(inputs[i].value == ""){
            inputs[i].style.border = "solid 1px red";
        }
    }
    console.log(inputs);

    console.log(nombre);
    console.log(apellido);
    console.log(email);
    if(nombre.value ==""||apellido.value ==""||email.value ==""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Llena todos los espacios',
          })
        return false;
    }else{
        return true;
    }

}