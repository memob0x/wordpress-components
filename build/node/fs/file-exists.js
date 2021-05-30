import fs from 'fs/promises';

export default async path => {
    try {
        await fs.access(path);

        return true;
    }catch(e){
        return false;
    }
};
