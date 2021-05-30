import fs from 'fs/promises';

export default async path => await fs.mkdir(path, { recursive: true });
