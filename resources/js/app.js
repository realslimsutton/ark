import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import Glide, { Controls, Autoplay, Images, Swipe } from '@glidejs/glide/dist/glide.modular.esm';
import '@glidejs/glide/dist/css/glide.core.css';
import '@glidejs/glide/dist/css/glide.theme.css';
import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';
import './functions';

if (document.getElementsByName('.glide').length > 0) {
    new Glide('.glide', {
        type: 'carousel',
        autoplay: 5000,
        focusAt: 'center'
    }).mount({ Controls, Autoplay, Images, Swipe });
}

window.noUiSlider = noUiSlider;

window.sum = function (start, values) {
    let total = parseInt(start);
    for (let key in values) {
        if (typeof values[key] === 'undefined' || values[key] === null) {
            continue;
        }

        total += parseInt(values[key]);
    }
    return total;
};

window.getOptionPrice = function (event) {
    let option = event.target.options[event.target.selectedIndex];

    return option.getAttribute('data-store-price');
};

Alpine.plugin(collapse);

window.Alpine = Alpine;

Alpine.start();
