// gere les formulaire coté back
// regex
var regName = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
var regMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,10}/;
var regMail = /^[a-zA-Z0-9.-]+@[a-z0-9.-]+.[com|fr]{2,4}$/;

// variable de la page login (admin)
var btnAdminLog = document.getElementById('btnAdminLog');
var adminPseudo = document.getElementById('adminPseudo');
var forgetAdminPseudo = document.getElementById('forgetAdminPseudo');
var forgetAdminPass = document.getElementById('forgetAdminPass');

// variable de la page Settings (admin)
var btnNewAdmin = document.getElementById('btnNewAdmin');
var adminEmail = document.getElementById('adminEmail');
var forgetAdminEmail = document.getElementById('forgetAdminEmail');

var pseudoNewAdmin = document.getElementById('pseudoNewAdmin');
var forgetPseudoNewAdmin = document.getElementById('forgetNewAdminPseudo');

var passNewAdmin = document.getElementById('passNewAdmin');
var forgetPassNewAdmin = document.getElementById('forgetPassNewAdmin');
var verifyPassAdmin = document.getElementById('verifyPassAdmin');
var forgetVerifyPasAdmin = document.getElementById('forgetVerifyPasAdmin');

// fonction regex qui gère tout les formulaire de l'admin
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
    if (password.value !== verify.value) {
        event.preventDefault();
        span.textContent = 'Les mot de passe ne sont pas identiques';
    }
}

if (btnNewAdmin === null) {
    btnAdminLog.addEventListener("click", function(event){
        if (event) {
            var adminPassword = document.getElementById('adminPassword');
            regex('Pseudo',adminPseudo,forgetAdminPseudo,regName);
            // à décommenter après avoir changé le mdp provisoire
            // regex('Mot de passe',adminPassword,forgetAdminPass,regMdp);
        }
    })
} else if (btnAdminLog === null) {
    btnNewAdmin.addEventListener("click", function(event) {
        if (event) {
            regex('Email',adminEmail,forgetAdminEmail,regMail);
            regex('Pseudo',pseudoNewAdmin,forgetPseudoNewAdmin,regName);
            regex('Le mot de passe est',passNewAdmin,forgetPassNewAdmin,regMdp);
            regex('Le mot de passe de confirmation est',verifyPassAdmin,forgetVerifyPasAdmin,regMdp);

            passwordConf(passNewAdmin,verifyPassAdmin,forgetVerifyPasAdmin);
        }
    }) 
}



