import parseDom from '../dom/get-html-string-parsed.js';
import getNewDomCriticalCssLoaded from './get-new-dom-critical-css-loaded.js';

export default cb => async function (oldEl, newEl, { request }) {
    const { responseText } = request;

    const newDocument = parseDom(responseText);

    await getNewDomCriticalCssLoaded(newDocument);

    await cb(oldEl, newEl);

    this.onSwitch();
};
