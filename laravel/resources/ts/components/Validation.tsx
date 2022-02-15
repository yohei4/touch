class Validation {

    static isString(value: any) {
        if(typeof value === 'string' || value instanceof String){
            return true;
        }else{
            return false;
        }
    };

    static isNumber = (value: string) => {
        const pattern = new RegExp(/^[0-9]*$/);
        return pattern.test(value);
    };

    static isIp = (value: string) => {
        const pattern = new RegExp(/^\d{1,3}(\.\d{1,3}){3}$/);
        return pattern.test(value);
    };

    static isPostCode = (value: string) => {
        const pattern = new RegExp(/^\d{3}-\d{4}$/);
        return pattern.test(value);
    };

    static chkLength = (value: string, length: number) => {
        if (value.length == length) {
            return true;
        } else {
            return false;
        }
    };

    static chkRequired = (value: string) => {
        
    }
};
