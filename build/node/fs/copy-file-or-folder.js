import copyFolder from './copy-folder.js';
import isFile from './is-file.js';
import copyFile from './copy-file.js';

export default async (src, outputDirectoryPath, name) => {
    if( await isFile(src) ){
        await copyFile(src, outputDirectoryPath, name);
    }else{
        await copyFolder(src, outputDirectoryPath, name);
    }
};
