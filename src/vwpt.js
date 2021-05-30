import {
    selectorApp,
    components,
    nameRouterOutlet,
    nameTagRouterOutlet,
    selectorRouterOutlet
} from '/wp-json/vwpt/v1/vue.js';

import { options as pjaxOptions } from '/wp-json/vwpt/v1/pjax.js';

import initVue from './utils/vue/initialize.js';
import initPjax from './utils/pjax/initialize.js';
import refreshPjax from './utils/pjax/refresh.js';

import getMainSwitchCallback from './utils/pjax/get-switch-main-callback.js';
import getComponentsMember from './utils/vue/get-components-member.js';
import assign from './utils/object/assign.js';

const app = initVue(
    selectorApp,

    components,


    () => ({
        [nameRouterOutlet]: nameTagRouterOutlet
    })
);

const pjax = initPjax(assign(
    {
        [selectorRouterOutlet]: getMainSwitchCallback(async (oldEl, newEl) => {
            app[nameRouterOutlet] = {
                components: getComponentsMember(components),

                template: '<' + nameTagRouterOutlet + '>' + newEl.innerHTML + '</' + nameTagRouterOutlet + '>'
            };

            refreshPjax(document, pjax);
        })
    },

    pjaxOptions
));
