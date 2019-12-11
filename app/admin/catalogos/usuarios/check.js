
let emailSelect = document.getElementById("email");
document.getElementById("nameSpace").textContent = employees[0][1];
document.getElementById("lastnameSpace").textContent = employees[0][2];
emailSelect.addEventListener("change",addUserInfo);

function addUserInfo(e){
    let index = (e.target.options.selectedIndex);
    for(let i = 0; i < employees.length; i ++){
        // console.log(employees[i][0]);
        if(i == index){
            document.getElementById("nameSpace").textContent = employees[i][1];
            document.getElementById("lastnameSpace").textContent = employees[i][2];
        }


    }
}

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
        if(inputs[i].value == ""){
            inputs[i].style.border = "solid 1px red";
        }
    }
    console.log(inputs);
    if(rpassword.value ==""||password.value =="" || password != rpassword){
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
    }
    
    
    else{
        return false;
    }

}