# 0.1.1
    [✓] load components js
    [✓] load components css
    [✓] code splitting through native import (transpiled to systemjs)
    [✓] basic pjax configuration
    [✓] transpile components js and css
    [✓] transpile critical css (split from index.scss)
    [✓] src / dist folder in order to replicate the tipical vue folders structure
    [✓] build should traverse folders recursively and recreate the same src structure in dist
    [✓] load components js and css only when they are rendered
    [✓] components dynamic load

# 0.1.2
    [✓] remove double script load (components js files should not be included since they are loaded dynamically by Vue)
    [✓] provide title title change support
    [✓] port inline scripts to api
    [✓] provide IE11 basic support, Vue doesn't seem to mount the application
    [✓] replace dynamic critical style with dynamic critical link[href]
    [✓] avoid repeated code, refactory
    [✓] avoid vue app destroy + re init, prefer a paradigm where <component :is=""> replaces existent nodes through virtual dom
    [✓] provide child theme support: it should be able to alter pjax configuration and register components
    [✓] merge vwpt-main and vwpt-libs somehow
    [✓] autoload root resources
    [✓] load script[nomodule] from dist + load script[type="module"] from src
    [✓] refactor build files (transpileAll looks messy etc...)
    [✓] make php esm resources enqueue more seamless (remove VWPT_NAME_SUFFIX_MODULE)
    [ ] import vue, vuex, pjax modules (path resolved at build-time)
    [ ] provide core-js polyfills with babel https://github.com/zloirock/core-js/blob/master/docs/2019-03-19-core-js-3-babel-and-a-look-into-the-future.md#babelpreset-env

# 0.1.3
    [ ] in child theme, as a test, update body and html elements css classes (and attributes?) on pjax change
    [ ] in child theme, as a test, provide title metatags change support (description, canonical, shortlink...)

# 0.1.4
    [ ] better js minifier/uglifier (terser?)
    [ ] provide gz files
    [ ] write sourcemap files
