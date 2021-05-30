import assign from '../object/assign.js';
import getStylesheetsLoaded from '../style/get-stylesheets-loaded.js';
import isComponentStylesheetIncluded from '../style/is-component-stylesheet-included.js';

export default async newDocument => {
    const criticalStyles = assign([], newDocument.querySelectorAll('style[id$="-critical-css"][data-href]'));

    const jobs = [];

    for (let i = 0; i < criticalStyles.length; i++) {
        const { id, dataset } = criticalStyles[i];

        if (isComponentStylesheetIncluded(id.replace('-css', ''))) {
            continue;
        }

        jobs.push(getStylesheetsLoaded(dataset.href));
    }

    return await Promise.allSettled(jobs);
};
