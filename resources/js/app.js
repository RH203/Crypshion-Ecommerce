import './bootstrap';
import 'preline';


document.addEventListener('livewire:navigated', () => { 
  window.HSStaticMethods.autoInit();


  
  const humbMenu = document.querySelector('.humberger-menu');
  const sidebar = document.querySelector('aside');
  const main = document.querySelector('main');

  humbMenu.addEventListener('click', () => {
    if (sidebar.classList.contains('hidden')) {
      sidebar.classList.remove('hidden');
      sidebar.classList.add('block');
      main.classList.remove('basis-full');
      main.classList.add('basis-9/12');
    } else {
      sidebar.classList.remove('block');
      sidebar.classList.add('hidden');
      main.classList.remove('basis-9/12');
      main.classList.add('basis-full');
    }
  });
})

