var layout = "Vertical";
var treeheight = 100;
var imagenes = true;

function orientacion() {
    var e = document.getElementById("orientacion");
    var sel = e.options[e.selectedIndex].text;
    if (sel == "Vertical") {
        layout = "Vertical";
        document.getElementById("dvTreeContainer").style.left = "-140px";
        document.getElementById("dvTreeContainer").style.top = "180px";
    } else {
        layout = "Horizontal";
        document.getElementById("dvTreeContainer").style.left = "60px";
        document.getElementById("dvTreeContainer").style.top = "80px";
    }

    DrawTree({
        Container: container,
        RootNode: rootNode,
        Layout: layout,
        Height: treeheight,
    });

    if (!imagenes) delimages();

}

function images() {
    treeheight = 100;
    DrawTree({
        Container: container,
        RootNode: rootNode,
        Layout: layout,
        Height: treeheight,
    });
    imagenes = true;
}

function delimages() {
    treeheight = 30;
    DrawTree({
        Container: container,
        RootNode: rootNode,
        Layout: layout,
        Height: treeheight,
    });
    document.getElementById("foto_raiz").style.display = "none";
    document.getElementById("texto_raiz").style.display = "inline";

    var elements = document.getElementsByClassName("foto");
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
    }
    var elements = document.getElementsByClassName("texto_rip");
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
    }
    imagenes = false;
}

function noimages() {
    var e = document.getElementById("imagen");
    var sel = e.options[e.selectedIndex].text;
    if (sel == "Sin imágenes") {
        delimages();
    } else images();
}
