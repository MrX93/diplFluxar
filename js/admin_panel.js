
function ispisi_tabelu(tabela, id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('limona').innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "prikazi_tabelu/" + tabela + "/" + id, true);
    xhttp.send();
}

function ispisi_tabelu1(tabela, id_film, id_glumac) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('limona').innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "prikazi_tabelu1/" + tabela + "/" + id_film + "/" + id_glumac + "/", true);
    xhttp.send();
}

function ispisi_tabelu2(tabela, id_film, id_zanr) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('limona').innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "prikazi_tabelu2/" + tabela + "/" + id_film + "/" + id_zanr + "/", true);
    xhttp.send();
}

function ispisi_tabelu1(tabela, id_film, id_glumac) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('limona').innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "prikazi_tabelu1/"  + tabela + "/" + id_film + "/" + id_glumac + "/", true);
    xhttp.send();
}


function obrisi_red(tabela, id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('limona').innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "obrisi_red/" + tabela + "/" + id + "/", true);
    xhttp.send();
}

function obrisi_red1(tabela, id_film, id_glumac) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('limona').innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "obrisi_red1/" + tabela + "/" + id_film + "/" + id_glumac + "/", true);
    xhttp.send();
}

function obrisi_red2(tabela, id_film, id_zanr) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('limona').innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "obrisi_red2/" + tabela + "/" + id_film + "/" + id_zanr + "/", true);
    xhttp.send();
}


function dodaj() {
    var url = "dodaj_red/";
    var data = $("#forma_unos").serialize();
    $.post(url, data, function (data) {
        $("#limona").html(data);
    });
}

function izmeni(id){
   
    var url = "izmeni_red/" + id;
            var data = $("#forma_izmena").serialize();
            $.post(url, data, function (data) {
                $("#limona").html(data);
            });
}

function izmeni1(id_film, id_glumac){
   
    var url = "izmeni_red1/"+id_film +"/"+ id_glumac ;
            var data = $("#forma_izmena").serialize();
            $.post(url, data, function (data) {
                $("#limona").html(data);
            });
}

function izmeni2(id_film, id_zanr){
   
    var url = "izmeni_red2/"+id_film +"/"+ id_zanr ;
            var data = $("#forma_izmena").serialize();
            $.post(url, data, function (data) {
                $("#limona").html(data);
            });
}

