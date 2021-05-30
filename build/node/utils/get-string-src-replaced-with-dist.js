import { NAME_FOLDER_DIST, NAME_FOLDER_SRC } from '../constants.js';

export default string => string
    .replace(new RegExp(`${NAME_FOLDER_SRC}/`, 'g'), `${NAME_FOLDER_DIST}/`)
    .replace(new RegExp(`/${NAME_FOLDER_SRC}`, 'g'), `/${NAME_FOLDER_DIST}`)
    .replace(new RegExp(`^${NAME_FOLDER_SRC}$`, 'g'), NAME_FOLDER_DIST);
