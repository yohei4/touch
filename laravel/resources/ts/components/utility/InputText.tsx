import React, { forwardRef, useState } from "react";
import ReactDOM from "react-dom";

interface InputProps {
    id: string;
    name: string;
    txt: string;
    value?: string;
    required?: boolean;
    onChange?(event: any): void;
};

const InputText = forwardRef((props: InputProps, ref: React.Ref<HTMLInputElement>) => {
    return (
        <React.Fragment>
            <div className="form-item">
                <div className="form-label__outer">
                    <label className="form-label" htmlFor={props.name}>{props.txt}</label>
                    { props.required === true ? <span className="form-required"></span> : null }
                </div>
                <input className="form-input form-control" type="text" name={props.name} id={props.id} defaultValue={props.value} placeholder={props.txt} onChange={e => props.onChange(e)}/>
                { props.id === 'postal_code' ? <button className="ajaxzip3" type="button">郵便番号から住所取得</button> : null }
            </div>
        </React.Fragment>
    )
});

export default InputText;