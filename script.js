document.addEventListener("DOMContentLoaded", () => {

    
    const container = document.querySelector(".container");
    container.style.opacity = 0;
    container.style.transform = "translateY(40px)";

    setTimeout(() => {
        container.style.transition = "0.6s ease";
        container.style.opacity = 1;
        container.style.transform = "translateY(0)";
    }, 100);

    
    const linhas = document.querySelectorAll(".tabela tr");
    linhas.forEach((linha, index) => {
        linha.style.opacity = 0;
        linha.style.transform = "translateX(-20px)";

        setTimeout(() => {
            linha.style.transition = "0.5s ease";
            linha.style.opacity = 1;
            linha.style.transform = "translateX(0)";
        }, 100 * index);
    });

    const campos = document.querySelectorAll(".campo input");
    campos.forEach(input => {
        input.addEventListener("focus", () => {
            input.style.transition = "0.3s";
            input.style.transform = "scale(1.03)";
            input.style.boxShadow = "0 0 8px rgba(0, 150, 255, 0.4)";
        });

        input.addEventListener("blur", () => {
            input.style.transform = "scale(1)";
            input.style.boxShadow = "none";
        });
    });

    // --- Efeito de clique no botão ---
    const botoes = document.querySelectorAll(".btn, .editar, .excluir");
    botoes.forEach(btn => {
        btn.addEventListener("mousedown", () => {
            btn.style.transform = "scale(0.95)";
        });

        btn.addEventListener("mouseup", () => {
            btn.style.transform = "scale(1)";
        });
    });

    
    const botoesExcluir = document.querySelectorAll(".excluir");
    botoesExcluir.forEach(botao => {
        botao.addEventListener("click", (e) => {
            const confirmar = confirm("Tem certeza que deseja excluir este cliente?");
            if (!confirmar) e.preventDefault();
        });
    });
});
