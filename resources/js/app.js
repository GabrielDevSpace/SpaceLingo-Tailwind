import './bootstrap';
import 'video.js/dist/video-js.css';
import 'video.js/dist/video.js';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';


window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


