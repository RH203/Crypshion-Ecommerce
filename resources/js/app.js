import './bootstrap';
import 'preline';


document.addEventListener('livewire:navigated', () => { 
  // console.log('hello')
  window.HSStaticMethods.autoInit();
})