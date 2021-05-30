import fs from 'fs/promises';
import createFolder from './create-folder.js';

export default async (src, outputDirectoryPath, name) => {
    await createFolder(outputDirectoryPath);

    return await fs.copyFile(src, outputDirectoryPath + '/' + name);
};
