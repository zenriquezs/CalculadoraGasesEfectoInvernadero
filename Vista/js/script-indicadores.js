$(document).ready(function() {
    function actualizarIndicador(seccion, estado) {
        const indicador = $(`#indicator-${seccion}`);
        if (estado === 'completado') {
            indicador.css('background-color', 'green');
        } else {
            indicador.css('background-color', 'red');
        }
    }

    function verificarIndicadores() {
        $.ajax({
            url: '../Controlador/controlador-indicadores.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.section1) {
                    actualizarIndicador('section1', 'completado');
                } else {
                    actualizarIndicador('section1', 'incompleto');
                }
                if (response.section2) {
                    actualizarIndicador('section2', 'completado');
                } else {
                    actualizarIndicador('section2', 'incompleto');
                }

                if (response.section3) {
                    actualizarIndicador('section3', 'completado');
                } else {
                    actualizarIndicador('section3', 'incompleto');
                }

                if (response.section4) {
                    actualizarIndicador('section4', 'completado');
                } else {
                    actualizarIndicador('section4', 'incompleto');
                }

                if (response.section5) {
                    actualizarIndicador('section5', 'completado');
                } else {
                    actualizarIndicador('section5', 'incompleto');
                }

                if (response.section6) {
                    actualizarIndicador('section6', 'completado');
                } else {
                    actualizarIndicador('section6', 'incompleto');
                }

                if (response.section7) {
                    actualizarIndicador('section7', 'completado');
                } else {
                    actualizarIndicador('section7', 'incompleto');
                }

                if (response.section8) {
                    actualizarIndicador('section8', 'completado');
                } else {
                    actualizarIndicador('section8', 'incompleto');
                }
                if (response.section9) {
                    actualizarIndicador('section9', 'completado');
                } else {
                    actualizarIndicador('section9', 'incompleto');
                }
                if (response.section10) {
                    actualizarIndicador('section10', 'completado');
                } else {
                    actualizarIndicador('section10', 'incompleto');
                }
                if (response.section11) {
                    actualizarIndicador('section11', 'completado');
                } else {
                    actualizarIndicador('section11', 'incompleto');
                }
                if (response.section12) {
                    actualizarIndicador('section12', 'completado');
                } else {
                    actualizarIndicador('section12', 'incompleto');
                }

                if (response.section13) {
                    actualizarIndicador('section13', 'completado');
                } else {
                    actualizarIndicador('section13', 'incompleto');
                }

                if (response.section14) {
                    actualizarIndicador('section14', 'completado');
                } else {
                    actualizarIndicador('section14', 'incompleto');
                }

                if (response.section15) {
                    actualizarIndicador('section15', 'completado');
                } else {
                    actualizarIndicador('section15', 'incompleto');
                }

                if (response.section16) {
                    actualizarIndicador('section16', 'completado');
                } else {
                    actualizarIndicador('section16', 'incompleto');
                }

                if (response.section17) {
                    actualizarIndicador('section17', 'completado');
                } else {
                    actualizarIndicador('section17', 'incompleto');
                }

                if (response.section18) {
                    actualizarIndicador('section18', 'completado');
                } else {
                    actualizarIndicador('section18', 'incompleto');
                }
                if (response.section19) {
                    actualizarIndicador('section19', 'completado');
                } else {
                    actualizarIndicador('section19', 'incompleto');
                }
                if (response.section20) {
                    actualizarIndicador('section20', 'completado');
                } else {
                    actualizarIndicador('section20', 'incompleto');
                }
                if (response.section21) {
                    actualizarIndicador('section21', 'completado');
                } else {
                    actualizarIndicador('section21', 'incompleto');
                }
                if (response.section22) {
                    actualizarIndicador('section22', 'completado');
                } else {
                    actualizarIndicador('section22', 'incompleto');
                }

                if (response.section23) {
                    actualizarIndicador('section23', 'completado');
                } else {
                    actualizarIndicador('section23', 'incompleto');
                }

                if (response.section24) {
                    actualizarIndicador('section24', 'completado');
                } else {
                    actualizarIndicador('section24', 'incompleto');
                }
                
            },
            error: function() {
                console.error('Error al verificar los indicadores.');
            }
        });
    }

    window.verificarIndicadores = verificarIndicadores; 

    verificarIndicadores();
});
