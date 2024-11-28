// ALTERNAR BARRA LATERAL

let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

//ABRIR BARRA LATERAL
function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

//FECHAR BARRA LATERAL
function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}
