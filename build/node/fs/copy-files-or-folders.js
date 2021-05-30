import path from 'path';
import copyFileOrFolder from './copy-file-or-folder.js';

export default async (inputFilesPaths, outputDirectoryPath) => {
    const jobs = [];

    const { length } = inputFilesPaths || [];

    for (let i = 0; i < length; i++) {
        const inputFilePath = inputFilesPaths[i];

        // TODO: refactory
        const src = typeof inputFilePath === 'string' ? inputFilePath : inputFilePath.src;
        const name = typeof inputFilePath === 'string' ? path.basename(inputFilePath) : inputFilePath.name;

        jobs.push(copyFileOrFolder(src, outputDirectoryPath, name));
    }

    return await Promise.allSettled(jobs);
};
