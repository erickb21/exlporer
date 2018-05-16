
var ajaxrequest = new XMLHttpRequest();
var data


function exploreajax(dataToSend) {
    submitMethod = "POST";
    //submitMethod = "GET"
    var pageUrl = "./pages/explorer.php";
    syncMethod = true; // Méthode asynchrone
    //syncMethod = false; // Méthode Syncrone
    //user = "" //nom d'utilisateur as string si "pageUrl" est sécurisée
    //password = "" // mot de passe as string si "pageUrl" est sécurisée

    ajaxrequest.open(submitMethod, pageUrl, true);
    if (submitMethod == "POST") {
        ajaxrequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    }
    //var mavar = "toto";
    //var mavar = [];
    //mavar[0] = 1;
    //mavar[1] = 3;
    //mavar[3] = "ceci est un texte de réponse";
    //mavar[4] = selectionliste();
    //escape(l1.options[index].value)
    ajaxrequest.send(dataToSend);
    //alert("ok" + mavar);


}

//******************
ajaxrequest.onreadystatechange = function () {
    switch (ajaxrequest.readyState) {
        case 0: stateUninitialized(); break; // 0 (uninitialized)	Objet non initialisé
        case 1: stateLoading(); break; // 1 (loading)	Début du transfert des données
        case 2: stateLoaded(); break; // 2 (loaded)	Données transférées
        case 3: stateInteractive(); break; // 3 (interactive)	Données reçues sont accessibles en partie
        case 4: stateComplete(); break; // 4 (complete)	Données sont complètement accessibles
    }
}

function stateComplete() {

    if (ajaxrequest.status == 200 || ajaxrequest.status == 0) {
        var tmp = ajaxrequest.responseText;
        document.getElementById("loader").style.display = "none";
        document.getElementById('listDirectories').innerHTML = tmp;

    } else { alert("Ajax Error: La connexion avec le serveur est perdue, si le problème persiste veuillez contacter l'administrateur du site");}
};

function stateInteractive() {

    //document.getElementById("loader").style.display = "block";
    //var tmp = ajaxrequest.responseText;//.split(":");
    ////if (typeof (tmp[1]) != "undefined") {
    ////    f.elements["string1_r"].value = tmp[1];
    ////    f.elements["string2_r"].value = tmp[2];
    ////}
    //for (var i = 0; i < tmp.length; i++) {
    //    //alert("stateInteractive" + tmp[i]);
    //}
}

function stateLoaded() {
    //document.getElementById("loader").style.display = "block";
    //var tmp = ajaxrequest.responseText; //.split(":");
    ////if (typeof (tmp[1]) != "undefined") {
    ////    f.elements["string1_r"].value = tmp[1];
    ////    f.elements["string2_r"].value = tmp[2];
    ////}
    //for (var i = 0; i < tmp.length; i++) {
    //    //alert("stateLoaded" + tmp[i]);
    //}
}

function stateLoading() {
    //var tmp = ajaxrequest.responseText; //.split(":");
    ////if (typeof (tmp[1]) != "undefined") {
    ////    f.elements["string1_r"].value = tmp[1];
    ////    f.elements["string2_r"].value = tmp[2];
    ////}
    //for (var i = 0; i < tmp.length; i++) {
    //    //alert("stateLoading" + tmp[i]);
    //}
}

function stateUninitialized() {
    //document.getElementById("loader").style.display = "block";
    //var tmp = ajaxrequest.responseText;//.split(":");
    ////if (typeof (tmp[1]) != "undefined") {
    ////    f.elements["string1_r"].value = tmp[1];
    ////    f.elements["string2_r"].value = tmp[2];
    ////}
    //for (var i = 0; i < tmp.length; i++) {
    //    //alert("stateUninitialized" + tmp[i]);
    //}
}


// **************************

function selectionCase() {
    var formCases = document.getElementsByName("meschecks[]")
    var casesChecked = [];
    var casesNotChecked = [];
    var j = 0;
    var k = 0;
    for (i = 0; i < formCases.length; i++) {
        if (formCases[i].checked == false) { casesNotChecked[k] = formCases[i].value; k++ } else { casesChecked[j] = formCases[i].value; j++ }
    }

    console.log(casesChecked);
    //selectliste1 = myliste1.selectedIndex;
    data = "mescases=" + casesChecked;

    exploreajax(data);
    return true
};

function exploreMyPath(myPath) {

    data = "maselection=" + "../" + myPath;
    console.log (myPath);
    if (myPath == '../../..'){
        return;
    }
    document.getElementById('listDirectories').innerHTML = "<div id='loader' class='myloader'></div>";
    exploreajax(data);
    return true;
};

function exploreMyFolder(myPath) {

    data = "maselection=" + myPath;
    console.log (myPath);
    if (myPath == '../../..'){
        return;
    }
    document.getElementById('listDirectories').innerHTML = "<div id='loader' class='myloader'></div>"
    exploreajax(data);
    return true;
};