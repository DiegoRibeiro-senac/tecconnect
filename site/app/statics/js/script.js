const letreiro = document.querySelector('.letreiro');
const textos = document.querySelectorAll('.texto');

textos.forEach((texto, index) => {
    // Clona o texto
    const novoTexto = texto.cloneNode(true);

    // Adiciona o novo texto ao letreiro
    letreiro.appendChild(novoTexto);

    // Define um atraso de animação para cada texto clonado para criar um efeito contínuo
    // texto.style.animationDelay = `${index * 5}s`
});


const openModalButton = document.querySelectorAll(".open-modal");
const closeModalButton = document.querySelector("#close-modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");

const toggleModal = () => {
  modal.classList.toggle("hide");
  fade.classList.toggle("hide");
};

openModalButton.forEach((el) => {
  el.addEventListener("click", () => toggleModal());
});

[closeModalButton, fade].forEach((el) => {
    el.addEventListener("click", () => toggleModal());
  });



  // popup
  setTimeout(function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
}, 1000);

function fecharPopup() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup').style.display = 'none';
}

// mudar imagem


// Função para atualizar a imagem com base na largura da tela
// function atualizarImagem() {
//   var larguraTela = window.innerWidth;
//   var imagem = document.querySelector(".video");

//   if (larguraTela <= 999) {
//       // Largura da tela é menor que 768px, exibe uma imagem menor
//       imagem.src = "fundo-hero.svg";
//    } 
//   //else {
//   //     // Largura da tela é maior ou igual a 768px, exibe uma imagem maior
//   //     imagem.src = "imagem-grande.jpg";
//   // }
// }

// // Chame a função inicialmente e adicione um ouvinte de evento de redimensionamento para atualizar a imagem quando a tela for redimensionada
// atualizarImagem();
// window.addEventListener("resize", atualizarImagem);
