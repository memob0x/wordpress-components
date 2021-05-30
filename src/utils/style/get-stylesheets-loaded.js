import cast from '../array/cast.js';

const cache = {};

const getStylesheetLoaded = url => cache[url] || (cache[url] = new Promise((resolve, reject) => {
    const link = document.createElement('link');

    link.rel = 'stylesheet';

    link.type = 'text/css';

    link.href = url;

    const { styleSheets } = document;

    const { href } = link;

    link.addEventListener('load', resolve);
    link.addEventListener('error', reject);

    const pollStyles = () => {
        let { length } = styleSheets;

        while (length--) {
            const stylesheet = styleSheets[length] || {};

            if (stylesheet.href === href) {
                resolve();

                return;
            }
        }

        window.setTimeout(pollStyles);
    };

    pollStyles();

    document.head.appendChild(link);
}));

export default urls => {
    urls = cast(urls);

    const jobs = [];

    for (let i = 0; i < urls.length; i++) {
        jobs.push(getStylesheetLoaded(urls[i]));
    }

    return Promise.allSettled(jobs);
};
