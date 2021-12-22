import React, { forwardRef } from "react";

interface InputProps {
    name: string;
    txt: string;
    type: any;
    required?: boolean;
};

const Input = forwardRef((props: InputProps, ref: React.Ref<HTMLInputElement>) => {
    return (
        <div className="form-item">
            <div className="form-label__outer">
                <label className="form-label" htmlFor={props.name}>{props.txt}</label>
                { props.required === true ? <span className="form-required"></span> : null }
            </div>
            <input ref={ref} className="form-input form-control" type={props.type} name={props.name} id={props.name} />
        </div>
    )
});

export default Input;
