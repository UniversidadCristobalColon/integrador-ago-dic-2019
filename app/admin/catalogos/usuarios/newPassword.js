let inputPassword = document.getElementById("newpassword");
document.getElementById("newpassword").addEventListener("change", newPassword);
console.log(inputPassword);


function newPassword(e){
    let state = (e.target.checked);
    if(state === true){
        console.log("verdadero");
        let divPwd = document.createElement("div");
        let labPwd = document.createElement("label");
        let inpPwd = document.createElement("input");

        let divRpwd = document.createElement("div");
        let labRpwd = document.createElement("label");
        let inpRpwd = document.createElement("input");

        divPwd.setAttribute("class","form-group stated");
        divRpwd.setAttribute("class","form-group stated");

        labPwd.setAttribute("for","password");
        labPwd.textContent = "Contraseña";
        labRpwd.setAttribute("for","rpassword");
        labRpwd.textContent = "Repite Contraseña";

        inpPwd.type = "password";
        inpPwd.setAttribute("class","form-control");
        inpPwd.setAttribute("name","password");
        inpPwd.setAttribute("id","password");
        inpPwd.setAttribute("placeholder","Ingresa contraseña");
        
        inpRpwd.type = "password";
        inpRpwd.setAttribute("class","form-control");
        inpRpwd.setAttribute("name","rpassword");
        inpRpwd.setAttribute("id","rpassword");
        inpRpwd.setAttribute("placeholder","Ingresa contraseña");

        divPwd.appendChild(labPwd);
        divPwd.appendChild(inpPwd);

        divRpwd.appendChild(labRpwd);
        divRpwd.appendChild(inpRpwd);

        let checkbox = document.querySelector(".form-check");
        checkbox.parentNode.insertBefore(divRpwd, checkbox.nextSibling);
        checkbox.parentNode.insertBefore(divPwd, checkbox.nextSibling);

        let password = (document.querySelector("#password"));
let rpassword = (document.querySelector("#rpassword"));

password.addEventListener("keydown",writed);
rpassword.addEventListener("keydown",writed);

function writed(e){
    e.target.style.border = "1px solid #ced4da";
}

    }else{
        let  passwordGroup = document.querySelectorAll(".stated");
        for(let i = 0; i < passwordGroup.length; i ++){
            passwordGroup[i].remove();
        }
    }
}

function checkedPassword(){
    let inputs = document.querySelectorAll("input");
    for(let i = 0; i < inputs.length; i ++){
        if(inputs[i].value == ""){
            inputs[i].style.border = "solid 1px red";
        }
    }
    console.log(inputs);
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
