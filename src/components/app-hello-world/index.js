import autoloadComponentStylesheets from '../../mixins/autoload-component-stylesheets.js';

import { template, stylesheets } from '/wp-json/vwpt/v1/components/app-hello-world.js';

export default {
    name: 'AppHelloWorld',

    mixins: [autoloadComponentStylesheets],

    template,

    data: () => ({
        stylesheets,

        counter: 0
    }),

    methods: {
        increment(){
            this.counter++;
        }
    }
};
