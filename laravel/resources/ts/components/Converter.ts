export default class Converter {

    static toBase64 = (file: File):Promise<string> => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result?.toString() || '');
            reader.onerror = error => reject(error);
        })
    };

    // base64→Blob
    static toBlob = (base64: string) =>  {
        var bin = window.atob(base64.replace(/^.*,/, ''));
        var buffer = new Uint8Array(bin.length);
        for (var i = 0; i < bin.length; i++) {
            buffer[i] = bin.charCodeAt(i);
        }
        try{
            var blob = new Blob([buffer.buffer], {
                type: 'image/jpg'
            });
        }catch (e){
            return false;
        }
        return blob;
    };
}
