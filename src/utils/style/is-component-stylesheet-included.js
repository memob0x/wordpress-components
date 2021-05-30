export default name => {
    const selector = `#${name}-css`;

    return document.querySelector(`link${selector}`) || document.querySelector(`style${selector}`);
};
