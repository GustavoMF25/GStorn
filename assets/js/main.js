document.addEventListener("DOMContentLoaded", function () {
    $('[data-toggle="tooltip"]').tooltip()



    $(".nav-tabs a").click(function () {
        $(this).tab('show');
//                   
    });
})

function mudaDesc(id) {
    if (id === 'tabinformacoes') {
        $("#descTab").html('Notas de atualizações');
    } else {
        $("#descTab").html('<b><i>Cadastre-se</i></b> para acessar por <b>7 dias</b> a <b>Demo</b> do sistema');
    }

}

function showPass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";

        document.getElementById('iconPass').classList.remove('fa-lock')
        document.getElementById('iconPass').classList.add('fa-unlock-alt')

    } else {
        x.type = "password";
        document.getElementById('iconPass').classList.remove('fa-unlock-alt')
        document.getElementById('iconPass').classList.add('fa-lock')
    }
}