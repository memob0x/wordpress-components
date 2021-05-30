import copyFilesOrFolders from './copy-files-or-folders.js';
import transpileFolder from './transpile-folder.js';
import getTranspilationConfig from '../utils/get-transpilation-config.js';

import { NAME_FOLDER_DIST, NAME_FOLDER_SRC } from '../constants.js';

export default async (root, vwptJsonConfig, babelJsonConfig) => await Promise.allSettled([
    copyFilesOrFolders(vwptJsonConfig.globals || [], `${root}/${NAME_FOLDER_DIST}/globals`),

    transpileFolder(`${root}/${NAME_FOLDER_SRC}`, getTranspilationConfig(vwptJsonConfig, babelJsonConfig))
]);
