import getTranspilationConfigJs from './get-transpilation-config-js.js';

export default (vwptJsonConfig, babelJsonConfig) => ({
    js: getTranspilationConfigJs(babelJsonConfig, vwptJsonConfig.babel)
});
