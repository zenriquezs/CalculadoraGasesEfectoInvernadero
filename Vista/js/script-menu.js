
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-item');
    const sections = document.querySelectorAll('.section');
    let currentSection = 0;

    function showSection(index) {
        sections.forEach((section, i) => {
            section.classList.toggle('hidden', i !== index);
            section.classList.toggle('visible', i === index);
        });
        menuItems.forEach((item, i) => {
            item.classList.toggle('disabled', i > index);
        });
    }

    menuItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            if (!item.classList.contains('disabled')) {
                currentSection = index;
                showSection(index);
            }
        });
    });

    const nextButtons = document.querySelectorAll('input[type="submit"][value="Siguiente"]');

    nextButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            currentSection++;
            if (currentSection < sections.length) {
                showSection(currentSection);
            }
        });
    });

    showSection(currentSection);
});

