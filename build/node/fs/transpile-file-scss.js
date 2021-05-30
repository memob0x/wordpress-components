import readFile from './read-file.js';
import createFolder from './create-folder.js';
import getScssTranspiled from '../utils/get-code-transpiled-result-scss.js';
import writeFile from './write-file.js';

export default async (from, outputDirectoryPath, outputFilename) => {
    outputFilename = outputFilename.replace('.scss', '.css');

    const result = await getScssTranspiled(
        await readFile(from),

        from,

        outputDirectoryPath,

        outputFilename
    );

    await createFolder(outputDirectoryPath);

    const jobs = [];

    jobs.push(writeFile(
        outputDirectoryPath,

        outputFilename,

        result.css
    ));

    if (result.map) {
        jobs.push(writeFile(
            outputDirectoryPath,

            `${outputFilename}.map`,

            result.map.toString()
        ));
    }

    return await Promise.allSettled(jobs);
};
