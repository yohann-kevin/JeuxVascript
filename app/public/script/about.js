function displayAbout() {
    document.querySelector(".paraAbout1").style.display = "none";
    document.querySelector(".imgAbout1").style.display = "none";
    document.querySelector(".imgAbout2").style.display = "initial";
}

function displayAbout2() {
    document.querySelector(".paraAbout1").style.display = "initial";
    document.querySelector(".imgAbout1").style.display = "initial";
    document.querySelector(".imgAbout2").style.display = "none";
}

function displayAbout3() {
    document.querySelector(".paraAbout2").style.display = "none";
    document.querySelector(".imgAbout3").style.display = "none";
    document.querySelector(".imgAbout4").style.display = "initial";
}

function displayAbout4() {
    document.querySelector(".paraAbout2").style.display = "initial";
    document.querySelector(".imgAbout3").style.display = "initial";
    document.querySelector(".imgAbout4").style.display = "none";
}