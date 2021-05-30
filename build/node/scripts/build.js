import readFileJsonConfigVwpt from '../fs/read-file-json-config-vwpt.js';
import readFileJsonConfigBabel from '../fs/read-file-json-config-babel.js';
import buildSource from '../fs/build-src-folder.js';
import getClock from '../utils/get-clock.js';

const root = process.argv[2];

(async () => {
    console.log('Build started...');

    const start = getClock();

    // TODO: make these config to be red in parallel
    const vwptJsonConfig = await readFileJsonConfigVwpt(root);

    const babelJsonConfig = await readFileJsonConfigBabel(root);

    await buildSource(root, vwptJsonConfig, babelJsonConfig);

    console.log(`Source built in ${getClock(start)}ms.`);
})();
