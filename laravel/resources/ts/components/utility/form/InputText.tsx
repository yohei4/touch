import React, { forwardRef, useEffect, useState } from "react";

interface InputProps {
    id: string;
    name: string;
    label: string;
    value?: string;
    required?: boolean;
    onChange?(event: any): void;
};

const InputText = forwardRef((props: InputProps, ref: React.Ref<HTMLInputElement>) => {

    return (
        <React.Fragment>
            <div className="form-item">
                <div className="form-item__label">
                    <label className="form-item__label--txt" htmlFor={props.name}>{props.label}</label>
                    { props.required === true ? <span className="form-required"></span> : null }
                </div>
                <div className="form-item__container">
                    <input className="form-input form-control" type="text" name={props.name} id={props.id} defaultValue={props.value} placeholder={props.label} onChange={e => props.onChange(e)}/>
                </div>
                { props.id === 'postal_code' ? <button className="ajaxzip3" type="button">郵便番号から住所取得</button> : null }
            </div>
        </React.Fragment>
    )
});

export default InputText;
