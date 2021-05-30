import getFileBuffer from './read-file.js';

export default async path => JSON.parse(await getFileBuffer(path));

