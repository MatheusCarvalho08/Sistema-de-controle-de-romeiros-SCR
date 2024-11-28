/*===== DARK/CLARO =====*/ 
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
    // Quando clicamos em cada nav__link, removemos a classe show-menu
    navMenu.classList.remove('show')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*==================== LINK ATIVO DAS SEÇÕES DE ROLAGEM ====================*/
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active')
        }
    })
}
window.addEventListener('scroll', scrollActive)

/*===== ANIMAÇÃO DE REVELAÇÃO DE ROLO =====*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2000,
    delay: 200,

});


/*===== FILTRAR ELEMENTOS =====*/
function filterElements(category){
  const elements = document.querySelectorAll(".content");

  elements.forEach((element) => {
      element.classList.remove("show");
      if(category === "Todos" || element.classList.contains(category)) {
          element.classList.add("show");
      }
  });
}

/*===== ACTIVE DO FILTRO =====*/
const buttons = document.querySelectorAll('.filter-btns button')
buttons.forEach(option => {
    option.addEventListener('click', () => {
        document.querySelector('button.active-btn').classList.remove('active-btn')
        option.classList.add('active-btn');
    })
})