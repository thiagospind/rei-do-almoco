window.onload = function() {
    let date  = new Date();
    clock.innerHTML = date.toLocaleTimeString('pt-BR');
    setInterval(() => {
        setDisplayTime();
    },1000);
};


function setDisplayTime() {
    let clock = document.querySelector('#clock');
    let date  = new Date();
    clock.innerHTML = date.toLocaleTimeString('pt-BR');
}
