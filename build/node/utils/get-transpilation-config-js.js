import getJsTranspilationConfigBabelMerged from './get-transpilation-config-js-babel-merged.js';

export default (babelConfigRoot, vwptBabelConfig) => ({
    system: getJsTranspilationConfigBabelMerged(
        babelConfigRoot,

        vwptBabelConfig.system,

        {
            plugins: [
                '@babel/plugin-syntax-dynamic-import',

                [
                    '@babel/plugin-transform-modules-systemjs',
                    {
                        'systemGlobal': 'System'
                    }
                ]
            ]
        }
    ),

    esm: getJsTranspilationConfigBabelMerged(
        babelConfigRoot,

        vwptBabelConfig.esm,

        {
            plugins: [
                '@babel/plugin-syntax-dynamic-import'
            ]
        }
    )
});
