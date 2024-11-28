
const itens = [
    {
        id: 0,
        nome: 'Tênis',
        img: 'img/sapato.jpeg',
        preco: 120,
        quantidade: 0,
    },
    {
        id: 1,
        nome: 'Mochila',
        img: 'img/mochila.jpeg',
        preco: 40,
        quantidade: 0,
    },
    {
        id: 2,
        nome: 'Chapéu para caminhada',
        img: 'img/chapeu.jpeg',
        preco: 15,
        quantidade: 0,
    },
    {
        id: 3,
        nome: 'Óculos',
        img: 'img/oculos.webp',
        preco: 25,
        quantidade: 0,
    },
    {
        id: 4,
        nome: 'Esparadrapo',
        img: 'img/esparadrapo.webp',
        preco: 10,
        quantidade: 0,
    },
    {
        id: 5,
        nome: 'Capa de chuva',
        img: 'img/capa.jpeg',
        preco: 22,
        quantidade: 0,
    },
    {
        id: 6,
        nome: 'Garrafa de água',
        img: 'img/garrafa.webp',
        preco: 30,
        quantidade: 0,
    },
    {
        id: 7,
        nome: 'Lanterna',
        img: 'img/lanterna.jpeg',
        preco: 32,
        quantidade: 0,
    },
    {
        id: 8,
        nome: 'Chinelo',
        img: 'img/chinas.webp',
        preco: 40,
        quantidade: 0,
    },
    {
        id: 9,
        nome: 'Meia',
        img: 'img/meia.webp',
        preco: 35,
        quantidade: 0,
    },
    {
        id: 10,
        nome: 'Dorflex',
        img: 'img/dorflex.jpeg',
        preco: 15,
        quantidade: 0,
    },
    {
        id: 11,
        nome: 'Bastão de Caminhada',
        img: 'img/bastao.webp',
        preco: 50,
        quantidade: 0,
    },
    {
        id: 12,
        nome: 'Bermuda Anti-Assadura',
        img: 'img/bermuda.jpeg',
        preco: 45,
        quantidade: 0,
    },
    {
        id: 13,
        nome: 'Pomada para Dor Muscular',
        img: 'img/pomada.webp',
        preco: 25,
        quantidade: 0,
    },
    {
        id: 14,
        nome: 'Colete Refletivo',
        img: 'img/colete.jpeg',
        preco: 20,
        quantidade: 0,
    },
    {
        id: 15,
        nome: 'Carregador Portátil',
        img: 'img/carregador.webp',
        preco: 75,
        quantidade: 0,
    },
    {
        id: 16,
        nome: 'Gaze',
        img: 'img/gaze.webp',
        preco: 10,
        quantidade: 0,
    },
    {
        id: 17,
        nome: 'Colchonete de acampamento',
        img: 'img/colchonete.jpeg',
        preco: 40,
        quantidade: 0,
    },
    {
        id: 18,
        nome: 'Camisa Térmica',
        img: 'img/camisa.webp',
        preco: 28,
        quantidade: 0,
    },
    {
        id: 19,
        nome: 'Kit Primeiros Socorros',
        img: 'img/kit.jpeg',
        preco: 95,
        quantidade: 0,
    },
];

function inicializarLoja(){
    var containerProdutos = document.getElementById('produtos');
    itens.map((val)=>{
        var produto = document.createElement('div');
        produto.classList.add('produto');

        var imagem = document.createElement('img');
        imagem.src = val.img;

        var nomeProduto = document.createElement('p');
        nomeProduto.textContent = val.nome;
        nomeProduto.classList.add('nome-produto');

        var precoProduto = document.createElement('p');
        precoProduto.textContent = 'Preço: R$ ' + val.preco.toFixed(2);
        precoProduto.classList.add('preco-produto');

        var botao = document.createElement('button');
        botao.textContent = 'Adicionar a Lista!';
        botao.setAttribute('key', val.id);

        produto.appendChild(imagem);
        produto.appendChild(nomeProduto);
        produto.appendChild(precoProduto);
        produto.appendChild(botao);

        containerProdutos.appendChild(produto);
    });
}

inicializarLoja();

function atualizarCarrinho(){
    var corpoTabela = document.getElementById('corpo-tabela');
    corpoTabela.innerHTML = "";
    var precoTotalCompra = 0; 

    itens.map((val)=>{
        if (val.quantidade > 0) {
            var precoTotalProduto = val.preco * val.quantidade; 
            precoTotalCompra += precoTotalProduto; 

            corpoTabela.innerHTML+=`
            <tr>
                <td>`+val.nome+`</td>
                <td>R$ `+ precoTotalProduto.toFixed(2) +`</td>
                <td>`+val.quantidade+`</td>
                <td><button onclick="removerItem(`+val.id+`)">Remover</button></td>
            </tr>
            `;
        }
    });

    corpoTabela.innerHTML+=`
    <tr>
        <td colspan="4">Preço Total: R$ ` + precoTotalCompra.toFixed(2) + `</td>
    </tr>
    `;
}

function removerItem(id) {
    if (itens[id].quantidade > 0) {
        itens[id].quantidade--;
        atualizarCarrinho();
    }
}


var links = document.getElementsByTagName('button');

for(var i = 0; i < links.length; i++){
    links[i].addEventListener("click", function(event){
        event.preventDefault();
        let key = this.getAttribute('key');
        itens[key].quantidade++;
        atualizarCarrinho();
        return false;
    });
}

function checkCardType() {
    const cardNumber = document.getElementById('numero_cartao').value;
    const visaRegex = /^4[0-9]{12}(?:[0-9]{3})?$/;
    const mastercardRegex = /^5[1-5][0-9]{14}$/;
    const amexRegex = /^3[47][0-9]{13}$/;
    const discoverRegex = /^6(?:011|5[0-9]{2})[0-9]{12}$/;
    const cardLogos = document.getElementById('cardLogos')

    cardLogos.innerHTML = ' ';

    if (visaRegex.test(cardNumber)){
        addCardLogo('img/visa.png', 'Visa');
    } else if (mastercardRegex.test(cardNumber)){
        addCardLogo('img/mc.png', 'MasterCard')
    } else if (amexRegex.test(cardNumber)){
        addCardLogo('img/amex.png', 'American Express')
    } else if (discoverRegex.test(cardNumber)){
        addCardLogo('img/dc.png', 'Discover')
    }
}

function addCardLogo(imageSrc, altText){
    const logoImg = document.createElement('img');
    logoImg.src = imageSrc;
    logoImg.alt = altText;
    document.getElementById('cardLogos').appendChild(logoImg);

}

function exibirFormPayment() {
    var cardFormPayment = document.getElementById("card-form-payment");
    cardFormPayment.style.display = "block";
}

function fecharFormPayment() {
    var cardFormPayment = document.getElementById("card-form-payment");
    cardFormPayment.style.display = "none";
}


/*===== DARK/SUN =====*/ 
let darkModeIcon = document.querySelector('#darkMode-icon');

darkModeIcon.onclick = () => {
    darkModeIcon.classList.toggle('bx-sun');
    document.body.classList.toggle('dark-mode');
};

/*===== MENU SHOW =====*/ 
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId)

    if(toggle && nav){
        toggle.addEventListener('click', ()=>{
            nav.classList.toggle('show')
        })
    }
}
showMenu('nav-toggle','nav-menu')

/*==================== REMOVE MENU MOBILE ====================*/
const navLink = document.querySelectorAll('.nav__link')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show')
}
navLink.forEach(n => n.addEventListener('click', linkAction))


