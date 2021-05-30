import readFile from './read-file.js';
import writeFile from './write-file.js';
import getJsTranspiled from '../utils/get-code-transpiled-result-js.js';
import getStringSrcReplacedWithDist from '../utils/get-string-src-replaced-with-dist.js';
import getStringLibrariesPathsReplaced from '../utils/get-string-libraries-paths-replaced.js';

const esmJsKey = 0;
const systemJsKey = 1;

const types = [];
types[esmJsKey] = 'esm';
types[systemJsKey] = 'system';

// TODO: use RegExp constructor
const regExpJsExt = /\.(esm\.|system\.)?js/g;

const getReplacer = type =>
    string => string.replace(regExpJsExt, `.${type}.js`);

export default async (file, dist, basename, options) => {
    options = options || {};

    let code = await readFile(file);

    const { length } = types;

    const transpilations = [];

    for (let i = 0; i < length; i++) {
        code = getStringSrcReplacedWithDist(code);

        const type = types[i];

        code = getReplacer(type)(code);

        transpilations.push(getJsTranspiled(code, options[type]));
    }

    const transpiledResults = await Promise.allSettled(transpilations);

    const writings = [];

    for (let i = 0; i < length; i++) {
        const { value } = transpiledResults[i] || {};

        ({ code } = value || {});

        if (!code) {
            continue;
        }

        code = getStringLibrariesPathsReplaced(code, dist);

        basename = getReplacer(types[i])(basename);

        writings.push(writeFile(dist, basename, code));
    }

    return await Promise.allSettled(writings);
};
