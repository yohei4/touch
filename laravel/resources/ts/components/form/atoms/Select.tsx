import React, { forwardRef } from "react";

interface SelectProps {
    id: string;
    name: string;
    txt: string;
    options: string[];
    value?: string;
    required?: boolean;
    onChange(event: any): void;
};

const Select = React.memo((props: SelectProps) => {

    return (
        <div className="form-item">
            <div className="form-label__outer">
                <label className="form-label" htmlFor={props.name}>{props.txt}</label>
                { props.required === true ? <span className="form-required"></span> : null }
            </div>
            <select className="form-select form-control" value={props.value} name={props.name} id={props.id} onChange={e => props.onChange(e)}>
                <option value=""></option>
            {props.options.map((option, key) => {
                return (<option key={key} value={option}>{option}</option>);
            })}
            </select>
        </div>
    )
});

export default Select;
