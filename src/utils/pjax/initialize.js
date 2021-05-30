export default config => {
    const selectors = Object.keys(config);

    const switches = {};

    for( let i = 0; i < selectors.length; i++ ){
        const key = selectors[i];

        switches[key] = config[key];
    }

    // TODO: maybe import (code-split) pjax instead
    return new window.Pjax({
        selectors,

        switches
    });
};
