import React, { forwardRef, useEffect, useState } from "react";
import Input from './Input';

interface InputTextProps {
    id: string;
    name: string;
    txt: string;
    value?: string;
    required?: boolean;
    onChange?(event: any): void;
};

const InputText = forwardRef((props: InputTextProps, ref: React.Ref<HTMLInputElement>) => {

    const [input, setInput] = useState(props.value);

    useEffect(() => {
        setInput(props.value);
    },[input]);


    const handleChange = (e: any): void => {
        setInput(e.target.value);
    };

    return (
        <React.Fragment>
            <div className="form-item">
                <div className="form-item__label">
                    <label className="form-item__label--txt" htmlFor={props.name}>{props.txt}</label>
                    { props.required === true ? <span className="form-required"></span> : null }
                </div>
                <div className="form-item__container">
                    <Input
                        name={props.name}
                        id={props.id}
                        txt={props.txt}
                        value={props.value}
                        onChange={handleChange}
                    />
                </div>
                { props.id === 'postal_code' ? <button className="ajaxzip3" type="button">郵便番号から住所取得</button> : null }
            </div>
        </React.Fragment>
    )
});

export default InputText;
