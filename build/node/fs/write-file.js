import fs from 'fs/promises';
import createFolder from './create-folder.js';

export default async (outputDirectoryPath, outputFilename, code) => {
    await createFolder(outputDirectoryPath);

    return await fs.writeFile(`${outputDirectoryPath}/${outputFilename}`, code);
};
