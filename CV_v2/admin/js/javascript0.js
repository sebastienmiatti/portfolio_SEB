$(document).ready(function() {


    // $('#menu li a').on('click', function(e){
    $('.menu-ajax').on('click', function(e){
        e.preventDefault();
        var url= e.currentTarget.toString();
        var indexTable = url.lastIndexOf('table');

        var xhr = new XMLHttpRequest();

        var parameters = url.substring(indexTable);

        xhr.open("POST", "table_liste.php", false);
        xhr.setRequestHeader("Content-type",
        "application/x-www-form-urlencoded");
        xhr.send(parameters);
        // $(this).unbind('click').submit();

        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4 && xhr.status == 200){
                // console.log(r.responseText);
                // console.log(xhr.responseText);
                var obj = JSON.parse(xhr.responseText);
                // console.log(obj['montableau']);
                // $('#affichage').html(obj);
                $("#affichage").html(obj.contenu);
                $("#title").html(obj.title);

                // console.log(obj.contenu);
                // console.log(obj.title);
            }
        };

    });
});

$('#formulaire').on('submit', function(e){
    e.preventDefault();
    tab = $(this)[0].elements;
    id = tab[0].value;

    parameters = '';
    for (i=0;i<tab.length-1;i++){
        parameters += '&' + tab[i].name + "=" + tab[i].value ;
    }
    parameters = parameters.substring(1);

    var xhr = new XMLHttpRequest();

    xhr.open("POST", "table_ins.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(parameters);

    // -----------------------------------------------------

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "table_liste.php", true);
    xhr.setRequestHeader("Content-type",
    "application/x-www-form-urlencoded");
    xhr.send();

    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            var obj = JSON.parse(xhr.responseText);
            $("#affichage").html(obj);
        }
    };

});

// fonction déclenchée à la demande de supprimer la ligne d'une liste  d'une table
function suppr(id){
    console.log('test');
    var xhr = new XMLHttpRequest();
    var parameters = "id="+id;

    xhr.open("POST", "table_supp.php", true);
    xhr.setRequestHeader("Content-type",
    "application/x-www-form-urlencoded");
    xhr.send(parameters);

    // -----------------------------------------------------

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "table_liste.php", true);
    // xhr.setRequestHeader("Content-type",    "application/x-www-form-urlencoded");
    xhr.send();

    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            var obj = JSON.parse(xhr.responseText);
            // console.log(obj);
            $("#affichage").html(obj.contenu);
            $("#title").html(obj.title);
        }
    };
}

// fonction déclenchée à la demande d'jouter ligne à une table
function form_ajout(id){
    console.log('ajout');
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "table_form.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id="+id);

    xhr.onreadystatechange = function(){
        console.log(xhr);
        if (xhr.readyState == 4 && xhr.status == 200){
            var obj = JSON.parse(xhr.responseText);
            $("#affichage").html(obj.contenu);
            $("#title").html(obj.title);
            console.log('ajout3');
        }
    };


}
