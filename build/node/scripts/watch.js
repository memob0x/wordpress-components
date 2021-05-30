import chokidar from 'chokidar';
import readFileJsonConfigVwpt from '../fs/read-file-json-config-vwpt.js';
import readFileJsonConfigBabel from '../fs/read-file-json-config-babel.js';
import buildSource from '../fs/build-src-folder.js';
import transpileFilesAndFolders from '../fs/transpile-files-and-folders.js';
import getTranspilationConfig from '../utils/get-transpilation-config.js';
import getClock from '../utils/get-clock.js';

import { NAME_FOLDER_SRC } from '../constants.js';

const root = process.argv[2];

(async () => {
    // TODO: make these config to be red in parallel
    const vwptJsonConfig = await readFileJsonConfigVwpt(root);

    const babelJsonConfig = await readFileJsonConfigBabel(root);

    chokidar
        .watch(`${root}/${NAME_FOLDER_SRC}`)

        .on('ready', async () => {
            console.log('Watch started...');

            const start = getClock();

            await buildSource(root, vwptJsonConfig, babelJsonConfig);

            console.log(`Source built in ${getClock(start)}ms.`);
        })

        .on('change', async path => {
            console.log(`${path} changed...`);

            const start = getClock();

            await transpileFilesAndFolders(
                path,

                getTranspilationConfig(vwptJsonConfig, babelJsonConfig)
            );

            console.log(`${path} built in ${getClock(start)}ms.`);
        });
})();
