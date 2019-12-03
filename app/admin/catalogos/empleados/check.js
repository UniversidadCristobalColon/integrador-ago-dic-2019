function checked(){
    let nombre = (document.querySelector("#name")).value;
    let apellido = (document.querySelector("#lastname")).value;
    let email = (document.querySelector("#email")).value;
    
    console.log(nombre);
    console.log(apellido);
    console.log(email);
    if(nombre==""||apellido==""||email==""){
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