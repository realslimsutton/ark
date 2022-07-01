import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import Glide, { Controls, Autoplay, Images } from '@glidejs/glide/dist/glide.modular.esm';
import '@glidejs/glide/dist/css/glide.core.css';
import '@glidejs/glide/dist/css/glide.theme.css';

new Glide('.glide', {
    type: 'carousel',
    autoplay: 5000,
    focusAt: 'center'
}).mount({ Controls, Autoplay, Images });

Alpine.plugin(collapse);

window.Alpine = Alpine;

Alpine.start();
