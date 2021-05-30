import isComponentStylesheetIncluded from '../utils/style/is-component-stylesheet-included.js';
import getStylesheetsLoaded from '../utils/style/get-stylesheets-loaded.js';
import isStylesheetIncluded from '../utils/style/is-stylesheet-included.js';

export default {
    data: () => ({
        stylesheets: []
    }),

    async created() {
        const jobs = [];

        const { length } = this.stylesheets || [];

        for (let i = 0; i < length; i++) {
            const { name, url } = this.stylesheets[i] || {};

            if (
                !name

                ||

                !url

                ||

                isComponentStylesheetIncluded(name)

                ||

                isStylesheetIncluded(url)
            ) {
                continue;
            }

            jobs.push(getStylesheetsLoaded(url));
        }

        await Promise.allSettled(jobs);
    }
};
