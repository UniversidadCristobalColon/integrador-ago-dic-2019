
let password = (document.querySelector("#password"));
let rpassword = (document.querySelector("#rpassword"));

password.addEventListener("keydown",writed);
rpassword.addEventListener("keydown",writed);

function writed(e){
    e.target.style.border = "1px solid #ced4da";
}

function checked(){
    
    let inputs = document.querySelectorAll("input");
    for(let i = 0; i < inputs.length; i ++){
        if(rpassword.value ==""||password.value =="" || password != rpassword || password.value.length <6){
            inputs[i].style.border = "solid 1px red";
        }else{
            inputs[i].style.border = "none";
        }
    }
    console.log(password.value.length);
    if(rpassword.value ==""||password.value =="" || password != rpassword || password.value.length <6){
        if(rpassword.value ==""||password.value ==""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Llena todos los espacios',
          })
        return false;
        }
        if(rpassword.value != password.value){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Las contraseñas no coinciden',
              })
            return false;
            }
        if(rpassword.value.length < 6){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Contraseña muy corta (mínimo 6 caracteres)',
              })
            return false;
            }
    }
    
    
    else{
        return false;
    }

}