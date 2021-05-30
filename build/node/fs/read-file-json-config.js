import readFileJson from './read-file-json.js';
import fileExists from './file-exists.js';

export default async (root, name) => {
    const path = `${root}/${name}.json`;

    let config = null;

    if( await fileExists(path) ){
        config = await readFileJson(path);
    }

    return config;
};
