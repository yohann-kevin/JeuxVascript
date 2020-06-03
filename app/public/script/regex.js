// ce fichier gere les regex de la partie front
// regex
var regName = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
var regMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,10}/;
var regMail = /^[a-zA-Z0-9.-]+@[a-z0-9.-]+.[com|fr]{2,4}$/;

// variable modal connect
var btnConnect = document.getElementById('btnSubConnect');
var pseudoConnect = document.getElementById('pseudoConnect');
var forgetPseudoConnect = document.getElementById('forgetPseudoConnect');
var passwordConnect = document.getElementById('passwordConnect');
var forgetPasswordConnect = document.getElementById('forgetPasswordConnect');

// variable page register
var btnRegister = document.getElementById('btnSubRegister');
var emailRegister = document.getElementById('emailRegister');
var forgetEmailRegister = document.getElementById('forgetEmailRegister');
var pseudoRegister = document.getElementById('firstNameRegister');
var forgetPseudoRegister = document.getElementById('forgetPseudoRegister');

var passwordRegister = document.getElementById('passwordRegister');
var forgetPasswordRegister = document.getElementById('forgetPasswordRegister');
var verifyPasswordRegister = document.getElementById('verifyPasswordRegister');
var forgetPassConfRegister = document.getElementById('forgetPassConfRegister');

// variable page contact
var btnContact = document.getElementById('btnSubContact');
var pseudoContact = document.getElementById('firstNameContact');
var forgetPseudoContact = document.getElementById('forgetPseudoContact');
var emailContact = document.getElementById('emailContact');
var forgetEmailContact = document.getElementById('forgetEmailContact');

// variable page settings section info
var btnModifyInfo = document.getElementById('btnModifyInfo');
var emailModify = document.getElementById('changeEmail');
var forgetNewEmail = document.getElementById('forgetNewEmail');
var newPseudo = document.getElementById('newPseudo');
var forgetNewPseudo = document.getElementById('forgetNewPseudo');

// variable page settings section password
var verifyNewPassword = document.getElementById('verifyNewPassword');
var forgetOldPassword = document.getElementById('forgetOldPassword');
var forgetNewPassword = document.getElementById('forgetNewPassword');
var forgetNewPassConf = document.getElementById('forgetNewPassConf');


// fonction regex qui gère tout les formulaire
function regex(name, value, span, regex) {
    if (value.valueMissing) {
        event.preventDefault();
        span.textContent = name  + ' manquant'
    } else if (regex.test(value.value) == false) {
        event.preventDefault();
        span.textContent = name + ' incorrect';    
    }
}

// vérifie si le mot de passe et le mot de passe de confirmation sont bien identique
function passwordConf(password,verify,span) {
    if (password !== verify) {
        event.preventDefault();
        span.textContent = 'Les mot de passe ne sont pas identiques';
        
    }
}

// gère la modal connect
btnConnect.addEventListener("click", function(event){
    if (event) {
        regex('Pseudo',pseudoConnect,forgetPseudoConnect,regName);
        // !!!! à décommenter après l'insertion de vrai contenu !!!!!
        // regex('Mot de passe',passwordConnect,forgetPasswordConnect,regMdp);
    }
})

if (btnModifyInfo === null && btnContact === null) {
    // gère la page register
    btnRegister.addEventListener("click", function(event) {
        if (event) {
            regex('Email',emailRegister,forgetEmailRegister,regMail);
            regex('Pseudo',pseudoRegister,forgetPseudoRegister,regName);
    
            var verifyPassRegister = document.getElementById('passwordRegister').value;
            var verifyPassConfRegister = document.getElementById('verifyPasswordRegister').value;
    
            regex('Mot de passe',verifyPassRegister,forgetPasswordRegister,regMdp);
            regex('Mot de passe de confirmation',verifyPassConfRegister,forgetPassConfRegister,regMdp);
            passwordConf(verifyPassRegister,verifyPassConfRegister,forgetPassConfRegister);
        }
    })
}

if (btnRegister === null && btnModifyInfo === null) {
    // gère la page contact
    btnContact.addEventListener("click", function(event) {
        if (event) {
            regex('Pseudo',pseudoContact,forgetPseudoContact,regName);
            regex('Email',emailContact,forgetEmailContact,regMail);
        }
    })
} else if (btnContact === null && btnRegister === null) {
    // gère la page settings (info)
    btnModifyInfo.addEventListener("click", function(event) {
        if (event) {
            regex('Email',emailModify,forgetNewEmail,regMail);
            regex('Pseudo',newPseudo,forgetNewPseudo,regName)
        }
    })
}