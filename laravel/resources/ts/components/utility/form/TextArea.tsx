import React from "react";

interface InputProps {
    id: string;
    name: string;
    txt: string;
    value?: string;
    required?: boolean;
    cols?: number;
    rows?: number;
    onChange(event: any): void;
};

const TextArea = (props: InputProps) => {
    return (
        <React.Fragment>
            <div className="form-item">
                <div className="form-item__label">
                    <label className="form-item__label--txt" htmlFor={props.name}>{props.txt}</label>
                    { props.required === true ? <span className="form-required"></span> : null }
                </div>
                <div className="form-item__container">
                    <textarea className="form-textarea form-control" cols={props.cols} rows={props.rows} name={props.name} id={props.id} defaultValue={props.value} placeholder={props.txt} onChange={event => props.onChange(event)}></textarea>
                </div>
            </div>
        </React.Fragment>
    )
};

export default TextArea;
