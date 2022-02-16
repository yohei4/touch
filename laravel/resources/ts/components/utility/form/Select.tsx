import React, { forwardRef } from "react";

interface SelectProps {
    id: string;
    name: string;
    label: string;
    options: string[];
    value?: string;
    required?: boolean;
    onChange(event: any): void;
};

const Select = forwardRef((props: SelectProps, ref: React.Ref<HTMLSelectElement>) => {

    return (
        <div className="form-item">
            <div className="form-item__label">
                <label className="form-item__label--txt" htmlFor={props.name}>{props.label}</label>
                { props.required === true ? <span className="form-required"></span> : null }
            </div>
            <div className="form-item__container">
                <select className="form-select form-control" value={props.value} name={props.name} id={props.id} onChange={e => props.onChange(e)}>
                    <option value=""></option>
                {props.options.map((option, key) => {
                    return (<option key={key} value={option}>{option}</option>);
                })}
                </select>
            </div>
        </div>
    )
});

export default Select;