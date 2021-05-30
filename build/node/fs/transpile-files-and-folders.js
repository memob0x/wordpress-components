import path from 'path';
import isFile from './is-file.js';
import transpileFolder from './transpile-folder.js';
import transpileJs from './transpile-file-js.js';
import transpileScss from './transpile-file-scss.js';
import getStringSrcReplacedWithDist from '../utils/get-string-src-replaced-with-dist.js';

const drivers = {
    js: transpileJs,

    scss: transpileScss
};

export default async (files, options) => {
    files = Array.isArray(files) ? files : (files ? [files] : []);

    options = options || {};

    const jobs = [];

    const { length } = files;

    for( let i = 0; i < length; i++ ){
        const file = files[i];

        if( !(await isFile(file)) ) {
            jobs.push(transpileFolder(file, options));

            continue;
        }

        const extname = path.extname(file).replace(/^\./, '');
        const basename = path.basename(file);
        const dirname = path.dirname(file);

        const dist = getStringSrcReplacedWithDist(dirname);

        const operation = drivers[extname] || (() => {});

        jobs.push(operation(file, dist, basename, options[extname]));
    }

    return await Promise.allSettled(jobs);
};
