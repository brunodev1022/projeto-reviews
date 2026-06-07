document.addEventListener('DOMContentLoaded', function () {
    const notaInput = document.querySelector('#nota');
    const estrelas = document.querySelectorAll('.estrela-botao');
    const comentario = document.querySelector('#comentario');
    const erro = document.querySelector('.erro-avaliacao');

    if (notaInput && estrelas.length) {
        const notaInicial = parseInt(notaInput.value, 10) || 0;

        function marcarEstrelas(valor) {
            estrelas.forEach(function (estrela) {
                const valorEstrela = parseInt(estrela.dataset.value, 10);
                estrela.classList.toggle('ativa', valorEstrela <= valor);
            });
        }

        if (notaInicial) {
            marcarEstrelas(notaInicial);
        }

        estrelas.forEach(function (estrela) {
            estrela.addEventListener('click', function () {
                const valor = parseInt(estrela.dataset.value, 10);
                notaInput.value = valor;
                marcarEstrelas(valor);
            });
        });
    }

    const form = document.querySelector('.avaliacao-form');
    if (form) {
        form.addEventListener('submit', function (event) {
            const nota = notaInput ? parseInt(notaInput.value, 10) : 0;
            const texto = comentario ? comentario.value.trim() : '';

            if (nota < 1 || nota > 5 || texto === '') {
                event.preventDefault();
                if (erro) {
                    erro.textContent = 'Escolha nota e escreva comentário.';
                }
            }
        });
    }
});
