import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import './bootstrap';

Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();