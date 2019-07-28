function ajax() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('chat').innerHTML = req.responseText;
        }
    }
    req.open('GET', '../modulos/chatDashboard.php', true);
    req.send();
}
//linea que hace que se refreseque la pagina cada segundo
setInterval(function() {
    ajax();
}, 1000);