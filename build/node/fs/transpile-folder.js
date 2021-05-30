import fs from 'fs/promises';

import transpileAll from './transpile-files-and-folders.js';

export default async (folder, options) => {
    const files = await fs.readdir(folder);

    return await transpileAll(files.map(x => `${folder}/${x}`), options);
};
