document.addEventListener("DOMContentLoaded", function() {
    const paragraphText = "¡Bienvenido! Calcula y reduce tu huella de carbono de manera eficiente.";

    function typeWriter(text, elementId, delay) {
        const element = document.getElementById(elementId);
        let index = 0;

        function type() {
            if (index < text.length) {
                element.textContent += text.charAt(index);
                index++;
                setTimeout(type, delay);
            }
        }
        type();
    }
    typeWriter(paragraphText, "typed-paragraph", 50);

});



