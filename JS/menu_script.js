$(document).ready(function() {
    $('.color_button').on('click', function(event) {
        $('#profileFrame').toggleClass('show');
        $(this).toggleClass('active');
        if ($('#profileFrame').hasClass('show')) {
            // Carrega o conteúdo do perfil via Ajax
            $('#profileFrame').load('menu.php');
            // Altera o ícone para baixo quando o perfil é ativado
            $('#elementoHTML').html('<i class="material-icons text-white" style="font-size: 30px;">keyboard_arrow_down</i>');
        } else {
            // Reverte o ícone para esquerda quando o perfil é desativado
            $('#elementoHTML').html('<i class="material-icons text-white" style="font-size: 30px;">keyboard_arrow_left</i>');
        }
        event.stopPropagation();
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.color_button').length && !$(event.target).closest('#profileFrame').length) {
            $('#profileFrame').removeClass('show');
            $('.color_button').removeClass('active');
            $('#elementoHTML').html('<i class="material-icons text-white" style="font-size: 30px;">keyboard_arrow_left</i>');
        }
    });
});