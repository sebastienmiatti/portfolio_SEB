$(document).ready(function() {







    // $('#menu li a').on('click', function(e){
    $('.menu-ajax').on('click', function(e){
        e.preventDefault();
        var url= e.currentTarget.toString();
        var indexTable = url.lastIndexOf('table');
        var parameters = url.substring(indexTable);

        $.ajax({
            type : "POST",
            data : parameters,
            url : "table_liste.php"
        }).done(function(responseText){
            var obj = $.parseJSON(responseText);

            // affichage de la page de liste d'une table en cours
            $("#affichage").html(obj.contenu);

            // modification du titre (title)
            $("#title").html(obj.title);

            // écouteur sur les boutons de suppression d'une ligne
            $('.suppr').on('click', function(e){
                suppr(this.dataset.id);
            });

            // écouteur sur les boutons de modification d'une ligne
            $('.modif').on('click', function(e){
                form_ajout(this.dataset.id);
            });

            // écouteur sur le bouton d'ajout d'une ligne
            $('#ajout').on('click', function(e){
                form_ajout(this.dataset.id);
            });
        });
    }) ;

    function formulaire(id, tab){

        parameters = '';
        for (i=0;i<tab.length-1;i++){
            parameters += '&' + tab[i].name + "=" + tab[i].value ;
        }
        parameters = parameters.substring(1);

        $.ajax({
            url : "table_ins.php",
            type : "POST",
            data : parameters
        });

        // -----------------------------------------------------

        $.ajax({
            url : "table_liste.php",
            type : "GET",
        }).done(function(responseText){
            var obj = $.parseJSON(responseText);
            // affichage de la page de liste d'une table en cours
            $("#affichage").html(obj.contenu);

            // modification du titre (title)
            $("#title").html(obj.title);

            // écouteur sur les boutons de suppression d'une ligne
            $('.suppr').on('click', function(e){
                suppr(this.dataset.id);
            });

            // écouteur sur les boutons de modification d'une ligne
            $('.modif').on('click', function(e){
                form_ajout(this.dataset.id);
            });

            // écouteur sur le bouton d'ajout d'une ligne
            $('#ajout').on('click', function(e){
                form_ajout(this.dataset.id);
            });
        });

    }

    // fonction déclenchée à la demande de supprimer la ligne d'une liste  d'une table
    function suppr(id){
        // console.log('supp ' + id);
        var parameters = "id="+id;

        $.ajax({
            url : "table_supp.php",
            type : "POST",
            data : parameters
        });
        // console.log('supp2 ' + id);

        // -----------------------------------------------------

        $.ajax({
            type : "GET",
            url : "table_liste.php"
        }).done(function(responseText){
            var obj = $.parseJSON(responseText);
            // affichage de la page de liste d'une table en cours
            $("#affichage").html(obj.contenu);

            // modification du titre (title)
            $("#title").html(obj.title);

            // écouteur sur les boutons de suppression d'une ligne
            $('.suppr').on('click', function(e){
                suppr(this.dataset.id);
            });

            // écouteur sur les boutons de modification d'une ligne
            $('.modif').on('click', function(e){
                form_ajout(this.dataset.id);
            });

            // écouteur sur le bouton d'ajout d'une ligne
            $('#ajout').on('click', function(e){
                form_ajout(this.dataset.id);
            });
        });

    }

    // fonction déclenchée à la demande d'jouter ligne à une table
    function form_ajout(id){
        console.log('ajout ' + id);

        var parameters = "id="+id;
        $.ajax({
            type : "POST",
            data : parameters,
            url : "table_form.php"
        }).done(function(responseText){
            var obj = $.parseJSON(responseText);
            // affichage de la page de liste d'une table en cours
            $("#affichage").html(obj.contenu);

            // modification du titre (title)
            $("#title").html(obj.title);

            $('#formulaire').on('submit', function(e){
                e.preventDefault();
                console.log('submit');
                tab = $(this)[0].elements;
                id = tab[0].value;
                formulaire(id, tab);
            });

        });

    }
});
