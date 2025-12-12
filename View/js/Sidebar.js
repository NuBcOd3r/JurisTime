// Inicializar tooltips de Bootstrap
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

// Toggle Sidebar (colapso parcial)
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const contentSection = document.querySelector('.content-section');
    
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            contentSection.classList.toggle('expanded');
            
            // Guardar estado en localStorage
            if (sidebar.classList.contains('collapsed')) {
                localStorage.setItem('sidebarState', 'collapsed');
            } else {
                localStorage.setItem('sidebarState', 'expanded');
            }
        });
    }
    
    // Restaurar estado del sidebar al cargar la página
    const savedState = localStorage.getItem('sidebarState');
    if (savedState === 'collapsed') {
        sidebar.classList.add('collapsed');
        contentSection.classList.add('expanded');
    }
    
    // Toggle sidebar en móviles (mostrar/ocultar completamente)
    if (window.innerWidth <= 992) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    }
    
    // Cerrar sidebar al hacer click fuera en móviles
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 992) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggle = toggleBtn.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        }
    });
    
    // Ajustar comportamiento en resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            sidebar.classList.remove('show');
        }
    });
    
    // Añadir efecto hover a los items del menú
    const navLinks = document.querySelectorAll('.nav-pills .nav-link');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'translateX(5px)';
            }
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Animación para dropdown items
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.querySelector('i')?.classList.add('fa-bounce');
        });
        
        item.addEventListener('mouseleave', function() {
            this.querySelector('i')?.classList.remove('fa-bounce');
        });
    });
    
    // Cerrar dropdowns al hacer click en un item
    dropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Si no es el item de cerrar sesión, prevenir comportamiento por defecto
            if (!this.textContent.includes('Cerrar Sesión')) {
                e.preventDefault();
                // Aquí puedes añadir la lógica para cada opción
                console.log('Clicked:', this.textContent.trim());
            }
            
            // Cerrar el dropdown
            const dropdown = bootstrap.Dropdown.getInstance(this.closest('.dropdown').querySelector('[data-bs-toggle="dropdown"]'));
            if (dropdown) {
                dropdown.hide();
            }
        });
    });
    
    // Animación suave para el logo
    const sidebarLogo = document.querySelector('.sidebar-logo');
    if (sidebarLogo) {
        sidebarLogo.addEventListener('mouseenter', function() {
            this.style.transform = 'rotate(360deg) scale(1.1)';
            this.style.transition = 'transform 0.6s ease';
        });
        
        sidebarLogo.addEventListener('mouseleave', function() {
            this.style.transform = 'rotate(0deg) scale(1)';
        });
    }
    
    // Feedback visual al cambiar página activa
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Remover active de todos
            navLinks.forEach(l => l.classList.remove('active'));
            // Añadir active al clickeado
            this.classList.add('active');
        });
    });
});

// Función para actualizar el perfil (puedes llamarla desde PHP)
function updateUserProfile(name, role, imageUrl) {
    // Actualizar en sidebar
    const profileName = document.querySelector('.profile-name');
    const profileRole = document.querySelector('.profile-role');
    const profileImage = document.querySelector('.profile-image');
    
    if (profileName) profileName.textContent = name;
    if (profileRole) profileRole.textContent = role;
    if (profileImage) profileImage.src = imageUrl;
    
    // Actualizar en navbar
    const navbarUsername = document.querySelector('.navbar-username');
    const navbarProfileImg = document.querySelector('.navbar-profile-img');
    const dropdownUsername = document.querySelector('.dropdown-username');
    
    if (navbarUsername) navbarUsername.textContent = name;
    if (navbarProfileImg) navbarProfileImg.src = imageUrl;
    if (dropdownUsername) dropdownUsername.textContent = name;
}

// Función para mostrar notificación (opcional)
function showNotification(message, type = 'info') {
    // Crear elemento de notificación
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 70px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto-cerrar después de 5 segundos
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}