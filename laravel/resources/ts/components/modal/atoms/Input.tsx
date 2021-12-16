import React, { forwardRef } from "react";

interface InputProps {
    name: string;
    txt: string;
    type: any;
};

const Input = forwardRef((props: InputProps, ref: React.Ref<HTMLInputElement>) => {
    return (
        <div className="modal-form__item">
            <label className="modal-form__label" htmlFor={props.name}>{props.txt}</label>
            <input ref={ref} className="modal-form__input form-control" type={props.type} name={props.name} id={props.name} />
        </div>
    )
});

export default Input;
