// SIDEBAR (uniquement si présent sur la page)
const profileBtn = document.getElementById('profileBtn');
const sidebar = document.getElementById('sidebar');
const closeBtn = document.getElementById('closeBtn');

if(profileBtn && sidebar && closeBtn){
  profileBtn.addEventListener('click', () => sidebar.classList.add('open'));
  closeBtn.addEventListener('click', () => sidebar.classList.remove('open'));
  document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !profileBtn.contains(e.target)) {
      sidebar.classList.remove('open');
    }
  });
}

// MODAL AUTHENTIFICATION (uniquement si présent sur la page)
const openBtn = document.getElementById('openAuth');
const modal = document.getElementById('authModal');
const modalCloseBtn = document.getElementById('closeModal');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const showRegister = document.getElementById('showRegister');
const showLogin = document.getElementById('showLogin');

if(openBtn && modal && modalCloseBtn && loginForm && registerForm && showRegister && showLogin){
  openBtn.addEventListener('click', () => modal.setAttribute('aria-hidden','false'));
  modalCloseBtn.addEventListener('click', () => modal.setAttribute('aria-hidden','true'));
  modal.addEventListener('click', (e) => { if(e.target === modal) modal.setAttribute('aria-hidden','true'); });
  
  function toggleForm(showLoginForm){
    loginForm.style.display = showLoginForm ? 'block' : 'none';
    registerForm.style.display = showLoginForm ? 'none' : 'block';
  }

  showRegister.addEventListener('click', e => { e.preventDefault(); toggleForm(false); });
  showLogin.addEventListener('click', e => { e.preventDefault(); toggleForm(true); });
}
